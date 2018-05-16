<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class UserRegisterController extends Controller
{
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['emailCrm'],
            'password' => bcrypt($data['password']),
            'idCrm'    =>$data['idCrm'],
        ]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'idCrm'    => 'required|string|unique:users',
        ]);
    }
}