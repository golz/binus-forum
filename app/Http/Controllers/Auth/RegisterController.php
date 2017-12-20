<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
            'fullname' => 'required|string|min:5|max:50',
            'nickname' => 'required|string|unique:users,nickname|min:3|max:20|alpha_dash',
            'nim' => 'required|string|unique:users,nim|min:10|max:10',
            'email' => 'required|string|email|max:255|unique:users',
            'bday_day' => 'required|numeric|min:1',
            'bday_month' => 'required|numeric|min:1',
            'bday_year' => 'required|numeric|min:1',
            'image' => 'image',
            'password' => 'required|string|min:6|max:100|confirmed',
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
        $file_name = 'default.jpg';
        if(Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $destination_path = public_path('uploads/profile');
                $extension = Input::file('image')->getClientOriginalExtension();
                $file_name = uniqid() . '.' . $extension;

                Input::file('image')->move($destination_path, $file_name);
            }
        }
        $dob = $data['bday_year'] . '/' . $data['bday_month'] . '/' . $data['bday_day'];
        return User::create([
            'role_id' => 2,
            'fullname' => $data['fullname'],
            'nickname' => $data['nickname'],
            'nim' => $data['nim'],
            'email' => $data['email'],
            'dob' => $dob,
            'image' => $file_name,
            'password' => bcrypt($data['password']),
        ]);
    }
}
