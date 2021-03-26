<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MDT_DT_TFC extends Model
{
    protected $table = 'MDT_DT_TFC';
    protected $fillable = ['id','title','starts','end'];
    public $timestamps = false;


}
