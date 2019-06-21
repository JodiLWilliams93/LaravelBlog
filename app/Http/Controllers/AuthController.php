<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        
        $name = $request->input('name');
        $email = $request->input( 'email');
        $password = $request->input( 'password');

        $user = new User ([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'signin' => [
                'href' => 'api/v1/user/signin',
                'method' => 'POST',
                'params' => 'email, password'
            ]
        ]);

        if($user->save()) {
            $user->signin =[
                'href' => 'api/v1/user/signin',
                'method' => 'POST',
                'params' => 'email, password'
            ];

            $response = [
                'msg' => 'User created',
                'user' => $user
            ];

            return response()->json($response, 200);   
        }
        $response = ['msg' => 'An error occured.'];
        return response()->json($response, 404);

            
    }
    
    public function signin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $user = [
            'name' => 'name',
            'email' => $email,
            'password' => $password,
        ];

        $response = [
            'msg' => 'User signed in',
            'user' => $user
        ];

        return response()->json($response, 200);     
    }
}
