<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'print-user?id=';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'participant_number' => ['required', 'string', 'min:1','max:100', 'unique:users'],
            'code' => ['required', 'string', 'min:1', 'max:100', 'unique:users'],
        ],
        [
            'name.required' => 'Das Namensfeld ist erforderlich.',
            'name.max' => 'Die maximale Grenze für den Namen beträgt 100',
            
            'participant_number.required' => 'Das Feld Teilnehmernummer ist erforderlich.',
            'participant_number.min' => 'Das Feld Teilnehmernummer ist erforderlich.',
            'participant_number.max' => 'Teilnehmernummer darf maximal 100 Zeichen lang sein',
            'participant_number.unique' => 'Teilnehmernummer wird bereits verwendet',
            
            'code.required' => 'Codefeld ist erforderlich',
            'code.min' => 'Codefeld ist erforderlich',
            'code.max' => 'Die maximale Grenze für Code ist 100',
            'code.unique' => 'Code wird bereits verwendet',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => 'stu-'.uniqid().'@gmail.com',
            'participant_number' => $data['participant_number'],
            'code' => $data['code'],
            'password' => Hash::make('nabaabana')
        ]);

        //$this->sendEmail($user);
        return $user;
    }

    public function sendEmail($user)
    {
        $data = [
            'name' => $user->name,
            'code' => $user->code
        ];

        Mail::send('mail', $data, function($message) use($user) {
            $message->to($user->email, $user->name)
            ->subject('Ihr E-Prüfungs-Link');
            $message->from('e-exam@gmail.com','E-Exam');
        });
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user) ? : redirect($this->redirectPath().$user->id);
    }
}
