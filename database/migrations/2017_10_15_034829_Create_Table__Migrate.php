<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = Config::get('database.prefix');

        Schema::create($prefix.'TheLoai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten')->nullable();
            $table->string('TenKhongDau')->nullable();
            $table->integer('Publish')->default(1);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('link_mobile')->nullable();
            $table->string('link_amp')->nullable();
            $table->timestamps();
        });
        Schema::create($prefix.'LoaiTin', function (Blueprint $table) {

            $prefix = Config::get('database.prefix');

            $table->increments('id');
            $table->string('Ten')->nullable();
            $table->string('TenKhongDau')->nullable();

            $table->integer('idTheLoai')->unsigned();
            $table->foreign('idTheLoai')->references('id')->on($prefix.'TheLoai');

            $table->integer('Publish')->default(1);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('link_mobile')->nullable();
            $table->string('link_amp')->nullable();
            $table->timestamps();
        });
        Schema::create($prefix.'Tag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten')->nullable();
            $table->string('slug')->nullable();

            $table->integer('Publish')->default(1);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('link_mobile')->nullable();
            $table->string('link_amp')->nullable();
            $table->timestamps();
        });

        Schema::create($prefix.'TinTuc', function (Blueprint $table) {

            $table->increments('id');
            $table->string('TieuDe')->nullable();
            $table->string('TieuDeKhongDau')->nullable();
            $table->text('TomTat')->nullable();
            $table->longText('NoiDung')->nullable();
            $table->string('Thumbnail')->nullable();
            $table->integer('NoiBat')->default(0);
            $table->integer('LuotView')->default(0);
            $table->integer('LuotLike')->default(0);

            $table->integer('idLoaiTin')->unsigned();
            $table->foreign('idLoaiTin')->references('id')->on(Config::get('database.prefix').'LoaiTin');

            $table->bigInteger('parent')->default(0);
            $table->integer('Publish')->default(1);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('link_mobile')->nullable();
            $table->string('link_amp')->nullable();
            $table->timestamps();
        });

        Schema::create($prefix.'Sub_TinTuc_Tag', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('idTag')->unsigned();
            $table->foreign('idTag')->references('id')->on(Config::get('database.prefix').'Tag');
            $table->integer('idTinTuc')->unsigned();
            $table->foreign('idTinTuc')->references('id')->on(Config::get('database.prefix').'TinTuc');

            $table->timestamps();
        });

        Schema::create($prefix.'Comment', function (Blueprint $table) {

            $table->increments('id');
            $table->string('NoiDung')->nullable();
            $table->integer('LuotView')->default(0);
            $table->integer('LuotLike')->default(0);

            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('Users');

            $table->integer('idTinTuc')->unsigned();
            $table->foreign('idTinTuc')->references('id')->on(Config::get('database.prefix').'TinTuc');

            $table->integer('Publish')->default(1);
            $table->timestamps();
        });

        Schema::create($prefix.'Quyen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten')->nullable();
            $table->string('Option')->nullable();
            $table->integer('Option_Values')->default(1);
            $table->timestamps();
        });
        Schema::create($prefix.'OptionTable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten')->nullable();
            $table->integer('Publish')->default(1);
            $table->timestamps();
        });
        Schema::create($prefix.'CustomField', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MetaKey')->nullable();
            $table->longText('MetaValues')->nullable();
            $table->integer('idOptionTable')->nullable();
            $table->bigInteger('parent')->default(0);
            $table->integer('Publish')->default(1);
            $table->timestamps();
        });
        Schema::create($prefix.'Option', function (Blueprint $table) {
            $table->increments('id');
            $table->string('OptionName')->nullable();
            $table->longText('OptionValues')->nullable();
            $table->integer('AutoLoad')->default(1);
            $table->timestamps();
        });

        Schema::create($prefix.'LoaiSanPham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten')->nullable();
            $table->bigInteger('Parent')->default(0);
            $table->timestamps();
        });
        Schema::create($prefix.'SanPham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten')->nullable();
            $table->integer('Price')->default(0);
            $table->integer('Discount')->default(0);
            $table->integer('LuotView')->default(0);
            $table->integer('LuotLike')->default(0);

            $table->string('Thumbnail')->nullable();
            $table->mediumText('ImagesList')->nullable();// use character : &#character;

            $table->integer('idLoaiSanPham')->unsigned();
            $table->foreign('idLoaiSanPham')->references('id')->on(Config::get('database.prefix').'LoaiSanPham');
            $table->timestamps();
        });

        Schema::create($prefix.'ThanhToan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Status')->default(0);
            $table->bigInteger('Amount')->default(1);
            $table->string('Payment')->nullable();
            $table->longText('PaymentInformation')->nullable();
            $table->string('Security', 16)->nullable();
            $table->integer('Publish')->default(1);
            $table->timestamps();
        });

        Schema::create($prefix.'DonHang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Amount')->nullable();

            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('Users');
            $table->integer('idThanhToan')->unsigned();
            $table->foreign('idThanhToan')->references('id')->on(Config::get('database.prefix').'ThanhToan');
            $table->integer('Publish')->default(1);
            $table->timestamps();
        });

        Schema::create($prefix.'Sub_DonHang_SanPham', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Quanlity')->default(1);
            $table->integer('idDonHang')->unsigned();
            $table->foreign('idDonHang')->references('id')->on(Config::get('database.prefix').'DonHang');
            $table->integer('idSanPham')->unsigned();
            $table->foreign('idSanPham')->references('id')->on(Config::get('database.prefix').'SanPham');
            $table->integer('Publish')->default(1);
            $table->timestamps();
        });

        Schema::create($prefix.'Slide', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten')->nullable();
            $table->string('Hinh')->nullable();
            $table->string('NoiDung')->nullable();
            $table->string('link')->nullable();
            $table->integer('Publish')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('database.prefix').'Slide');
        Schema::dropIfExists(Config::get('database.prefix').'Sub_DonHang_SanPham');
        Schema::dropIfExists(Config::get('database.prefix').'DonHang');
        Schema::dropIfExists(Config::get('database.prefix').'ThanhToan');
        Schema::dropIfExists(Config::get('database.prefix').'SanPham');
        Schema::dropIfExists(Config::get('database.prefix').'LoaiSanPham');
        Schema::dropIfExists(Config::get('database.prefix').'CustomField');
        Schema::dropIfExists(Config::get('database.prefix').'OptionTable');
        Schema::dropIfExists(Config::get('database.prefix').'Quyen');
        Schema::dropIfExists(Config::get('database.prefix').'Comment');
        Schema::dropIfExists(Config::get('database.prefix').'Sub_TinTuc_Tag');
        Schema::dropIfExists(Config::get('database.prefix').'TinTuc');
        Schema::dropIfExists(Config::get('database.prefix').'Tag');
        Schema::dropIfExists(Config::get('database.prefix').'LoaiTin');
        Schema::dropIfExists(Config::get('database.prefix').'TheLoai');
    }
}
