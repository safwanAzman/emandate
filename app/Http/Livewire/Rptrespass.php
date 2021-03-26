<?php

namespace App\Http\Livewire;

use App\Models\MDT_SER;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Rptrespass extends Component
{
    
    use WithPagination;
    public $findrptrespass = '';
    public $idrptrespass;

    public function mount($id)
    {
        $this->idrptrespass = $id;
    }

    public function render()
    {
        $findrptrespass =  "%".$this->findrptrespass."%";
        $idrptrespasss =  "%".$this->idrptrespass."%";
        $state_user = session('authenticatedUser')['state_code'];

        if ( $state_user == 00){

            return view('livewire.rptrespass',[

            'rptdetails_respass' => MDT_SER::where('filename','like', $idrptrespasss)
                                 ->join ('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                                ->where('filler','like', $findrptrespass)
                                ->where('status','=', '00')
                                ->paginate(10)        

            ]);  
        }
        else{
            return view('livewire.rptrespass',[

                'rptdetails_respass' => MDT_SER::where('filename','like', $idrptrespasss)
                                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)")  )
                                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                    ->join ('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                                    ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                                    ->where('filler','like', $findrptrespass)
                                    ->where('status','=', '00')
                                    ->paginate(10)        
    
                ]);
        }    

     }
 
 }                   

