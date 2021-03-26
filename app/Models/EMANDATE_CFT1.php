<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDT_TFC1 extends Model
{
    use HasFactory;

    protected $table = 'MDT_TFC1';

    public $timestamps = false;

    protected $primaryKey = 'BUYERACC';

    // protected $guarded = [];

    protected $fillable = [];

}
