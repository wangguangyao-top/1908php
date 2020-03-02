<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
<<<<<<< HEAD
    //
    protected $table = "brand";
    protected $primaryKey = "brand_id"; 
    public $timestamps = false;
=======
    protected $table = 'brand';
    protected $primaryKey = 'p_id';
    public $timestamps = false;
    //黑名单
    protected $guarded =[];
>>>>>>> 216fabe2b7f8eac464cc03075e0075a75f6a9bfb
}
