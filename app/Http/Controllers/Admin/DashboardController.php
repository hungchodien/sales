<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('Admin.dashboard.index');
    }
    public function add_new($slug){
        ///get slug tin tuc

        if($slug == 'Tin-Tuc')
            echo "Tin túc";
        else
            echo $slug;
    }
    private function add_new_TinTuc(){

    }
}
