<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginForm;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthenticationController extends Controller
{

    public function login(LoginForm $request) 

    {

      
        $email = $request->email;
        $password = $request->password;
    
    
    if (Auth::attempt(['email'=> $email,'password' => $password]))
{
         $user = Auth::user();
         $token = $user->createToken('token');
         return response()->json([

        'user' => $user,
        'token' =>$token->plainTextToken
    ],200);
}
    return response()->json([
         'error' =>'Account not found'
    ],401);

}

    public function register (LoginForm $request)
{
     $user = new User();

        $user->name=$request->name;
        $user->email=$request->email;
   
        $user->password= Hash::make($request->password);
        $user->save();

         return response()->json([
             'user' => $user,
             'token' =>'Registered Successfully'

    ],203);
     
}
}