<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;
    protected $username = 'username';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'status' => 'required|max:3',
            'username' => 'required|max:30',
            'email' => 'required|email|max:255|unique:users_biasa',
            'password' => 'required|confirmed|min:3',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'status' => $data['status'],
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
