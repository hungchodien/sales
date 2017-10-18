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
        switch ($slug){
            case slug_tintuc : {
                return view('Admin.TinTuc.index');
            }
            break;
        }
    }
    public function edit($slug){
        switch ($slug){
            case slug_tintuc : {
                return view('Admin.TinTuc.index' , ['data' => '']);
            }
            break;
        }
    }
    private function add_new_TinTuc(){

    }
}
