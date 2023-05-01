<?php

namespace App\Http\Controllers;

use App\Models\FakeVisitorModel;
use App\Models\VisitorTrackingLavel2t1;
use App\Models\VisitorTrackingLavel2t2;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $userid = session()->get('userid');


        //=========================
        $realVisitor = VisitorTrackingLavel2t2::where('user_id',$userid)->count();
        $totalFakeVisitor = FakeVisitorModel::where('user_id',$userid)->count();
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
            //===================
        }



        return view('Pages.dashboard',[
            'totalVisitor'=>$totalVisitor,
            'realVisitor'=>$realVisitor,
            'totalFakeVisitor'=>$totalFakeVisitor,
            'realVisitorPercent'=>$realVisitorPercent,
            'FakeVisitorPercent'=>$FakeVisitorPercent,
            'totalVisitorPercent'=>$totalVisitorPercent
        ]);
    }


}
