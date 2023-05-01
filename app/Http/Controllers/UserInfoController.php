<?php

namespace App\Http\Controllers;

use App\Models\UserInfoModel;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    function loginPage(){
        return view('Pages.userLogin');
    }

    function userLogin(Request $request){
        $email = $request->input('email');
        $pass = $request->input('password');
        $password = md5($pass);

        $result = UserInfoModel::where('email',$email)->where('password',$password)->count();
        $userResult = UserInfoModel::where('email',$email)->where('password',$password)->get();
        $decodeuser = json_decode($userResult, true);
        $userId = $decodeuser[0]['user_id'];
        $userName = $decodeuser[0]['name'];

        if ($result == 1){
            $request->session()->put('userid', $userId);
            $request->session()->put('userMail', $email);
            $request->session()->put('userName', $userName);
            return 1;
        }else{
            return 0;
        }
    }

    function userRegistration(Request $request){
        $user_id  = rand(000001,999999);
        $name     = $request->input('name');
        $email    = $request->input('email');
        $phone    = $request->input('phone');
        $pass = $request->input('password');
        $password = md5($pass);

        date_default_timezone_set('Asia/Dhaka');
        $time = date("h:i:sa");
        $date = date("d-m-Y");

        $count = UserInfoModel::where('email',$email)->count();

        if ($count >= 1){
            return 10;
        }else{
            $result = UserInfoModel::insert([
                "user_id"=>$user_id,
                "name"=>$name,
                "phone"=>$phone,
                "email"=>$email,
                "password"=>$password,
                "status"=>0,
                "time"=>$time,
                "date"=>$date
            ]);

            if ($result == true){
                return 1;
            }else{
                return 0;
            }
        }

    }

    function onLogOut(Request $request){
        $request->session()->flush();
        return redirect('/user-login');
    }

}
