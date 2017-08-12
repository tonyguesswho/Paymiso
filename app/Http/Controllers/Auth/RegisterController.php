<?php

namespace MyEscrow\Http\Controllers\Auth;

use MyEscrow\User;
use MyEscrow\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Mail;
use MyEscrow\BlockIoTest;
use MyEscrow\CreateAddress;
use MyEscrow\Mail\verifyEmail;

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
    protected $redirectTo = '/user_dashboard';

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
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \MyEscrow\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token'    => Str::random(40),
        ]);

        $address = new BlockIoTest();
        $CreateAddress   = $address->createWalletAddress();
        $wallet_id = $CreateAddress->data->address;

         CreateAddress::create([
            'user_id'   => $user->id,
            'btc_wallet_id' => $wallet_id,   
            ]);

        $usermail = User::findorfail($user->id);
        $this->sendEmail($usermail);
        return $user;  

        
    }

    public function verifyEmailFirst(){  
        
        return view('email.verify');
    }

    public function sendEmail($usermail){

        Mail::to($usermail['email'])->send(new verifyEmail($usermail));
    }

    public function sendEmailDone($email,$token){
        
        $user = User::Where(['email' => $email, 'token' =>$token])->first();
        if ($user) {
         User::Where(['email' => $email, 'token' =>$token])->update(['confirmed'=>1, 'token' =>Null]);
         return redirect('/user_dashboard');
        }else{
            return 'c you';
        }

    }

     
}
