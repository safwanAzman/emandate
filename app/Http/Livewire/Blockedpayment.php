<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MDT_OFNI;
use Livewire\WithPagination;
use App\User;

class Blockedpayment extends Component
{   
    use WithPagination;
    public $searchTerm = '';

    public function mount()
    {
        //$this->blocked_payment = MDT_OFNI::where('BLOCKED_PAYMNT_STATUS', '<>',00)->paginate(10);
        
    }
    
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';

        return view('livewire.blockedpayment',[
            'blocked_payment'=> MDT_OFNI::where('idnum','like',$searchTerm)->where('blocked_paymnt_status', '<>',00)->paginate(10),
        ]);
    }
}
