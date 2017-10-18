<?php

use Illuminate\Database\Seeder;

class create_data_option_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()//'Slug'=>changeTitle(),
    {
        DB::table(Config::get('database.prefix').'OptionTable')->insert([
            [ 'Ten' => Config::get('database.prefix').'comment', 'Slug'=>changeTitle('comment'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'customfield', 'Slug'=>changeTitle('Custom Field'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'donhang', 'Slug'=>changeTitle('Đơn Hàng'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'loaisanpham', 'Slug'=>changeTitle('Loại Sản Phẩm'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'loaitin', 'Slug'=>changeTitle('Loại Tin'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'option', 'Slug'=>changeTitle('Option'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'optiontable', 'Slug'=>changeTitle('Option Table'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'quyen', 'Slug'=>changeTitle('Quyền'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'sanpham', 'Slug'=>changeTitle('Sản Phẩm'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'slide', 'Slug'=>changeTitle('Slide'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'sub_donhang_sanpham', 'Slug'=>changeTitle('Sub Đơn Hàng Sản Phẩm'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'sub_tintuc_tag', 'Slug'=>changeTitle('Sub Tin Tức Tag'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'tag', 'Slug'=>changeTitle('Tag'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'thanhtoan', 'Slug'=>changeTitle('Thanh Toán'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'theloai', 'Slug'=>changeTitle('Thể Loại'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => Config::get('database.prefix').'tintuc', 'Slug'=>changeTitle('Tin Tức'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => 'migrations', 'Slug'=>changeTitle('migrations'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => 'password_resets', 'Slug'=>changeTitle('password resets'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'Ten' => 'users', 'Slug'=>changeTitle('users'),'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ]
        ]);
    }
}
