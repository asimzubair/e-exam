<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\ExamAttempts;
use App\Models\Questions;
class ReportController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    

   public function index()
    {
        $countNumberArray = array();
        $finalNumberArray = array();
        $questionDiff     = array();
        for($i=0;$i<=10;$i++){
            $totalNumber = DB::select("SELECT user_id
                FROM student_exam where total_score=$i");
            //print_r($totalNumber);
            $countNumberArray[$i] = (count($totalNumber)>0?count($totalNumber):'0');
        }

        for($i=1;$i<=10;$i++){
            $totalNumber = DB::select("SELECT question_id,SECOND(AVG(TIMEDIFF(endtime, starttime)))as 'TimeDiff' FROM `question_time` where question_id=$i group by question_id");
            if(isset($totalNumber[0]->TimeDiff)){
                $rounded = ((strtotime(str_replace('.000000','', $totalNumber[0]->TimeDiff))/60)*60);
                $questionDiff[] = $totalNumber[0]->TimeDiff;   
            }else{

                $questionDiff[] = '0';  
            }
            
        }

       // dd($countNumberArray);
        $maxQuery = DB::select("SELECT  question_id,(SECOND(TIMEDIFF(endtime,starttime))) AS 'Worst',q.question FROM `question_time`  join questions q on q.id =question_time.question_id order by worst DESC LIMIT 1");
        $minQuery = DB::select("SELECT  question_id,(SECOND(TIMEDIFF(endtime,starttime))) AS 'mini',q.question FROM `question_time`  join questions q on q.id =question_time.question_id order by mini ASC LIMIT 1");

       // dd($maxQuery);
        $registerUser = User::where('email', '!=', 'admin@gmail.com')->count();
        $takeExam    = count(DB::table('exam_attempts')
                ->select('user_id')
                ->groupByRaw('user_id')
                ->get()->toArray());
        $registerUser  = $registerUser - $takeExam;;
        //$harQuestionResult =  Questions::where('id', 7)->first()->toArray();
        if(isset($maxQuery['0']->question_id)){
            $hardQuestion ='Farge '.$maxQuery['0']->question_id.' <br> '.$maxQuery['0']->question.' :'.$maxQuery['0']->Worst.' Sekunden';   
        }else{
             $hardQuestion ='Kein Datensatz gefunden'; 
        }
        

        $lowQuestionResult =  Questions::where('id', 5)->first()->toArray();

        
        if(isset($minQuery['0']->question_id)){
            $lowQuestion = 'Farge '.$minQuery['0']->question_id.' <br> '.$minQuery['0']->question.' :'.$minQuery['0']->mini.' Sekunden';  
        }else{
             $lowQuestion ='Kein Datensatz gefunden'; 
        }
        return view('report/index',compact('takeExam','registerUser','countNumberArray','hardQuestion','lowQuestion','questionDiff'));
    }

}

