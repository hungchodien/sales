<?php

namespace App\Http\Controllers\Admin;
use App\Md_OptionTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('Admin.dashboard.index');
    }
    public function add($slug){
        switch ($slug){
            case slug_tintuc : {
                return view('Admin.TinTuc.add');
            }
            break;
        }
    }
    public function load($slug){
        switch ($slug){
            case slug_tintuc : {
                return view('Admin.TinTuc.index' );
            }
            break;
        }
    }
    private function add_new_TinTuc(){

    }
}
