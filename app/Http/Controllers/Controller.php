<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct (){

        define("Id_tintuc", Config::get('database.table.tintuc.id') , true);
        //$data = DB::table('jb_OptionTable')->get();
        //$data_tin = DB::table('jb_OptionTable')->where('Ten','like', '%tintuc%')->first();
        define("tintuc", Config::get('database.prefix').Config::get('database.table.tintuc.Ten') , true);
        define("comment", Config::get('database.prefix').Config::get('database.table.comment.Ten') , true);
        define("customfield", Config::get('database.prefix').Config::get('database.table.customfield.Ten') , true);
        define("donhang", Config::get('database.prefix').Config::get('database.table.donhang.Ten') , true);
        define("join", Config::get('database.prefix').Config::get('database.table.join.Ten') , true);
        define("loaisanpham", Config::get('database.prefix').Config::get('database.table.loaisanpham.Ten') , true);
        define("loaitin", Config::get('database.prefix').Config::get('database.table.loaitin.Ten') , true);
        define("option", Config::get('database.prefix').Config::get('database.table.option.Ten') , true);
        define("optiontable", Config::get('database.prefix').Config::get('database.table.optiontable.Ten') , true);
        define("quyen", Config::get('database.prefix').Config::get('database.table.quyen.Ten') , true);
        define("sanpham", Config::get('database.prefix').Config::get('database.table.sanpham.Ten') , true);
        define("slide", Config::get('database.prefix').Config::get('database.table.slide.Ten') , true);
        define("sub_donhang_sanpham", Config::get('database.prefix').Config::get('database.table.sub_donhang_sanpham.Ten') , true);
        define("tag", Config::get('database.prefix').Config::get('database.table.tag.Ten') , true);
        define("thanhtoan", Config::get('database.prefix').Config::get('database.table.thanhtoan.Ten') , true);
        define("theloai", Config::get('database.prefix').Config::get('database.table.theloai.Ten') , true);
        define("migrations", Config::get('database.prefix').Config::get('database.table.migrations.Ten') , true);
        define("password_resets", Config::get('database.prefix').Config::get('database.table.password_resets.Ten') , true);
        define("users", Config::get('database.prefix').Config::get('database.table.users.Ten') , true);


        define("Slug_tintuc", Config::get('database.table.tintuc.Slug') , true);
        define("Slug_comment", Config::get('database.table.comment.Slug') , true);
        define("Slug_customfield", Config::get('database.table.customfield.Slug') , true);
        define("Slug_donhang", Config::get('database.table.donhang.Slug') , true);
        define("Slug_join", Config::get('database.prefix').Config::get('database.table.join.Slug') , true);
        define("Slug_loaisanpham", Config::get('database.table.loaisanpham.Slug') , true);
        define("Slug_loaitin", Config::get('database.table.loaitin.Slug') , true);
        define("Slug_option", Config::get('database.table.option.Slug') , true);
        define("Slug_optiontable", Config::get('database.table.optiontable.Slug') , true);
        define("Slug_quyen", Config::get('database.table.quyen.Slug') , true);
        define("Slug_sanpham", Config::get('database.table.sanpham.Slug') , true);
        define("Slug_slide", Config::get('database.table.slide.Slug') , true);
        define("Slug_sub_donhang_sanpham", Config::get('database.table.sub_donhang_sanpham.Slug') , true);
        define("Slug_tag", Config::get('database.table.tag.Slug') , true);
        define("Slug_thanhtoan", Config::get('database.table.thanhtoan.Slug') , true);
        define("Slug_theloai", Config::get('database.table.theloai.Slug') , true);
        define("Slug_migrations", Config::get('database.table.migrations.Slug') , true);
        define("Slug_password_resets", Config::get('database.table.password_resets.Slug') , true);
        define("Slug_users", Config::get('database.table.users.Slug') , true);


        ////select database hoặc get valuues ReloadXML from config:
        $ReloadXML = Config::get('database.ReloadXML');
        if($ReloadXML != 1):
            ///select vào hệ thống database
            /// hiện tại đang select thiếu
            /// đúng ra phải có thêm phần where blabla and auto_load = 1
            $ReloadXML = DB::table(option)->where('OptionName','ReloadXML')->get();
            var_dump($ReloadXML);
        endif;
    }
}
