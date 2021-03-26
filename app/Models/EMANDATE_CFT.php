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



class MDT_TFC extends Model
{
    protected $table = 'MDT_TFC';
    protected $guarded = [];

    public  function info()
    {
        return $this->belongsTo('App\Models\MDT_OFNI','payrefno','fms_acct_no');
    }
}
