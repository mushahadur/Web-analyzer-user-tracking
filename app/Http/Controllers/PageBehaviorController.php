<?php

namespace App\Http\Controllers;

use App\Models\FakeVisitorModel;
use App\Models\SitePagesLoadingTimeModel;
use App\Models\UserWebsiteModel;
use App\Models\VisitorTrackingLavel2t2;
use Illuminate\Http\Request;

class PageBehaviorController extends Controller
{
    function indexPage($id){
        // User ID
        $userid = session()->get('userid');

        // Get Domain Name
        $userSite = json_decode(UserWebsiteModel::where('user_id',$userid)->where('id',$id)->select('domain_name')->get(),true);
        $domainName = $userSite[0]['domain_name'];

        // get Device Info
        $AllPageLoadTime = SitePagesLoadingTimeModel::where('user_id',$userid)->where('domain_name',$domainName)->orderBy('id')->select(SitePagesLoadingTimeModel::raw('user_id,domain_name,root_site_url,loading_time,page_url'))->groupBy('page_url')->groupBy('loading_time')->groupBy('user_id')->groupBy('domain_name')->groupBy('root_site_url')->get()->unique('page_url');
        $allDecodePageLoadTime = json_decode($AllPageLoadTime);

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

        return view('Pages.behaviorPage',[
            'id'=>$id,
            'userDomainName'=>$domainName,
            'allDecodePageLoadTime'=>$allDecodePageLoadTime,

            'totalVisitor'=>$totalVisitor,
            'realVisitor'=>$realVisitor,
            'totalFakeVisitor'=>$totalFakeVisitor,
            'realVisitorPercent'=>$realVisitorPercent,
            'FakeVisitorPercent'=>$FakeVisitorPercent,
            'totalVisitorPercent'=>$totalVisitorPercent
        ]);
    }
}
