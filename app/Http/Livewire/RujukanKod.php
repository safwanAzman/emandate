<?php

namespace App\Http\Livewire;

use App\Models\MDT_OFNI_DESC;
use Livewire\Component;
use Livewire\WithPagination;

class RujukanKod extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.rujukan-kod',[
            'MDT_OFNI_DESC' => MDT_OFNI_DESC::all()
        ]);
    }
}