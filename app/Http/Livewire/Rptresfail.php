<?php

namespace App\Http\Livewire;

use App\Models\MDT_SER;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Rptresfail extends Component
{

    use WithPagination;
    public $findrptresfail = '';
    public $idrptresfail;

    public function mount($id)
    {
        $this->idrptresfail = $id;
    }

    public function render()
    {
        $findrptresfail =  "%".$this->findrptresfail."%";
        $idrptresfails =  "%".$this->idrptresfail."%";

        $state_user = session('authenticatedUser')['state_code'];

        if ( $state_user == 00){

            return view('livewire.rptresfail',[

            'rptdetails_resfail' => MDT_SER::where('filename','like', $idrptresfails)
                                    ->join ('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                                    ->where('filler','like', $findrptresfail)
                                    ->where('status','<>', '00')
                                    ->paginate(10)                 
                            
            ]); 
        }
        else{
            return view('livewire.rptresfail',[

                'rptdetails_resfail' => MDT_SER::where('filename','like', $idrptresfails)
                                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)")  )
                                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                        ->join ('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                                        ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                                        ->where('filler','like', $findrptresfail)
                                        ->where('status','<>', '00')
                                        ->paginate(10)                 
                                
                ]);
        } 
       /* 'rptdetails_resfail' => DB::table('MDT_SER')
                           ->where('filename', 'like', $idrptresfails)
                            ->where('filler', 'like', $findrptresfail)
                            ->where('status', '<>' , '00')
                            ->paginate(10) */ 

         
         /*'rptdetails_resfail' => MDT_SER::join ('MDT_OFNI_DESC','RES.STATUS' , '=', 'substr(REF.RE_CODE, 2, 3)')
                               -> where('RES.filename','like', $idrptresfails)
                                ->where('RES.filler','like', $findrptresfail)
                                ->where('RES.status','<>', '00')
                                ->paginate(10) */

                        
        /* 'rptdetails_resfail' => DB::table('MDT_SER')
                           // ->join ('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', 'substr(MDT_OFNI_DESC.RE_CODE, 2, 3)') 
                           ->join ('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', 'MDT_OFNI_DESC.RE_CODE') 
                           ->where('MDT_SER.filename', 'like',  "'".$idrptresfails."'")
                            ->where('MDT_SER.filler', 'like',  "'".$findrptresfail."'")
                            ->where('MDT_SER.status', '<>' , '00')
                            ->paginate(10)   */    
                            
    
        
    
    }

}
