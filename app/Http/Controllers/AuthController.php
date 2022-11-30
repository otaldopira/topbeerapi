<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('master')->plainTextToken;

        $response =[
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credenciais = $request->only('email', 'password');

        if(!Auth::attempt($credenciais)){
            return ['message' => 'Credenciais inválidas !'];
        }
        
        // if(!$user || !Hash::check($request->password, $user->password)){
        //     return response(['message' => 'Credenciais inválidas !'], 404);
        // }

        // $token = $user->createToken('master')->plainTextToken; 

        // $response =[
        //     'user' => $user,
        //     'token' => $token
        // ];

        // return response($response, 201); 
    }

    public function logout(Request $request){

        $request->user()->currentAccessToken()->delete();

        return ['message' => 'Usuário desconectado !'];

    }
}
