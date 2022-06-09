<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Newsletter;
use App\ParticipantPoint;
use App\Tournament;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'nickname'=> ['required'],
            'whatsAppDiscussion' => ['required'],
            'termsAndConditions' => ['required'],
            'phone' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        //dd($data);
        if($data['termsAndConditions']=='yes'){
            $user = User::create([
                'username' => $data['username'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'image' => $data['image']??'',
                    'phone' => $data['phone'],
                    'nickname' => $data['nickname'],
                    'whatsAppDiscussion' => $data['whatsAppDiscussion'],
                    'termsAndConditions' => $data['termsAndConditions'],
                ]);
                
                $newsletter = new Newsletter;
                $newsletter->email = $data['email'];
                $newsletter->save();
                $tournament = Tournament::all();
                foreach($tournament as $item){
                    $particpant = new  ParticipantPoint;
                    $particpant->participant_id = $user->id;
                    $particpant->tournament_id = $item->id;
                    $particpant->points = 0;
                    $particpant->save();
                }
                return $user;
                // $details = [
                //     'body' => 'Your account Admins can review and approve or deny!'
                // ];
                // Mail::to($data['email'])->send(new \App\Mail\PermissionUser($details));
       }else{
           return redirect()->back();
       }
    }
}
