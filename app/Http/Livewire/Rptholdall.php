<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MDT_OFNI;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Rptholdall extends Component
{
    use WithPagination;
    public $findrptholdall = '';
    public $idrptholdall;

    public function mount($id)
    {
        $this->idrptholdall = $id;
    }

    public function render()
    {

        $findrptholdall =  "%".$this->findrptholdall."%";
        $idrptholdall =  "%".$this->idrptholdall."%";


        return view('livewire.rptholdall',[

            'rptdetails_holdall' => MDT_OFNI::where('blockpayment_date','like', $idrptholdall)
                                 ->where('fms_acct_no','like', $findrptholdall)
                                 ->where('status_desc','=', 'ON-HOLD')
                                 ->paginate(10)  

        ]);     


    }
}
