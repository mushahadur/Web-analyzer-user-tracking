<?php

namespace App\Http\Controllers;

use App\Models\FakeVisitorModel;
use App\Models\SitePagesLoadingTimeModel;
use App\Models\UserWebsiteModel;
use App\Models\VisitorTrackingLavel2t1;
use App\Models\VisitorTrackingLavel2t2;
use DOMDocument;
use DOMXPath;
use Illuminate\Http\Request;

class VisitorTrackingBySite extends Controller
{
    function SiteTrackIndex($id){
        // User ID
        $userid = session()->get('userid');

        // Get Domain Name
        $userSite = json_decode(UserWebsiteModel::where('user_id',$userid)->where('id',$id)->select('domain_name')->get(),true);
        $domainName = $userSite[0]['domain_name'];

        // get Device Info
        $NewdeviceName = VisitorTrackingLavel2t1::where('user_id',$userid)->where('domain_name',$domainName)->orderBy('id','desc')->select(VisitorTrackingLavel2t1::raw('device,count(*) as count'))->groupBy('device')->get();
        $newAllDevInfo = json_decode($NewdeviceName);

        // Browser Info
        $BrowserHis = VisitorTrackingLavel2t1::where('user_id',$userid)->where('domain_name',$domainName)->orderBy('id','desc')->select(VisitorTrackingLavel2t1::raw('browsers,count(*) as count'))->select(VisitorTrackingLavel2t1::raw('browsers,count(*) as count'))->groupBy('browsers')->take(5)->get();
        $browserInfo = json_decode($BrowserHis);

        // Get Domain Name
        $userSite = json_decode(UserWebsiteModel::where('user_id',$userid)->where('id',$id)->select('domain_name')->get(),true);
        $domainName = $userSite[0]['domain_name'];

        // Get Country
        $allCountrys = VisitorTrackingLavel2t2::where('user_id',$userid)->where('root_site_url',$domainName)->orderBy('id','desc')->select(VisitorTrackingLavel2t2::raw('country,count(*) as count,flag_img'))->groupBy('country')->groupBy('flag_img')->take(3)->get();
        $allCountryInfo = json_decode($allCountrys);

        // get Device Info
        $PageLoadTime = SitePagesLoadingTimeModel::where('user_id',$userid)->where('domain_name',$domainName)->orderBy('id','desc')->select(SitePagesLoadingTimeModel::raw('loading_time,page_url'))->groupBy('page_url')->groupBy('loading_time')->distinct()->take(5)->get()->unique('page_url');
        $decodePageLoadTime = json_decode($PageLoadTime);

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

        return view('Tracking.visitorTrackingBySite',[
            'id'=>$id,
            'userDomainName'=>$domainName,
            'newAllDevInfo'=>$newAllDevInfo,
            'allCountryInfo'=>$allCountryInfo,
            'browserInfo'=>$browserInfo,
            'decodePageLoadTime'=>$decodePageLoadTime,
            'totalVisitor'=>$totalVisitor,
            'realVisitor'=>$realVisitor,
            'totalFakeVisitor'=>$totalFakeVisitor,
            'realVisitorPercent'=>$realVisitorPercent,
            'FakeVisitorPercent'=>$FakeVisitorPercent,
            'totalVisitorPercent'=>$totalVisitorPercent
        ]);
    }

    function getAllBrowser(){
        $userid = session()->get('userid');
        $deviceName = VisitorTrackingLavel2t1::where('user_id',$userid)->orderBy('id')->select(VisitorTrackingLavel2t1::raw('browsers,count(*) as count'))->select(VisitorTrackingLavel2t1::raw('browsers,count(*) as count'))->groupBy('browsers')->get();
        return $dev = json_decode($deviceName);
    }

    function getAllDevice(){
        $userid = session()->get('userid');
        $deviceName = VisitorTrackingLavel2t1::where('user_id',$userid)->orderBy('id')->select(VisitorTrackingLavel2t1::raw('device,count(*) as count'))->select(VisitorTrackingLavel2t1::raw('device,count(*) as count'))->groupBy('device')->get();
        return $dev = json_decode($deviceName, true);
    }

    function countryTrackingForMap(){
        $userid = session()->get('userid');
        //$allCountrys = VisitorTrackingLavel2t2::where('user_id',$userid)->orderBy('id')->select(VisitorTrackingLavel2t2::raw('country,count(*) as count, country_code as name, latitude as latLng, longitude as lonLng'))->groupBy('country')->groupBy('country_code')->groupBy('latitude')->groupBy('longitude')->distinct()->get();

        $allCountrys = VisitorTrackingLavel2t2::where('user_id',$userid)->orderBy('id')->select(VisitorTrackingLavel2t2::raw('country,count(*) as count, country_code as name, CAST(latitude AS int) as latLng , CAST(longitude AS int) as lonLng'))->groupBy('country')->groupBy('country_code')->groupBy('latitude')->groupBy('longitude')->get();

        return $allCountryInfo = json_decode($allCountrys);

    }

    function overviewPageLoadTime(){
        // User ID
        $userid = session()->get('userid');
        // get Device Info
        $PageLoadTime = SitePagesLoadingTimeModel::where('user_id',$userid)->orderBy('id')->select(SitePagesLoadingTimeModel::raw('loading_time,page_url'))->groupBy('page_url')->groupBy('loading_time')->distinct()->take(5)->get()->unique('page_url');
        $decodePageLoadTime = json_decode($PageLoadTime, true);

        return $decodePageLoadTime;

    }



    function siteUrlAndLoadingTime(){
        $userid = session()->get('userid');
        // Get URL in a website =============================
        $arr = [];
        $sourceURL= "https://portfolio.hinirob.xyz/";
        //$sourceURL= "http://ecom.hinirob.com";
        $urlContent = file_get_contents($sourceURL);
        $dom = new DOMDocument();
        @$dom->loadHTML($urlContent);
        $xpath = new DOMXPath($dom);
        $hrefs = $xpath->evaluate("/html/body//a");

        // Find My Root Domain
        $parse = parse_url($sourceURL);
        $findRootExactHost =  $parse['host'];

        for($i = 0; $i < $hrefs->length; $i++){
            $href = $hrefs->item($i);
            $url = $href->getAttribute('href');
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // validate url
            if(!filter_var($url, FILTER_VALIDATE_URL) === false){

                $parseToPage = parse_url($url);
                $findPageHost =  $parseToPage['host'];

                if ($findRootExactHost == $findPageHost){
                    $start = microtime(true);
                    $homepage = file_get_contents($url);
                    $loadTime =  microtime(true)-$start;
                    $finalLoadTime = number_format($loadTime, 3);

                    $siteSingleUrl= '<a href="'.$url.'">'.$url.'</a><br />';

                    SitePagesLoadingTimeModel::insert([
                        'user_id'=>$userid,
                        'domain_name'=>$findPageHost,
                        'root_site_url'=>"https://portfolio.hinirob.xyz/",
                        'page_url'=>$siteSingleUrl,
                        'loading_time'=>$finalLoadTime,
                        'time'=>"1212",
                        'date'=>"1212"
                    ]);

                    //echo $loadTime;
                    $sLink = [
                        "siteSingleUrl"=>'<a href="'.$url.'">'.$url.'</a><br />',
                        "pageLoadTime"=>$finalLoadTime
                    ];
                }
                array_push($arr, $sLink);
            }
        }
        return $arr;
    }




    function fffff(){

        $userid = session()->get('userid');
        //return $deviceName = VisitorTrackingLavel2t1::where('user_id',$userid)->select('device')->count()->groupBy('device');
        //$deviceName = VisitorTrackingLavel2t1::select('device', VisitorTrackingLavel2t1::raw('count(*) as total'))->groupBy('device')->pluck('total','device');

        $deviceName = VisitorTrackingLavel2t1::where('user_id',$userid)->orderBy('id')->select(VisitorTrackingLavel2t1::raw('device,count(*) as count'))->groupBy('device')->get();
         $dev = json_decode($deviceName);

        $allCountrys = VisitorTrackingLavel2t2::where('user_id',$userid)->orderBy('id')->select(VisitorTrackingLavel2t2::raw('country,count(*) as count,flag_img'))->groupBy('country')->groupBy('flag_img')->get();
        return $allCountryInfo = json_decode($allCountrys);


    }



}
