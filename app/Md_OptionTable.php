<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Md_OptionTable extends Model
{
    protected $table ;


    public function __construct (){
        $this->table = "jb_OptionTable";
    }
}