<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\RegistrationNotificationJob;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'location' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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

        $isEnterprise = false;

        if(isset($data['compagny'])){
            $isEnterprise = true;
        }

        $user =  User::create([
            'nom' => $data['last_name'],
            'prenom' => $data['first_name'],
            'gender' => $data['gender'],
            'compagny' => $isEnterprise ? $data['compagny'] : null,
            'pseudo' =>  $isEnterprise ? $data['compagny'].Str::random(2) : $data['first_name'].Str::random(2),
            'country_id' => $data['location'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->attach($isEnterprise ? [2] : [3]);

        Wallet::create([
            'account_number' => Str::random(6),
            'account_wallet' => '0',
            'user_id' => $user->id,
        ]);

        //dispatch(new RegistrationNotificationJob($user));

        /*

            if(isset($data['compagny'])){
                $user->roles()->attach([2]);
            }
            else{
                $user->roles()->attach( isset($data['compagny']) ? [2] : [3]);
            }

        */

        return $user;
    }
}
