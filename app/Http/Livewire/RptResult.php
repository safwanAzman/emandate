<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\MDT_SER;
use Rap2hpoutre\FastExcel\FastExcel;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;

class RptResult extends Component
{   
    public $state_brn;
    public $state_user;
    public $branch_user;
    public $state_name;
    public $startMon;
    PUBLIC $endMon;
    public $status;
    public $defult_dt;

    public function mount()
    {

        $this->state_brn = session('authenticatedUser')['branch_type'];
        $this->state_user = session('authenticatedUser')['state_code'];
        $this->branch_user = session('authenticatedUser')['branch_code'];
        $this->state_name = session('authenticatedUser')['state_name'];
    }


    public function renderReport(){
        $date1 = date('d/m/Y', strtotime($this->startMon));
        $date2 = date('d/m/Y', strtotime($this->endMon));
        

        //dd($date1,$date2);

    if ($this->state_brn == 'HQ' ){
        $data1 = DB::table('MDT_SER')
            ->select('MDT_SER.FILENAME','MDT_SER.HDATE','MDT_SER.SELLERORDER','MDT_SER.SELLERACC',DB::raw('UF_GET_STATE_DESC(ACCOUNT_MASTER.BRANCH_CODE) AS STATES'),DB::raw('UF_GET_BRANCHNAME(ACCOUNT_MASTER.BRANCH_CODE) AS BRANCHS'),'MDT_SER.BUYERNAME','MDT_SER.IC',DB::raw('SUBSTR(MDT_SER.FILLER,1,14) AS ACCOUNT_NO'),'MDT_SER.STATUS','MDT_SER.STATUS_DESC','BRANCHES.BRANCH_CODE')
            ->join('ACCOUNT_MASTER',DB::raw('SUBSTR(MDT_SER.FILLER,1,14)'),'ACCOUNT_MASTER.ACCOUNT_NO')
            ->join('BRANCHES','ACCOUNT_MASTER.BRANCH_CODE','BRANCHES.BRANCH_CODE')
            ->whereBetween('MDT_SER.HDATE',[$date1,$date2])
            ->where('STATUS','like', '%'.$this->status.'%')
            ->orderBy('MDT_SER.FILENAME','ASC')
            ->get();
            //->toSql();

        //dd($data1);
        
        //dd($data1);
        foreach ($data1 as $item) {
            yield $item;
        }

        
    }elseif($this->state_brn == 'STA' && $this->state_user != '00'){
        
        $data2 = DB::table('MDT_SER')
            ->select('MDT_SER.FILENAME','MDT_SER.HDATE','MDT_SER.SELLERORDER','MDT_SER.SELLERACC',DB::raw('UF_GET_STATE_DESC(ACCOUNT_MASTER.BRANCH_CODE) AS STATES'),DB::raw('UF_GET_BRANCHNAME(ACCOUNT_MASTER.BRANCH_CODE) AS BRANCHS'),'MDT_SER.BUYERNAME','MDT_SER.IC',DB::raw('SUBSTR(MDT_SER.FILLER,1,14) AS ACCOUNT_NO'),'MDT_SER.STATUS','MDT_SER.STATUS_DESC','BRANCHES.BRANCH_CODE')
            ->join('ACCOUNT_MASTER',DB::raw('SUBSTR(MDT_SER.FILLER,1,14)'),'ACCOUNT_MASTER.ACCOUNT_NO')
            ->join('BRANCHES','ACCOUNT_MASTER.BRANCH_CODE','BRANCHES.BRANCH_CODE')
            ->whereBetween(DB::raw("to_date(MDT_SER.HDATE)"),[DB::raw("to_date('$date1')"),DB::raw("to_date('$date2')")])
            ->where('STATUS','like', '%'.$this->status.'%')
            ->where('BRANCHES.STATE_CODE',$this->state_user)
            ->orderBy('MDT_SER.FILENAME','ASC')
            ->get();
        
            foreach($data2 as $item){
                yield $item;
            }

    }elseif($this->state_brn == 'BRN' && $this->state_user != '00'){
        //dd($this->state_brn,$this->state_user);
        
        $data3 = DB::table('MDT_SER')
            ->select('MDT_SER.FILENAME','MDT_SER.HDATE','MDT_SER.SELLERORDER','MDT_SER.SELLERACC',DB::raw('UF_GET_STATE_DESC(ACCOUNT_MASTER.BRANCH_CODE) AS STATES'),DB::raw('UF_GET_BRANCHNAME(ACCOUNT_MASTER.BRANCH_CODE) AS BRANCHS'),'MDT_SER.BUYERNAME','MDT_SER.IC',DB::raw('SUBSTR(MDT_SER.FILLER,1,14) AS ACCOUNT_NO'),'MDT_SER.STATUS','MDT_SER.STATUS_DESC','BRANCHES.BRANCH_CODE')
            ->join('ACCOUNT_MASTER',DB::raw('SUBSTR(MDT_SER.FILLER,1,14)'),'ACCOUNT_MASTER.ACCOUNT_NO')
            ->join('BRANCHES','ACCOUNT_MASTER.BRANCH_CODE','BRANCHES.BRANCH_CODE')
            ->whereBetween(DB::raw("to_date(MDT_SER.HDATE)"),[DB::raw("to_date('$date1')"),DB::raw("to_date('$date2')")])
            ->where('STATUS','like', '%'.$this->status.'%')
            ->where('BRANCHES.BRANCH_TYPE',$this->state_brn)
            ->where('BRANCHES.BRANCH_CODE',$this->branch_user)
            ->orderBy('MDT_SER.FILENAME','ASC')
            ->get();

            foreach($data3 as $item){
                yield $item;
            }
        }
    }

    public function generateExcel()
    {
        $this->defult_dt = date("d.m.Y");
        // --- laravel excel package ---
        // return Excel::download(new ListOfMemberRPT($this->startDate,$this->endDate), 'ListOfMember.xlsx');

        // --- fast excel package ---
        return response()->streamDownload(function () {
            $header_style = (new StyleBuilder())
                ->setFontBold()
                ->setShouldWrapText(false)
                ->build();
            $rows_style = (new StyleBuilder())
                ->setShouldWrapText(false)
                ->build();
            $right_style = (new StyleBuilder())
                ->setCellAlignment(CellAlignment::RIGHT)
                ->build();  
            return (new FastExcel($this->renderReport()))
                ->headerStyle($header_style)
                ->rowsStyle($rows_style)
                ->export('php://output' , function ($item) {
                return [
                    'FILENAME'    => $item->filename,
                    'HDATE'       => $item->hdate,
                    'SELLERORDER' => $item->sellerorder,
                    'SELLERACC'   => $item->selleracc,
                    'STATES'      => $item->states,
                    'BRANCHS'     => $item->branchs,
                    'BUYERNAME'   => $item->buyername,
                    'IC'          => $item->ic,
                    'ACCOUNT_NO'  => $item->account_no,
                    'STATUS'      => $item->status,
                    'STATUS_DESC' => $item->status_desc,
                    'BRANCH_CODE' => $item->branch_code
                ];
            });
        }, sprintf('ResultPemotongan-%s.xlsx',$this->defult_dt));

    }

    public function render()
    {
        $res = DB::select("
                select distinct status,status_desc 
                from mdt_ser 
                where status_desc is not null 
                order by STATUS asc");

        $resF = $res;

        return view('livewire.rpt-result',[
            'res' => $resF,
        ]);
    }
}
