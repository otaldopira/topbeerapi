<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Parser\Tokens;

class AuthController extends Controller
{
    public function register(Request $request){

        $credenciais = Validator::make($request->all(),[
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6']
        ]);

        if($credenciais->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Dados inválidos',
                'error' => $credenciais->errors()
            ],401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('master')->plainTextToken;

        $response =[
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function login(Request $request){

        $credenciais = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if($credenciais->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Credenciais inválidas',
                'error' => $credenciais->errors()
            ],401);
        }

        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'status' => false,
                'message' => 'Credenciais inválidas',
                'error' => $credenciais->errors()
            ],401);
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('master')->plainTextToken;
        
        return response()->json([
            'status' => true,
            'message' => 'Login efetuado com sucesso !',
            'token' => $token
        ],200); 
    }

    public function logout(){
        
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Você foi desconectado com sucesso !',
        ],200); 

    }
}
