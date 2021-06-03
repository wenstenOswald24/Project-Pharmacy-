<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController extends Controller{

    public function register(Request $request){
        $admin = new Admin();
        $admin->name = $request->name;       
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->type = $request->type;
        $admin->save();

        return "Successfully saved ";
        }

    public function login(Request $request){
        $loginData = Admin::where('name',$request->name)->get('password');
        if($request->password == $loginData[0]->password){
            return "Login Successfull";
        }
        else{
            return "Login Failed";
        }
    
    }
}   

