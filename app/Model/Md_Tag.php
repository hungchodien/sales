<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Md_Tag extends Model
{
    protected $table ;
    public function __construct (){
        $this->table = tag;
    }
}
