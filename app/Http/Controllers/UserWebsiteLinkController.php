<?php

namespace App\Http\Controllers;

use App\Models\SitePagesLoadingTimeModel;
use App\Models\UserWebsiteModel;
use DOMXPath;
use Illuminate\Http\Request;
use DOMDocument;

class UserWebsiteLinkController extends Controller
{
    function index(){
        return view('Pages.addNewSite');
    }

    function getAllUserSiteList(){
        $userid = session()->get('userid');
        return $result = json_decode(UserWebsiteModel::where('user_id',$userid)->get());
    }

    function getUserSiteByID(Request $request){
        $siteId = $request->input('id');
        $userid = session()->get('userid');
        return $result = json_decode(UserWebsiteModel::where('user_id',$userid)->where('id',$siteId)->get());
    }

    function userSiteDelete(Request $request){
        $siteId = $request->input('id');
        $userid = session()->get('userid');
        $result = UserWebsiteModel::where('user_id',$userid)->where('id',$siteId)->delete();

        if ($result == true){
            return 1;
        }else{
            return 0;
        }
    }



    function addNewUserSite(Request $request){

        $suerId        = $request->input('suerId');
        $domainName    = $request->input('domainName');
        $domainURL     = $request->input('domainURL');
        $userEmail     = $request->input('userEmail');
        $tractCode          = $request->input('code');
        date_default_timezone_set('Asia/Dhaka');
        $time = date("h:i:sa");
        $date = date("d-m-Y");

        $result = UserWebsiteModel::insert([
            "user_id"       =>$suerId,
            "domain_name"   =>$domainName,
            "root_site_url" =>$domainURL,
            "privacy_status" =>"1",
            "notify_mail"   =>$userEmail,
            "tract_code"    =>$tractCode,
            "status"    =>"1",
            "time"          =>$time,
            "date"          =>$date
        ]);

        if ($result == true){
            return 1;
        }else{
            return 0;
        }


    }



    function updateNewUserSite(Request $request){
        $suerSiteId        = $request->input('suerSiteId');
        $domainName    = $request->input('domainName');
        $domainURL     = $request->input('domainURL');
        $userEmail     = $request->input('userEmail');
        $tractCode          = $request->input('code');
        date_default_timezone_set('Asia/Dhaka');
        $time = date("h:i:sa");
        $date = date("d-m-Y");

        $result = UserWebsiteModel::where('id',$suerSiteId)->update([
            "domain_name"   =>$domainName,
            "root_site_url" =>$domainURL,
            "privacy_status" =>"1",
            "notify_mail"   =>$userEmail,
            "tract_code"    =>$tractCode,
            "status"    =>"1",
            "time"          =>$time,
            "date"          =>$date
        ]);

        if ($result == true){
            return 1;
        }else{
            return 0;
        }
    }


}

