<?php

namespace App\Http\Controllers\Admin;
use App\Md_OptionTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        /// load hết tất cả data
        $data = Md_OptionTable::all();
        $data_slug_Tin_Tuc = Md_OptionTable::where('Ten' , "jb_tintuc")->get();


        return view('Admin.dashboard.index', ['data' => $data, 'data_slug_Tin_Tuc' => $data_slug_Tin_Tuc[0]]);
    }
    public function add($slug){
        ///get slug tin tuc
        echo "controller : add ";
        echo $slug;
        echo "<br>";
        var_dump(tintuc) ;
        switch ($slug){
            case tintuc : {
                echo "<br>đã vào case!! ";
                echo "<br>đã vào case!! ";
                echo "<br>đã vào case!! ";
            }
            break;
        }
    }
    public function edit($slug){
        ///get slug tin tuc
        echo "controller : edit (load all)";

        echo $slug;
    }
    private function add_new_TinTuc(){

    }
}
