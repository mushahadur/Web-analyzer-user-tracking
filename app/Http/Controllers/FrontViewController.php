<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontViewController extends Controller
{
    function indexFrontView(){
        return view('FrontView.frontView');
    }

    function mainCoreView(){
        return view('Keyword.index');
    }


}
