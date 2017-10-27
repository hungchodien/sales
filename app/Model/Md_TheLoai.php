<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Md_TheLoai extends Model
{
    protected $table ;
    public function __construct (){
        $this->table = theloai;
    }
}
