<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods_class extends Model
{
    //
    protected $table = "goods_class";
    protected $primaryKey = "goodsclass_id"; 
    public $timestamps = false;
}
