<?php

namespace App\Http\Controllers;

use App\Models\SitePagesLoadingTimeModel;
use DOMXPath;
use Illuminate\Http\Request;
use DOMDocument;

class SitePagesLoadingTimeController extends Controller
{
    function sitePageUrlAndLoadingTime(Request $request){
        $userid = session()->get('userid');

        $domainName = $request->input('domainName');
        $domainURL = $request->input('domainURL');

        date_default_timezone_set('Asia/Dhaka');
        $time = date("h:i:sa");
        $date = date("d-m-Y");

        // Get URL in a website =============================
        $arr = [];
        $sourceURL="https://portfolio.hinirob.xyz/";
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

                    $siteSingleUrl= $url;

                    SitePagesLoadingTimeModel::insert([
                        'user_id'=>$userid,
                        'domain_name'=>$findPageHost,
                        'root_site_url'=>"https://".$findPageHost."/",
                        'page_url'=>$siteSingleUrl,
                        'loading_time'=>$finalLoadTime,
                        'time'=>$time,
                        'date'=>$date
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
        //return $arr;
    }





}
