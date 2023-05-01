<?php

namespace App\Http\Controllers;

use App\Models\FakeVisitorModel;
use App\Models\UserWebsiteModel;
use App\Models\VisitorTrackingLavel2t1;
use App\Models\VisitorTrackingLavel2t2;
use Illuminate\Http\Request;

class ContinentsPageController extends Controller
{
    function indexPage($id){
        // User ID
        $userid = session()->get('userid');

        // Get Domain Name
        $userSite = json_decode(UserWebsiteModel::where('user_id',$userid)->where('id',$id)->select('domain_name')->get(),true);
        $domainName = $userSite[0]['domain_name'];

        // get Continents Info
        $AllContinents = VisitorTrackingLavel2t2::where('user_id',$userid)->where('root_site_url',$domainName)->orderBy('id','desc')->select(VisitorTrackingLavel2t2::raw('user_id,root_site_url,visitor_ip,continents,continent_code,timezone_id,timezone_utc,time,date'))->get();
        $allContinents = json_decode($AllContinents);

        //=========================
        $realVisitor = VisitorTrackingLavel2t2::where('user_id',$userid)->where('root_site_url',$domainName)->count();
        $totalFakeVisitor = FakeVisitorModel::where('user_id',$userid)->where('domain_name',$domainName)->count();
        $totalVisitor = $realVisitor + $totalFakeVisitor;

        if ($totalVisitor == 0 ){
            $realVisitorPercent = 0;
            $FakeVisitorPercent = 0;
            $totalVisitorPercent = 0;
        }else{
            // % = target * 100 / Total
            $realVisitorPercent = number_format(($realVisitor * 100) / $totalVisitor, 2);
            $FakeVisitorPercent = number_format(($totalFakeVisitor * 100) / $totalVisitor, 2);
            $totalVisitorPercent = number_format(($totalVisitor * 100) / $totalVisitor, 2);
        }
        //===================

        return view('Pages.continentsPage',[
            'id'=>$id,
            'userDomainName'=>$domainName,
            'allContinents'=>$allContinents,

            'totalVisitor'=>$totalVisitor,
            'realVisitor'=>$realVisitor,
            'totalFakeVisitor'=>$totalFakeVisitor,
            'realVisitorPercent'=>$realVisitorPercent,
            'FakeVisitorPercent'=>$FakeVisitorPercent,
            'totalVisitorPercent'=>$totalVisitorPercent
        ]);
    }

    function test(){
        $userid = session()->get('userid');
        // get Device Info
        $AllPageLoadTime = VisitorTrackingLavel2t2::where('user_id',$userid)->orderBy('id','desc')->select(VisitorTrackingLavel2t2::raw('user_id,root_site_url,visitor_ip,continents,continent_code,timezone_id,time,date'))->get();
        return $allDecodePageLoadTime = json_decode($AllPageLoadTime);

    }
}
