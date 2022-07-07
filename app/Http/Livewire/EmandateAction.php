<?php

namespace App\Http\Livewire;
use App\Models\MDT_OFNI;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmandateAction extends Component
{
    use WithPagination;
    public $status;
    public $reasons;

    public $searchTerm = '';
    public $isOpen = 0;

    protected  $INFOS_ACTION;
    protected  $pagination = 1;

    /**
     *  Livewire Lifecycle Hook
     */
    public function updatingSearchInput(): void
    {
        $this->gotoPage(1);
    }

    public function render()
    {   
        
        $searchTerm = '%'.$this->searchTerm.'%';
        
        return view('livewire.emandate-action' ,[
            
            'INFOS_ACTION' =>  MDT_OFNI::where(function($query) use ($searchTerm) {
                $query->where('fms_acct_no', 'like', $searchTerm)
                    ->orWhere('buyername', 'like', $searchTerm);
                })
                ->orderBy('appdate','desc')
                //->paginate(10)
                ->paginate($this->pagination)

        ]);  
    }

    public function activestatus($item)
    {
        $branch_code = session('authenticatedUser')['branch_code'];
        $blocked_by = session()->get('authenticatedUser')['userid'];
        $todayDate = Carbon::now();
        if  ($branch_code == '0009' || $branch_code == '0004' || $branch_code == '0016')
        {
            // dd('asdsa');
            // $info = MDT_OFNI::where('idnum', $item['idnum'])->first();

            // dd($info);
            // $todayDate = Carbon::now();

            if ($this->status == 0) {
                MDT_OFNI::where('idnum', $item['idnum'])->update([
                    'blocked_paymnt_status'     => ($this->status == 0) ? 0 : 1,
                    'status_desc'               => ($this->status == 0) ? 'RE-ACTIVE' : 'ON-HOLD',
                    'blockedby'                 => $blocked_by,
                    'reasons'                   => $this->reasons,
                    'blockpayment_flag'         => 0,
                    'FAILEDCOUNT'               => 0,
                    'blocked_paymnt_status'     => 0,
                    'blockpayment_date'         => null
                ]);

                // $info->blocked_paymnt_status = ($this->status == 0) ? 0 : 1 ;
                // $info->status_desc = ($this->status == 0) ? 'RE-ACTIVE' : 'ON-HOLD';
                // $info->blockedby = $blocked_by;
                // $info->reasons = ($this->reasons);/
                // $info->blockpayment_flag = 0;
                // $info->FAILEDCOUNT = 0;
                // $info->blocked_paymnt_status = 0;
                // $info->blockpayment_date = null;
                // $info->save();
                
            }//else{
            if ($this->status == 1) {
                MDT_OFNI::where('idnum', $item['idnum'])->update([
                    'blocked_paymnt_status'     => ($this->status == 0) ? 0 : 1,
                    'status_desc'               => ($this->status == 0) ? 'RE-ACTIVE' : 'ON-HOLD',
                    'blockedby'                 => $blocked_by,
                    'reasons'                   => $this->reasons,
                    'blockpayment_flag'         => 3,
                    'FAILEDCOUNT'               => 3,
                    'blocked_paymnt_status'     => 3,
                    'blockpayment_date'         => $todayDate//now()
                ]);
            }
                // $info->blocked_paymnt_status = ($this->status == 0) ? 0 : 1 ;
                // $info->status_desc = ($this->status == 0) ? 'RE-ACTIVE' : 'ON-HOLD';
                // $info->blockedby = $blocked_by;
                // $info->reasons = ($this->reasons);
                // $info->blockpayment_flag = 3;
                // $info->FAILEDCOUNT = 3;
                // $info->blocked_paymnt_status = 1;
                // //$info->blockpayment_date = date('Y-m-d');
                // $info->blockpayment_date = $todayDate;
                // $info->save();
                

            //}
            //dd('done');
            return back()->with('activestatus', 'Status telah dikemaskini.');
        }else{
            dd('die');
            return back()->with('activestatus', 'Anda Tidak Mempunyai Akses Untuk Melakukan Tindakan ini.');
        }          
 
    }

    // public function create()
    // {
    //     $this->resetInputFields();
    //     $this->openModal();
    // }

    // public function openModal()
    // {
    //     $this->isOpen = true;
    // }

    // public function closeModal()
    // {
    //     $this->isOpen = false;
    // }
}
