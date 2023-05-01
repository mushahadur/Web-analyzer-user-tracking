<?php

namespace App\Http\Controllers;

use App\Models\FakeVisitorModel;
use App\Models\UserWebsiteModel;
use App\Models\VisitorTrackingLavel2t1;
use App\Models\VisitorTrackingLavel2t2;
use App\Models\VisitorTrackingLevel1Model;
use DOMXPath;
use Illuminate\Http\Request;
use DOMDocument;

class VisitorTrackingController extends Controller
{

    function visitorTracking(Request $request){

        //$userID = $getIdSite[0]['user_id'];
        $userID = $request->input('userID');
        $userSiteFromLive = $request->input('userSite');

        $getIdSite = json_decode(UserWebsiteModel::where('user_id',$userID)->get(), true);

        $userSiteDomainName = $getIdSite[0]['domain_name'];
        $currentDomain = $_SERVER['HTTP_HOST'];
        //$currentDomain = $_SERVER['SERVER_NAME'];
        $visitorIP = $_SERVER['REMOTE_ADDR'];

        //$ip_address = $_SERVER['REMOTE_ADDR']; // Get IP Address
        date_default_timezone_set('Asia/Dhaka');
        $time = date("h:i:sa");
        $date = date("d-m-Y");

        // Get User Url
        if (isset($_SERVER['HTTP_REFERER'])) {
            $refURL = $_SERVER['HTTP_REFERER'];
        }else{
            $refURL = 'None';
        }
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        // get_browser_name
        function get_browser_name($user_agent){
            // Make case insensitive.
            $t = strtolower($user_agent);
            $t = " " . $t;
            // Humans / Regular Users
            if(strpos($t, 'opera') || strpos($t, 'opr/'))
                return 'Opera';
            elseif(strpos($t, 'edg'))
                return 'Edge';
            elseif(strpos($t, 'chrome'))
                return 'Chrome'           ;
            elseif(strpos($t, 'safari'))
                return 'Safari';
            elseif(strpos($t, 'firefox'))
                return 'Firefox';
            elseif(strpos($t, 'msie') || strpos($t, 'trident/7'))
                return 'Internet Explorer';
            elseif(strpos($t, 'uc') || strpos($t, 'trident/7'))
                return 'UC';

        }
        //get_search_engines_name
        function get_search_engines_name($user_agent){
            // Make case insensitive.
            $t = strtolower($user_agent);
            $t = " " . $t;

            // Search Engines
            if (strpos($t, 'google'))
                return '[Bot] Googlebot';
            elseif(strpos($t, 'bing'))
                return '[Bot] Bingbot';
            elseif(strpos($t, 'slurp'))
                return '[Bot] Yahoo! Slurp';
            elseif(strpos($t, 'duckduckgo'))
                return '[Bot] DuckDuckBot' ;
            elseif(strpos($t, 'baidu'))
                return '[Bot] Baidu';
            elseif(strpos($t, 'yandex'))
                return '[Bot] Yandex';
            elseif(strpos($t, 'sogou'))
                return '[Bot] Sogou';
            elseif(strpos($t, 'exabot'))
                return '[Bot] Exabot';
            elseif(strpos($t, 'msn'))
                return '[Bot] MSN';
            else{
                return 'Direct Link Throo';
            }
        }
        // get_common_tools_name
        function get_common_tools_name($user_agent){
            // Make case insensitive.
            $t = strtolower($user_agent);
            $t = " " . $t;

            // Common Tools and Bots
            if (strpos($t, 'mj12bot'))
                return '[Bot] Majestic'     ;
            elseif (strpos($t, 'ahrefs'))
                return '[Bot] Ahrefs';
            elseif (strpos($t, 'semrush'))
                return '[Bot] SEMRush';
            elseif (strpos($t, 'rogerbot') || strpos($t, 'dotbot'))
                return '[Bot] Moz or OpenSiteExplorer';
            elseif (strpos($t, 'frog') || strpos($t, 'screaming'))
                return '[Bot] Screaming Frog';

            // Miscellaneous
            elseif (strpos($t, 'facebook'  ))
                return '[Bot] Facebook';
            elseif (strpos($t, 'pinterest' ))
                return '[Bot] Pinterest';

            // Check for strings commonly used in bot user agents
            elseif (strpos($t, 'crawler' ) || strpos($t, 'api'    ) ||
                strpos($t, 'spider'  ) || strpos($t, 'http'   ) ||
                strpos($t, 'bot'     ) || strpos($t, 'archive') ||
                strpos($t, 'info'    ) || strpos($t, 'data'   )){
                return '[Bot] Other'   ;
            }else{
                return 'No Tools or Media';
            }
        }
        // Get Device Info
        function DeviceInfo(){
            // Check if the "mobile" word exists in User-Agent
            $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
            // Check if the "tablet" word exists in User-Agent
            $isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet"));

            if($isMob){
                if($isTab){
                    return 'Tablet';
                }else{
                    return 'Mobile';
                }
            }else{
                return 'Desktop';
            }

        }
        // Get Operating System Info
        function OperatingSystemInfo(){
            // Platform check
            $isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows"));
            $isAndroid = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android"));
            $isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone"));
            $isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad"));
            $isLinux = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "linux"));
            $isIOS = $isIPhone || $isIPad;

            if($isIOS){
                return 'iOS';
            }elseif($isAndroid){
                return 'ANDROID';
            }elseif($isWin){
                return 'WINDOWS';
            }elseif ($isLinux){
                return 'Linux';
            }
        }

        //======================================================
        $browser = get_browser_name($user_agent);
        $osName = OperatingSystemInfo();
        $socialBoot = get_common_tools_name($user_agent);
        $deviceName = DeviceInfo();
        $searchEngines = get_search_engines_name($user_agent);
        //==============================================================

        //=======================================
        $serverHostByAddr =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $serverName =  $_SERVER['SERVER_NAME'];
        $serverSoftware =  $_SERVER['SERVER_SOFTWARE'];
        $serverProtocol =  $_SERVER['SERVER_PROTOCOL'];
        $serverReqTime =  $_SERVER['REQUEST_TIME'];
        $serverReqTimeFloat =  $_SERVER['REQUEST_TIME_FLOAT'];
        $serverRootDoc =  $_SERVER['DOCUMENT_ROOT'];
        $serverHttpAcc =  $_SERVER['HTTP_ACCEPT'];
        $serverHttpAcEn =  $_SERVER['HTTP_ACCEPT_ENCODING'];
        $serverHttpConn =  $_SERVER['HTTP_CONNECTION'];
        $serverHost =  $_SERVER['HTTP_HOST'];
        $serverPort =  $_SERVER['REMOTE_PORT'];
        $serverScrFile =  $_SERVER['SCRIPT_FILENAME'];
        //========================================


        //===============================================
        //$ip = $_SERVER['REMOTE_ADDR'];
        $ip ="118.179.19.98";
        //$ip =$visitorIP;
        $ch = curl_init('http://ipwho.is/'.$ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $ipwhois = json_decode(curl_exec($ch), true);
        curl_close($ch);

        if ($ipwhois['success'] == false){

            VisitorTrackingLevel1Model::insert([
                'user_id'=>	$userID,
                'root_site_url'=>$userSiteFromLive,
                'visitor_ip'=>$ip,
                'time'=> $time,
                'date'=> $date,
            ]);

            $getTrackLevel1Info = json_decode(VisitorTrackingLevel1Model::orderBy('id', 'desc')->get(), true);
            $Level1VisitorIP = $getTrackLevel1Info[0]['visitor_ip'];
            if ($ip == $Level1VisitorIP){
                $level1ID = $getTrackLevel1Info[0]['id'];
            }

            VisitorTrackingLavel2t1::insert([
                'track_level1_id'=> $level1ID,
                'user_id'=> $userID,
                'root_site_url'=> $refURL,
                'domain_name'=> $userSiteFromLive,
                'visitor_ip'=> $ip,
                'referrer_url'=> $refURL,
                'browsers'=> $browser,
                'operating_systems'=> $osName,
                'device'=> $deviceName,
                'social_boot'=> $socialBoot,
                'search_engines'=> $searchEngines,
                'visitor_agent'=> $user_agent,
                'server_host_addr'=> $serverHostByAddr,
                'server_name'=> $serverName,
                'server_software'=> $serverSoftware,
                'server_protocol'=> $serverProtocol,
                'server_req_time'=> $serverReqTime,
                'server_req_time_float'=> $serverReqTimeFloat,
                'server_root_doc'=> $serverRootDoc,
                'server_http_accept'=> $serverHttpAcc,
                'server_http_accept_encode'=> $serverHttpAcEn,
                'server_http_connection'=> $serverHttpConn,
                'server_http_host'=> $serverHost,
                'server_remote_port'=> $serverPort,
                'script_file'=> $serverScrFile,
                'time'=> $time,
                'date'=> $date,
            ]);
            FakeVisitorModel::insert([
                'track_level1_id'=> $level1ID,
                'user_id'=> $userID,
                'root_site_url'=> $currentDomain,
                'domain_name'=> $userSiteFromLive,
                'visitor_ip'=> $ip,
                'success_status'=> $ipwhois['success'],
                'time'=> $time,
                'date'=> $date,
            ]);


        }else{

            VisitorTrackingLevel1Model::insert([
                'user_id'=>	$userID,
                'root_site_url'=>$userSiteFromLive,
                'visitor_ip'=>$ip,
                'time'=> $time,
                'date'=> $date,
            ]);

            $getTrackLevel1Info = json_decode(VisitorTrackingLevel1Model::orderBy('id', 'desc')->get(), true);
            $Level1VisitorIP = $getTrackLevel1Info[0]['visitor_ip'];
            if ($ip == $Level1VisitorIP){
                $level1ID = $getTrackLevel1Info[0]['id'];
            }

            VisitorTrackingLavel2t1::insert([
                'track_level1_id'=> $level1ID,
                'user_id'=> $userID,
                'root_site_url'=> $refURL,
                'domain_name'=> $userSiteFromLive,
                'visitor_ip'=> $ip,
                'referrer_url'=> $refURL,
                'browsers'=> $browser,
                'operating_systems'=> $osName,
                'device'=> $deviceName,
                'social_boot'=> $socialBoot,
                'search_engines'=> $searchEngines,
                'visitor_agent'=> $user_agent,
                'server_host_addr'=> $serverHostByAddr,
                'server_name'=> $serverName,
                'server_software'=> $serverSoftware,
                'server_protocol'=> $serverProtocol,
                'server_req_time'=> $serverReqTime,
                'server_req_time_float'=> $serverReqTimeFloat,
                'server_root_doc'=> $serverRootDoc,
                'server_http_accept'=> $serverHttpAcc,
                'server_http_accept_encode'=> $serverHttpAcEn,
                'server_http_connection'=> $serverHttpConn,
                'server_http_host'=> $serverHost,
                'server_remote_port'=> $serverPort,
                'script_file'=> $serverScrFile,
                'time'=> $time,
                'date'=> $date,
            ]);

            VisitorTrackingLavel2t2::insert([
                'track_level1_id'=>$level1ID,
                'user_id'=>$userID,
                'root_site_url'=>$userSiteFromLive,
                'visitor_ip'=>$ip,
                'success_status'=>$ipwhois['success'],
                'ipv_type'=>$ipwhois['type'],
                'continents'=>$ipwhois['continent'],
                'continent_code'=>$ipwhois['continent_code'],
                'country'=>$ipwhois['country'],
                'country_code'=>$ipwhois['country_code'],
                'region'=>$ipwhois['region'],
                'region_code'=>$ipwhois['region_code'],
                'city'=>$ipwhois['city'],
                'languages'=>"Bengli",
                'screen_resolutions'=>"true",
                'latitude'=>$ipwhois['latitude'],
                'longitude'=>$ipwhois['longitude'],
                'is_eu'=>$ipwhois['is_eu'],
                'postal'=>$ipwhois['postal'],
                'calling_code'=>$ipwhois['calling_code'],
                'capital'=>$ipwhois['capital'],
                'borders'=>$ipwhois['borders'],
                'flag_img'=>$ipwhois['flag']['img'],
                'flag_emoji_unicode'=>$ipwhois['flag']['emoji_unicode'],
                'connection_asn'=>$ipwhois['connection']['asn'],
                'connection_org'=>$ipwhois['connection']['org'],
                'connection_isp'=>$ipwhois['connection']['isp'],
                'connection_domain'=>$ipwhois['connection']['domain'],
                'timezone_id'=>$ipwhois['timezone']['id'],
                'timezone_abbr'=>$ipwhois['timezone']['abbr'],
                'timezone_is_dst'=>$ipwhois['timezone']['is_dst'],
                'timezone_offset'=>$ipwhois['timezone']['offset'],
                'timezone_utc'=>$ipwhois['timezone']['utc'],
                'timezone_current_time'=>$ipwhois['timezone']['current_time'],
                'time'=> $time,
                'date'=> $date
            ]);

        }
        //=========================================



    }






    function GetVisitorInfo(Request $request){
        return $userSiteFromLive = $request->input('userSite');

        $userId = 10001;
        $rootSiteURL = "https://ecom.hinirob.com";
        $ip_address = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Dhaka');
        $visit_time = date("h:i:sa");
        $visit_date = date("d-m-Y");

        /*
        $visitorLevel1 = VisitorTrackingLevel1Model::insert([
            "user_id"=>$userId,
            "root_site_url"=>$rootSiteURL,
            "visitor_ip"=>$ip_address,
            "time"=>$visit_time,
            "date"=>$visit_date
        ]);
        return $visitorLevel1;
        */
    }

    function getIpInfo(){

        /*/ Get IP Information ************************************
        //$ip = $_SERVER['REMOTE_ADDR'];
        $ip = "103.148.179.25";
        $ch = curl_init('http://ipwho.is/'.$ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $ipwhois = json_decode(curl_exec($ch), true);
        curl_close($ch);
        */


        //return $ipwhois['country'];
        //return $_SERVER['SCRIPT_FILENAME'];
        //return $_SERVER['SCRIPT_NAME'];
        //return $_SERVER['SCRIPT_URI'];
        //return $_SERVER['user-agent'];
        //return $_SERVER['HTTP_USER_AGENT'];
        //return $ipwhois;
        //return $ipwhois['flag']['img'];


        /*
        // Get Browser Name   ******************************
        $user_agent=$_SERVER['HTTP_USER_AGENT'];
        function biInfo($user_agent){
            if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
            elseif (strpos($user_agent, 'Edge')) return 'Edge';
            elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
            elseif (strpos($user_agent, 'Safari')) return 'Safari';
            elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
            elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
        }
        return biInfo($user_agent);
        */

        //dd(class_exists('DOMDocument'));


        /*
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

                    //echo $loadTime;
                    $sLink = [
                        "siteSingleUrl"=>'<a href="'.$url.'">'.$url.'</a><br />',
                        "pageLoadTime"=>$finalLoadTime
                    ];
                }

                array_push($arr, $sLink);
            }
        }

        */

        /*
        $start = microtime(true);
        $homepage = file_get_contents('https://portfolio.hinirob.xyz');
        $loadTime =  microtime(true)-$start;
        echo $loadTime;
        */
    }

/*
'track_level1_id'=> ,
'user_id'=> ,
'root_site_url'=> ,
'domain_name'=> ,
'visitor_ip'=> ,
'success_status'=> ,


    */

}
