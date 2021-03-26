<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class MDT_TFC extends Model
// {
//     use HasFactory;

//     protected $table = 'MDT_TFC';

//     protected $guarded = [];

// }



class MDT_SER extends Model
{
    protected $table = 'MDT_SER';
    protected $guarded = [];

    public  function info()
    {
        return $this->belongsTo('App\Models\MDT_OFNI','substr(filler,0,14)','fms_acct_no');
    }
}
