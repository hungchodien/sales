<?php

namespace App\Http\Controllers;
use Config;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct (){
        //$data = DB::table('jb_OptionTable')->get();
        //$data_tin = DB::table('jb_OptionTable')->where('Ten','like', '%tintuc%')->first();
        define("tintuc", Config::get('database.prefix').Config::get('database.table.tintuc') , true);
        define("comment", Config::get('database.prefix').Config::get('database.table.comment') , true);
        define("customfield", Config::get('database.prefix').Config::get('database.table.customfield') , true);
        define("donhang", Config::get('database.prefix').Config::get('database.table.donhang') , true);
        define("loaisanpham", Config::get('database.prefix').Config::get('database.table.loaisanpham') , true);
        define("loaitin", Config::get('database.prefix').Config::get('database.table.loaitin') , true);
        define("option", Config::get('database.prefix').Config::get('database.table.option') , true);
        define("optiontable", Config::get('database.prefix').Config::get('database.table.optiontable') , true);
        define("quyen", Config::get('database.prefix').Config::get('database.table.quyen') , true);
        define("sanpham", Config::get('database.prefix').Config::get('database.table.sanpham') , true);
        define("slide", Config::get('database.prefix').Config::get('database.table.slide') , true);
        define("sub_donhang_sanpham", Config::get('database.prefix').Config::get('database.table.sub_donhang_sanpham') , true);
        define("sub_tintuc_tag", Config::get('database.prefix').Config::get('database.table.sub_tintuc_tag') , true);
        define("tag", Config::get('database.prefix').Config::get('database.table.tag') , true);
        define("thanhtoan", Config::get('database.prefix').Config::get('database.table.thanhtoan') , true);
        define("theloai", Config::get('database.prefix').Config::get('database.table.theloai') , true);
        define("migrations", Config::get('database.prefix').Config::get('database.table.migrations') , true);
        define("password_resets", Config::get('database.prefix').Config::get('database.table.password_resets') , true);
        define("users", Config::get('database.prefix').Config::get('database.table.users') , true);
    }
}
