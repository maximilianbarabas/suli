<?php

namespace App\Http\Controllers;

use App\User;
use ILLuminate\Http\Request;
use ILLuminate\Support\Facades\Validator;


class userController extends Controller
{
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'email'=>'required|unique:users',
            'password'=>'required',
            'name'=>'required',

        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()], status: 409);
        }
        $p=new user();
        $p->name=$request->name;
        $p->email=$request->email;
        $p->password=encrypt($request->password);
        $p->save();
        return response()->json(['message'=>"Successfully Registered"]);
    }
    public function login()
    {
        $validator=Validator::make($request->all(), [
            'email'=>'required|unique:users',
            'password'=>'required',
        ]);
        if($validator->fails())

        {
            return response()->json(['error'=>$validator->errors()->all()], status: 409);
        }

        $user =User::where('email',$request->email)->get()->first();
        $password=decrypt($user->password);
        if($user && $password==$request->password)
        {
            return response()->json(['user'=>$user]);

        }
        else
        {
            return response()->json(['error'=>["OOPS! Something went wrong" ]], status: 409);

        }
    }
}
