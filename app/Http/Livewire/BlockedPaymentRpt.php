<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Ld;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

//use App\EMANDATEINFO;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class BlockedPaymentRpt extends LivewireDatatable
{
    //MDT_OFNI::WHERE('BLOCKED_PAYMNT_STATUS','=','0')->get();

    public $model = Ld::class;

    function columns()
    {
    	return [
    		NumberColumn::name('fms_acct_no')->label('No_Akaun')->sortBy('fms_cc_no'),
    		Column::name('buyername')->label('Pemohon'),
    		Column::name('debitamt')->label('Debit_Amount'),
            Column::name('Purpose')->label('Skim'),
            Column::name('Blockedby')->label('Disekat Oleh'),
            Column::name('Status_desc')->label('Sebab')
    		//DateColumn::name('created_at')->label('Creation Date')
    	];
    }

    

}