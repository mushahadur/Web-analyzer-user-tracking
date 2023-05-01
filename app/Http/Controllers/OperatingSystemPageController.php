<?php

namespace App\Http\Controllers;

use App\Models\FakeVisitorModel;
use App\Models\UserWebsiteModel;
use App\Models\VisitorTrackingLavel2t1;
use App\Models\VisitorTrackingLavel2t2;
use Illuminate\Http\Request;

class OperatingSystemPageController extends Controller
{
    //operatingSystemPage

    function indexPage($id){
        // User ID
        $userid = session()->get('userid');

        // Get Domain Name
        $userSite = json_decode(UserWebsiteModel::where('user_id',$userid)->where('id',$id)->select('domain_name')->get(),true);
        $domainName = $userSite[0]['domain_name'];

        // get Operating System Info
        $AllOperatingSystem = VisitorTrackingLavel2t1::where('user_id',$userid)->where('domain_name',$domainName)->orderBy('id','desc')->select(VisitorTrackingLavel2t1::raw('user_id,visitor_ip,operating_systems,time,date'))->get();
        $allOperatingSystem = json_decode($AllOperatingSystem);

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

        return view('Pages.operatingSystemPage',[
            'id'=>$id,
            'userDomainName'=>$domainName,
            'allOperatingSystem'=>$allOperatingSystem,

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
        $AllPageLoadTime = VisitorTrackingLavel2t1::where('user_id',$userid)->orderBy('id')->select(VisitorTrackingLavel2t1::raw('user_id,visitor_ip,social_boot,time,date'))->get();
        return $allDecodePageLoadTime = json_decode($AllPageLoadTime);

    }
}
