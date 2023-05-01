<?php

namespace App\Http\Controllers;

use App\Models\FakeVisitorModel;
use App\Models\UserWebsiteModel;
use App\Models\VisitorTrackingLavel2t2;
use Illuminate\Http\Request;

class CountriesPageController extends Controller
{
    function indexPage($id){
        // User ID
        $userid = session()->get('userid');

        // Get Domain Name
        $userSite = json_decode(UserWebsiteModel::where('user_id',$userid)->where('id',$id)->select('domain_name')->get(),true);
        $domainName = $userSite[0]['domain_name'];

        // get Countries Info
        $AllCountries = VisitorTrackingLavel2t2::where('user_id',$userid)->where('root_site_url',$domainName)->orderBy('id','desc')->select(VisitorTrackingLavel2t2::raw('user_id,visitor_ip,continents,country,country_code,region,city,latitude,longitude,capital,flag_img,timezone_id,date'))->get();
        $allCountries = json_decode($AllCountries);

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

        return view('Pages.countriesPage',[
            'id'=>$id,
            'userDomainName'=>$domainName,
            'allCountries'=>$allCountries,

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
        $AllPageLoadTime = VisitorTrackingLavel2t2::where('user_id',$userid)->orderBy('id','desc')->select(VisitorTrackingLavel2t2::raw('user_id,visitor_ip,continents,country,country_code,region,city,latitude,longitude,capital,flag_img,timezone_id,date'))->get();
        return $allDecodePageLoadTime = json_decode($AllPageLoadTime);

    }
}
