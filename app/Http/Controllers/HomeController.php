<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Questions;
use App\Models\Options;
use App\Models\ExamAttempts;
use App\Models\User;
use App\Models\StudentExam;
use App\Models\QuestionTime;
class HomeController extends Controller
{
    public static $acceptablePercentage = 60;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    #Home - Screen with subject dropdown selection
    public function index()
    {    
        return view('home');
    }

    public function overview()
    {
        $totalExamsSubmitted = StudentExam::count();
        $averageScore = round( StudentExam::avg('total_score'), 1);    
        $averageTime = 0; 
        if($totalExamsSubmitted)
        {
            $averageTimes = StudentExam::select(DB::raw('DATE(started_time) AS start_time, AVG(TIME_TO_SEC(TIMEDIFF(end_time, started_time))) AS timediff'))->groupBy('start_time')->get();
            $avgArr = [];
            foreach($averageTimes as $exam){
              $avgArr[] = gmdate("i", $exam->timediff);
            }
            $avgArrFilter = array_filter($avgArr);
            $averageTime = round( array_sum($avgArrFilter )/count($avgArrFilter ) );
        }   
        
        $lastSubmission = StudentExam::latest()->first();

        return view('overview', compact('totalExamsSubmitted', 'averageScore', 'averageTime','lastSubmission'));
    }

    public function printUser(Request $request)
    {
        $input = $request->input();
        $user = User::find($input['id']);
        return view('print-user', compact('user'));
    }
    
    public function attempts()
    {
        $students = User::select('users.id','name','code','student_exam.created_at', 'marked_correct_by_teacher', 'marked_correct_at')
            ->join('student_exam','user_id','users.id')
            ->orderBy('student_exam.created_at', 'DESC')
            ->get();
         
        return view('attempts', compact('students'));
    }

    public function evaluation(Request $request)
    {
        $input = $request->input();
        $userId = $input['id'];
        $answers = ExamAttempts::select('exam_attempts.id','accuracy','type', 'exam_attempts.question_id', 'question', 'exam_attempts.is_correct', 'option', 'option_text')
            ->join('questions','questions.id','exam_attempts.question_id')
            ->leftjoin('options','options.id','exam_attempts.option_id')
            ->whereNotIn('questions.type',['blanks_no_sequence','blanks_sequence'])
            ->where('user_id', $userId)->orderBy('exam_attempts.id', 'ASC')->get();

        $mushkilAnswer = ExamAttempts::select('exam_attempts.id','accuracy','type', 'exam_attempts.question_id', 'question', 'exam_attempts.is_correct', 'option', 'option_text')
            ->join('questions','questions.id','exam_attempts.question_id')
            ->leftjoin('options','options.id','exam_attempts.option_id')
            ->where('questions.type', 'blanks_no_sequence')
            ->where('user_id', $userId)->orderBy('exam_attempts.id', 'ASC')->get();

        $mushkil1Correct = true;
        foreach($mushkilAnswer as $key => $ans)
        {
            if(!$ans->is_correct)
            {
               $mushkil1Correct = false; 
            } 
        }
        $number = 9;
        $mushkilAnswers = view('user-filled-answers', compact('mushkilAnswer','number'))->render();

        $mushkilAnswer = ExamAttempts::select('exam_attempts.id','type','accuracy', 'exam_attempts.question_id', 'question', 'exam_attempts.is_correct', 'option', 'option_text')
            ->join('questions','questions.id','exam_attempts.question_id')
            ->leftjoin('options','options.id','exam_attempts.option_id')
            ->where('questions.type', 'blanks_sequence')
            ->where('user_id', $userId)->orderBy('exam_attempts.id', 'ASC')->get();

        $mushkil2Correct = true;
        foreach($mushkilAnswer as $key => $ans)
        {
            if(!$ans->is_correct)
            {
               $mushkil2Correct = false; 
            }
        }
        $number = 10;
        $mushkilAnswers .= view('user-filled-answers', compact('mushkilAnswer','number'))->render();

        $totalMushkilPoints = 0;
        if($mushkil1Correct)
        {
            $totalMushkilPoints++;
        }
        if($mushkil2Correct)
        {
            $totalMushkilPoints++;
        }

        return view('evaluation', compact('answers', 'mushkilAnswers', 'totalMushkilPoints','userId'));
        
    }

    public function updateEvaluation(Request $request)
    {
        $input = $request->input();

        foreach ($input as $key => $answer) 
        { 

            if($answer == 'correct')
            {
                $optionId = explode('_', $key)[1]; 
                ExamAttempts::where('id',$optionId)->update(['is_correct'=>1]);
            }
            if($answer == 'wrong')
            {
                
                $optionId = explode('_', $key)[1]; 
                ExamAttempts::where('id',$optionId)->update(['is_correct'=>0]);
            }
        }

        StudentExam::where('user_id', $input['user_id'])->update([
            'marked_correct_by_teacher' => 1,
            'marked_correct_at'         => date("Y-m-d H:i:s")
        ]);
         return redirect('attempts');
    }

    public function login()
    {
        return view('login');
    }

    public function attemptLogin(Request $request)
    {
        $input = $request->input();
        $user = User::where('code', $input['user_code'])->first();
        $canGiveExam = false;
        $msg = 'Teilnehmernummer nicht gefunden';
        if($user)
        {
            $canGiveExam = true;
            $alreadyAttempted = ExamAttempts::where('user_id', $user->id)->count();
            if($alreadyAttempted)
            {
                $canGiveExam = false;
                $msg = 'Teilnehmerprüfung bereits abgegeben';
            }
        }

        if($canGiveExam)
        {
            session()->put('student', $user->toArray());
            return view('start-exam', compact('user'));
        }
        else
        {
            return redirect()->back()->withErrors(['msg' => $msg]);
        }
    }

    public function exam()
    {
        if(session()->has('student'))
        {
            $user_id = session()->get('student')['id'];
            session()->put('student_exam_started_at_'.$user_id , date("Y-m-d H:i:s"));
            $questions = Questions::with('answers')->get()->toArray();
            return view('quiz', compact('questions'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function submitExam(Request $request)
    {
        $input = $request->input();
        $answers = [];
        $user_id = session()->get('student')['id'];
        $totalPoints = 0;

        for ($qId=1; $qId < 10; $qId++) 
        { 

            $questionNumber = 'question_'.$qId; 
            if(isset($input[ $questionNumber ]))
            {
                $dbQuestion = Questions::find($qId);
                if($dbQuestion->type == 'multiple_choice')
                {
                    $selectedOption = $input[ $questionNumber ];
                    $evaluation = $this->evaluateMultipleChoice($user_id, $qId, $selectedOption);
                    $answers[] = $evaluation; 
                    if($evaluation['is_correct'])
                    {
                        $totalPoints++;
                    }
                }
                elseif($dbQuestion->type == 'dropdown')
                {
                    $selectedOption = $input[ $questionNumber ];
                    $evaluation = $this->evaluateMultipleChoice($user_id, $qId, $selectedOption);
                    $answers[] = $evaluation; 
                    if($evaluation['is_correct'])
                    {
                        $totalPoints++;
                    }
                }
                elseif($dbQuestion->type == 'textarea')
                {
                    $filledAnswer = $input[ $questionNumber ];
                    $evaluation = $this->evaluateTextarea($user_id, $qId, $filledAnswer);
                    $answers[] = $evaluation; 
                    if($evaluation['is_correct'])
                    {
                        $totalPoints++;
                    }
                }
                elseif($dbQuestion->type == 'blanks_no_sequence')
                {
                    $givenAnswers = $this->evaluateNoSequence($user_id, $input, $questionNumber, $qId);
                    $answers = array_merge($answers, $givenAnswers);
                    $isCorrect = true;
                    foreach($givenAnswers as $answer)
                    {
                        if(!$answer['is_correct'])
                        {
                            $isCorrect = false;
                            break;
                        }
                    }

                    if($isCorrect)
                    {
                        $totalPoints++;
                    }
                }
                elseif($dbQuestion->type == 'blanks_sequence')
                {
                    $givenAnswers = $this->evaluateWithSequence($user_id, $input, $questionNumber, $qId);
                    $answers = array_merge($answers, $givenAnswers);
                    $isCorrect = true;
                    foreach($givenAnswers as $answer)
                    {
                        if(!$answer['is_correct'])
                        {
                            $isCorrect = false;
                            break;
                        }
                    }

                    if($isCorrect)
                    {
                        $totalPoints++;
                    }
                }
            }
            else
            {
                $answers[] = $this->evaluateUnAnswered($user_id, $qId);
            }
        }

        #Invoice question
        $answers[] = $this->evaluateInvoice($input, $user_id);

        StudentExam::create([
            'user_id'       => $user_id,
            'total_score'   => $totalPoints,
            'started_time'  => session()->get('student_exam_started_at_'.$user_id),
            'end_time'      => date("Y-m-d H:i:s")
            ]
        );

        ExamAttempts::insert($answers);
        $t=date('Y-m-d H:i:s');
        QuestionTime::where('user_id',$user_id)->where('question_id','10')->update(['endtime'=>$t]);
        return view('thanks');
    }

    #Evaluations
    public function evaluateInvoice($input, $user_id)
    {
        $invoiceData = [
            "cost_quantity" => $input['cost_quantity'],
            "cost_unit" => $input['cost_unit'],
            "cost_importance" => $input['cost_importance'],
            "cost_total" => $input['cost_total'],
            "cost_grand_total" => $input['cost_grand_total'],

            "material_quantity" => $input['material_quantity'],
            "material_unit" => $input['material_unit'],
            "material_importance" => $input['material_importance'],
            "material_total" => $input['material_total'],
            "material_grand_total" => $input['material_grand_total'],

            "invoice_sub_total" => $input['invoice_sub_total'],
            "invoice_tax" => $input['invoice_tax'],
            "invoice_grand_total" => $input['invoice_grand_total']
        ];

        return [
            'user_id'     => $user_id,
            'question_id' => 10,
            'option_id'   => 0,
            'option_text' => json_encode($invoiceData),
            'accuracy'    => 0,
            'is_correct'  => 0,
            'created_at'  => now()
        ];
    }

    public function evaluateUnAnswered($user_id, $qId)
    {
        return [
            'user_id'     => $user_id,
            'question_id' => $qId,
            'option_id'   => 0,
            'option_text' => '',
            'accuracy'    => 100,
            'is_correct'  => 0,
            'created_at'  => now()
        ];
    }

    public function evaluateMultipleChoice($user_id, $qId, $selectedOption)
    {
        return [
            'user_id'     => $user_id,
            'question_id' => $qId,
            'option_id'   => $selectedOption,
            'option_text' => '',
            'accuracy'    => 100,
            'is_correct'  => Options::isCorrect($qId, $selectedOption),
            'created_at'  => now()
        ];
    }

    public function evaluateTextarea($user_id, $qId, $filledAnswer)
    {
        $optionText = Options::getTextareaOption($qId);
        similar_text($filledAnswer, $optionText, $percent);
        $isCorrect = ($percent > self::$acceptablePercentage) ? true : false;

        return [
            'user_id'     => $user_id,
            'question_id' => $qId,
            'option_id'   => 0,
            'option_text' => $filledAnswer,
            'accuracy'    => $percent,
            'is_correct'  => $isCorrect,
            'created_at'  => now()
        ];
    }

    public function evaluateNoSequence($user_id, $input, $questionNumber, $qId)
    {
        $allOptions = Options::getAllOptions($qId);
        $givenAnswers = [];
        foreach($input[$questionNumber] as $filledAnswer)
        {
            $isCorrect = false;
            foreach($allOptions as $option)
            {
                similar_text($filledAnswer, $option, $percent);
                if($percent > self::$acceptablePercentage)
                {
                    $isCorrect = true;
                    break;
                }
            }

            $givenAnswers[] = [
                'user_id'     => $user_id,
                'question_id' => $qId,
                'option_id'   => 0,
                'option_text' => $filledAnswer,
                'accuracy'    => $percent,
                'is_correct'  => $isCorrect,
                'created_at'  => now()
            ];
        }
        
        return $givenAnswers;
    }

    public function evaluateWithSequence($user_id, $input, $questionNumber, $qId)
    {
        $allOptions = Options::getAllOptions($qId);
        $givenAnswers = [];
        foreach($input[$questionNumber] as $key => $filledAnswer)
        {
            similar_text($filledAnswer, $allOptions[$key], $percent);
            $isCorrect = ($percent > self::$acceptablePercentage) ? true : false;

            $givenAnswers[] = [
                'user_id'     => $user_id,
                'question_id' => $qId,
                'option_id'   => 0,
                'option_text' => $filledAnswer,
                'accuracy'    => $percent,
                'is_correct'  => $isCorrect,
                'created_at'  => now()
            ];
        }
        
        return $givenAnswers;
    }

    public function saveCalculator(Request $request)
    {
        $input = $request->input();
        session()->put('calculator_text', $input['calculator_text']);
        return json_encode($input);
    }
     public function saveQuestiontime(Request $request)
    {
    //dd($request);
        $input = $request->input();
        if (!QuestionTime::where('user_id', session()->get('student')['id'])->where('question_id',$input['question'])->exists()){
            if($input['question']==1){
                QuestionTime::create([
                'user_id'     => session()->get('student')['id'],
                'starttime'   => (date('Y-m-d H:i:s')),
                'question_id' => $input['question']
                ]
            );
            }else{
                    $previousQuestion = $input['question']-1;
                    QuestionTime::create([
                        'user_id'     => session()->get('student')['id'],
                        'starttime'   => (date('Y-m-d H:i:s')),
                        'question_id' => $input['question']
                        ]
                    ); 
                 QuestionTime::where('user_id',session()->get('student')['id'])->where('question_id',$previousQuestion)->update(['endtime'=>(date('Y-m-d H:i:s'))]);
            }
        }
        
    }
     public function studentoverview()
    {
        $students = User::select('users.id','name','code')
         ->whereNotIn('users.name',['Admin','Maglia'])
            ->get();
        return view('studentoverview', compact('students'));
    }
    public function digitalExam(){
        $teacherArray = array('019233'=>'Herr Müller (Pers. Nr.: 019233)','017234'=>'Herr Trauf (Pers. Nr.: 017234)','017223'=>'Frau Meyer (Pers. Nr.: 017223)','017255'=>'Frau Karl (Pers. Nr.: 017255)');
        $students = User::select('users.id','name','code')
         ->whereNotIn('users.name',['Admin','Maglia'])
            ->get();
        return view('digital/create_digital_exam',compact('students','teacherArray'));
    }
    public function saveDigitalExam(Request $request){
       $input = $request->input();

       $digitalExam = new DigitalExam;
 
        $digitalExam->professional_group_number = $request->professional_group_number;
        $digitalExam->examing_body = $request->examing_body;
        $digitalExam->date_of_examination = $request->date_of_examination;
        $digitalExam->exam_release = implode(',',$request->exam_release);
        $digitalExam->exam_graders = implode(',',$request->exam_graders);
        $digitalExam->exam_id = $request->exam_id;
        $digitalExam->save();
    }
}
