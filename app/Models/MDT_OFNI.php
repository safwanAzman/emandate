<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class MDT_OFNI extends Model
// {
//     use HasFactory;

//     protected $table = 'MDT_OFNI';

//     protected $guarded = [];
   
//     public $timestamps = false;

//     protected $primaryKey = 'fms_acct_no';

// }


class MDT_OFNI extends Model
{
    protected $table = 'MDT_OFNI';
    protected $guarded = [];
    //protected $fillable = [];
    public $timestamps = false;
    protected $primaryKey = 'fms_acct_no';
        
    public  function cft()
    {
        return $this->hasMany('App\Models\MDT_TFC','payrefno','fms_acct_no');
    }

    public  function res()
    {
        return $this->hasMany('App\Models\MDT_SER','substr(filler,0,14)','fms_acct_no');
    }
}

