<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use voku\helper\HtmlDomParser;

class KeywordResearchController extends Controller
{
    function indexPage(){
        return view('Keyword.keywordHome');
    }

    function metaTagHome(){
        return view('Keyword.metaTagHome');
    }

    function keywordHome(Request $request){

        $queryData = $request->input('keywordName');

        if (strlen($queryData) < 5){
            return redirect('/keywordHome');
        }

        if (!empty($queryData)){

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://google.serper.dev/search',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{"q":"'.$queryData.'","gl":"us","hl":"en","autocorrect":true}',
                CURLOPT_HTTPHEADER => array(
                    'X-API-KEY: 46a56a7fac2aa0bba53b9fbf71284b65f919828d',
                    'Content-Type: application/json'
                ),
            ));
            $response = json_decode(curl_exec($curl), true);
            curl_close($curl);

            // Find Organic Result
            $organicArr = [];
            $organic = $response['organic'];
            for ($i=0; $i<sizeof($organic); $i++){
                $arr =[
                    "orgTitle"=>$organic[$i]['title'],
                    "orgSnippet"=>$organic[$i]['snippet']
                ];
                array_push($organicArr, $arr);
            }
            $organic = $organicArr;

            // Find people Also Ask Result
            $peopleAlsoAskArr = [];
            $peopleAlsoAsk = $response['peopleAlsoAsk'];
            for ($i=0; $i<sizeof($peopleAlsoAsk); $i++){
                $askArr =[
                    "question"=>$peopleAlsoAsk[$i]['question'],
                    "questionAns"=>$peopleAlsoAsk[$i]['snippet'],
                    "questionTitle"=>$peopleAlsoAsk[$i]['title']
                ];
                array_push($peopleAlsoAskArr, $askArr);
            }
            $peopleAlsoAsk = $peopleAlsoAskArr;

            // Find Related Search Result
            $relatedSearchArr = [];
            $relatedSearches = $response['relatedSearches'];
            for ($i=0; $i<sizeof($relatedSearches); $i++){
                $arr =[
                    "query"=>$relatedSearches[$i]['query'],
                ];
                array_push($relatedSearchArr, $arr);
            }
            $relatedSearch = $relatedSearchArr;

            return view('Keyword.keywordHome',[
                'organicArr'=>$organic,
                'peopleAlsoAskArr'=>$peopleAlsoAsk,
                'relatedSearchArr'=>$relatedSearch,
                'userKeySearch'=>$queryData
            ]);
        }else{
            return view('Keyword.keywordHome');
        }



    }

    function test(){

        $url = "https://www.google.com/";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://www.google.com/search?q=organic food");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $html = curl_exec($curl);
        curl_close($curl);

// initialize HtmlDomParser
        $htmlDomParser = HtmlDomParser::str_get_html($html);

        //print_r($htmlDomParser);


        $productDataLit = array();

// retrieve the list of products on the page
        //$productElements = $htmlDomParser->find(".LHJvCe");
        $url = $htmlDomParser->findOne("#result-stats")->text;

        dd($url);



    }





    public function keyWordData(Request $request){
        $queryData = $request->input('dataQuery');
/*
        $string = file_get_contents("../public/jsonDataFile/my.json");
        $jsonData = json_decode($string, true);

        //return $searchParameters = $jsonData['searchParameters'];
        //return $knowledgeGraph = $jsonData['knowledgeGraph'];
        //return $organic = $jsonData['organic'];
        //$relatedSearches = $jsonData['relatedSearches'];

        // Find Knowledge Graph Result
        $knowledgeGraphArr = [];
        $knowledgeGraph = $jsonData['knowledgeGraph'];
        $knowledgeArr =[
            "kngTitle"=>$knowledgeGraph['title'],
            "kngDescription"=>$knowledgeGraph['description']
        ];
        array_push($knowledgeGraphArr, $knowledgeArr);


        // Find Organic Result
       $orgArr = [];
       $organic = $jsonData['organic'];
        for ($i=0; $i<sizeof($organic); $i++){
           $arr =[
               "orgTitle"=>$organic[$i]['title'],
               "orgSnippet"=>$organic[$i]['snippet']
           ];
            array_push($orgArr, $arr);
        }


        // Find Related Search Result
        $relatedSearchArr = [];
        $relatedSearches = $jsonData['relatedSearches'];
        for ($i=0; $i<sizeof($relatedSearches); $i++){
            $arr =[
                "query"=>$relatedSearches[$i]['query'],
            ];
            array_push($relatedSearchArr, $arr);
        }
        $array = array($knowledgeGraphArr, $orgArr, $relatedSearchArr);
*/


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://google.serper.dev/search',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"q":"best book","gl":"us","hl":"en","autocorrect":true}',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: 46a56a7fac2aa0bba53b9fbf71284b65f919828d',
                'Content-Type: application/json'
            ),
        ));

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);


        // Find Knowledge Graph Result
//        $knowledgeGraphArr = [];
//        $knowledgeGraph = $response['knowledgeGraph'];
//        $knowledgeArr =[
//            "kngTitle"=>$knowledgeGraph['title'],
//            "kngDescription"=>$knowledgeGraph['description']
//        ];
//        array_push($knowledgeGraphArr, $knowledgeArr);


        // Find Organic Result
        $organicArr = [];
        $organic = $response['organic'];
        for ($i=0; $i<sizeof($organic); $i++){
            $arr =[
                "orgTitle"=>$organic[$i]['title'],
                "orgSnippet"=>$organic[$i]['snippet']
            ];
            array_push($organicArr, $arr);
        }
        $organic = $organicArr;

        // Find people Also Ask Result
        $peopleAlsoAskArr = [];
        $peopleAlsoAsk = $response['peopleAlsoAsk'];
        for ($i=0; $i<sizeof($peopleAlsoAsk); $i++){
            $askArr =[
                "question"=>$peopleAlsoAsk[$i]['question'],
                "questionAns"=>$peopleAlsoAsk[$i]['snippet'],
                "questionTitle"=>$peopleAlsoAsk[$i]['title']
            ];
            array_push($peopleAlsoAskArr, $askArr);
        }
        $peopleAlsoAsk = $peopleAlsoAskArr;

        // Find Related Search Result
        $relatedSearchArr = [];
        $relatedSearches = $response['relatedSearches'];
        for ($i=0; $i<sizeof($relatedSearches); $i++){
            $arr =[
                "query"=>$relatedSearches[$i]['query'],
            ];
            array_push($relatedSearchArr, $arr);
        }
        $relatedSearch = $relatedSearchArr;

        return view('Keyword.keywordHome',[
            'organicArr'=>$organic,
            'peopleAlsoAskArr'=>$peopleAlsoAsk,
            'relatedSearchArr'=>$relatedSearch,
        ]);

    }

}
