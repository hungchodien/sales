<?php

use Illuminate\Database\Seeder;

class create_data_quyen_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(Config::get('database.prefix').'Quyen')->insert(
            [
                'Ten' => 'người dùng thông thường',//1
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        DB::table(Config::get('database.prefix').'Quyen')->insert(
            [
                'Ten' => 'người dùng mới đăng kí admin',//2
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        DB::table(Config::get('database.prefix').'Quyen')->insert(
            [
                'Ten' => 'manager',// 3
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        DB::table(Config::get('database.prefix').'Quyen')->insert(
            [
                'Ten' => 'sub admin',/// 4
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        DB::table(Config::get('database.prefix').'Quyen')->insert(
            [
                'Ten' => 'supper admin',// 5
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}
