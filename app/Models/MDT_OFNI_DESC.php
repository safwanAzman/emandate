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


class MDT_OFNI_DESC extends Model
{
    protected $table = 'MDT_OFNI_DESC';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'IDDESC';
        
    public  function INFO()
    {
        return $this->belongsTo('App\Models\MDT_OFNI','IDDESC','fms_acct_no');
    }
}

