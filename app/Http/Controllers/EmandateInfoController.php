<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MDT_OFNI;
use App\Models\MDT_TFC;
use App\Models\MDT_SER;
use Livewire\WithPagination;
use App\User;
use Illuminate\Support\Facades\DB;

class EmandateInfoController extends Controller

{
    use WithPagination;

    public $listcft = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        

       // $INFOS = MDT_OFNI::all();;
         //dd($INFOS);

       // $INFOS = MDT_OFNI::where('payrefnum','like','%66011115000785%')->whereApproval('00')->paginate(5);
        //dd($INFOS);
      // return view('pages.EmandateInfo',compact('INFOS'));
            return view('pages.EmandateInfo');  


        //return view('pages.EmandateInfo');   
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        //$listcft =  "%".$this->listcft."%";

        $INFOS = MDT_OFNI::where('fms_acct_no','like','%'.$id.'%')->whereApproval('00')->paginate(5);
        $filelist_res = MDT_SER::whereRaw("substr(filler,0,14) like '%".$id."%' and posted = 'Y' ORDER BY SUBSTR(HDATE,7,10),SUBSTR(HDATE,4,5),SUBSTR(HDATE,1,2) ASC")->paginate(20);
        //dd($id);
        
        //account position part
        $acc_pos = DB::select(DB::raw("
                    SELECT
                    M.DURATION,
                    TO_CHAR(M.START_INSTAL_DATE, 'dd-mm-yyyy') AS START_INSTAL_DATE, 
                    M.PROFIT_RATE,     
                    P.DISBURSED_AMOUNT ,
                    P.TOT_PROFIT_UNEARNED ,
                    M.SAVINGS_TO_PAID ,  
                    M.APPROVED_LIMIT+P.TOT_PROFIT_UNEARNED+M.SAVINGS_TO_PAID AS TOTAL,
                    P.UNDRAWN_AMOUNT,
                    P.EXPIRY_DATE,
                    M.START_INSTAL_DATE,
                    P.DISBURSED_AMOUNT- P.COST_OUTSTANDING AMAUN_POKOK,
                    NVL(P.TOT_PROFIT_EARNED,0) as TOT_PROFIT_EARNED,
                    P.COST_OUTSTANDING,
                    P.UEI_OUTSTANDING,
                    P.BAL_OUTSTANDING + owing_amt as BAL_OUTSTANDING,
                    NVL(P.REBATE_AMOUNT,0) AS REBATE_AMOUNT,
                    NVL(P.SAVINGS_BALANCE,0) AS SAVINGS_BALANCE,
                    EXCESS_PAYMENT,
                    (CASE WHEN P.CREDIT_STATUS = 0 THEN 'CURRENT' WHEN P.CREDIT_STATUS = 1 THEN 'DELINQUENT' WHEN P.CREDIT_STATUS = 2 THEN 'SUB STANDARD' WHEN P.CREDIT_STATUS = 2 THEN 'DOUBTFUL' WHEN P.CREDIT_STATUS = 4 THEN 'BAD' END)AS CREDIT_STATUS1,
                    UF_GET_CREADIT_STATUS(P.CREDIT_STATUS) AS CREDIT_STATUS,
                    (case when P.NPF_STATUS = 'N' THEN 'PERFORMING' ELSE 'NON-PERFORMING' END) AS NPF_STATUS,
                    P.INSTAL_ARREARS,
                    NVL(P.SEC_DEP_IN_ARREAR,0) AS SEC_DEP_IN_ARREAR,
                    P.CREDIT_STATUS_CHGDATE,           
                    P.NPF_CHANGED_DATE,
                    nvl((CASE WHEN INSTAL_MODE = 'M' THEN NVL(bulantgkbil,month_arrears) END),0) AS instal_mode,
                    UF_GET_INSTALMODES(M.INSTAL_MODE) AS INSTMODE,
                    P.BULANTGKBIL,
                    NVL((SELECT SUM(OWING_AMT) FROM OWINGS WHERE OWING_CODE NOT IN (SELECT OWING_CODE FROM OWING_CODES WHERE AUTODEDUCT = 'Y') AND ACCOUNT_NO = P.ACCOUNT_NO),0) as total_owings,
                    NVL((SELECT SUM(OWING_AMT_PAID) FROM OWINGS WHERE OWING_CODE NOT IN (SELECT OWING_CODE FROM OWING_CODES WHERE AUTODEDUCT = 'Y') AND ACCOUNT_NO = P.ACCOUNT_NO),0) as owings_paid,
                    P.OWING_AMT,
                    sec_dep_in_arrear+owing_amt+instal_arrears as amount_arrears,
                    NVL(P.LAST_PYMT_AMT,0) AS LAST_PYMT_AMT,
                    P.LAST_PAYMENT_DATE,
                    P.INSTALMENT_NO,
                    P.LAST_INSTAL_DATE,
                    NVL(P.PAYMENT_AMOUNT,0) AS PAYMENT_AMOUNT,
                    P.LAST_INSTAL_DUE_DATE,
                    P.INSTAL_DUE_DATE,
                    P.LAST_MODIFIED_DATE,
                    P.LAST_MODIFIED_USER,
                    (M.instal_amount + M.savings_instamt) AS INSTALL_AMT,
                    START_INSTAL_DATE
                    FROM ACCOUNT_POSITION P,
                        ACCOUNT_MASTER M,
                        MDT_OFNI I
                    WHERE P.ACTID = M.ACTID
                    and   P.ACCOUNT_NO = M.ACCOUNT_NO
                    and   P.ACCOUNT_NO = I.FMS_ACCT_NO
                    and   M.ACCOUNT_NO = I.FMS_ACCT_NO
                    and   trim(fms_acct_no) = '$id'
                    "));

                    $data = $acc_pos;
                    //dd($data);

         //resit part
        $resit_sql = DB::select(DB::raw("           
                    SELECT 
                        RESIT_NO, 
                        ACCOUNT_NO, 
                        ID_RESIT, 
                        RESIT_AMOUNT, 
                        upper(COLLECTOR) AS COLLECTOR, 
                        to_char(RESIT_DATE, 'dd-mm-yyyy') as resitdt, 
                        BIS_NO, 
                        (CASE WHEN TYPE = 'D' THEN 'DEBIT' WHEN TYPE = 'D' THEN 'DEBIT' WHEN TYPE = 'T' THEN 'TUNAI' WHEN TYPE = 'C' THEN 'CREDIT' ELSE NULL END) AS TYPE,
                        CHEQUE_NO, 
                        CHEQUE_BANK_CODE, 
                        CUST_NAME, 
                        upper(OFFICER_INCHARGE) AS OFFICER_INCHARGE, 
                        to_char(TRX_DATE,'dd-mm-yyyy') as trx_date, 
                        STATUS_RESIT AS STATUS_RESIT1,
                        ( CASE WHEN CNCL_STATUS = 'C' THEN 'OK' WHEN CNCL_STATUS = 'X' THEN 'BATAL' WHEN CNCL_STATUS = 'R' THEN 'REVERSE' ELSE NULL END) AS STATUS_RESIT, 
                        (case when VLD_STATUS = 'Y' then 'DISAHKAN' when VLD_STATUS = 'N' then 'BELUM DISAHKAN' ELSE NULL end)  AS VLD_STATUS
                        FROM RESIT 
                        WHERE ACCOUNT_NO = '$id'
                    ORDER BY RESIT_DATE
                    "));

                    $resit = $resit_sql;
        // end resit part

        //trafik part
        $trafik_sql = DB::select(DB::raw("           
                    
                    SELECT resched2flag,
                            nvl((select 1 from ramci_list where account_no = m.account_no),0) as ramci,
                            nvl((select distinct 1 from owing_codes c, owings o where c.owingcatg = 'BN' and c.owing_code = o.owing_code
                                and o.owing_amt > 0 and o.account_no = m.account_no),0) as bankcrupt,
                            nvl((select sum(1) from owings o where owing_code in ('10','11') and o.owing_amt > 0 and o.account_no = m.account_no),0) as nod,
                            nvl((select sum(1) from owing_codes c, owings o where c.owingcatg = 'SUM' and c.owing_code = o.owing_code
                                and o.owing_amt > 0 and o.account_no = m.account_no),0) as saman, 
                            nvl((select sum(1) from owing_codes c, owings o where c.owingcatg = 'WSS' and c.owing_code = o.owing_code
                                and o.owing_amt > 0 and o.account_no = m.account_no),0) as wss,  
                            nvl((select sum(1) from owing_codes c, owings o where c.owingcatg = 'JDS' and c.owing_code = o.owing_code
                                and o.owing_amt > 0 and o.account_no = m.account_no),0) as jds,
                        (case when substr(account_no,1,2) = '25' then 'Y' else 'N' end) as ps1,
                        nvl((select 1 from ctos_list where account_no = m.account_no),0)  as ctos,
                        nvl((select count(*) from FMS_USERCODES where CUST_ID = m.CUST_ID AND code = 'PHCCC'),0)  as phccc,
                        nvl(emanflag,0) as emandate
                    FROM	   account_master m
                    WHERE account_no = '$id'
                    
                    "));

                    $trafik = $trafik_sql;
        // end trafik part

        return view('pages.EmandateInfo',compact('INFOS','filelist_res','data','resit','trafik'));
        
        //account position part end
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function activestatus(Request $request)
    {
        $branch_code = session('authenticatedUser')['branch_code'];
        if  ($branch_code == '0009' || $branch_code == '0004' || $branch_code == '0016')
        {

            $info = MDT_OFNI::where('idnum', $request->itemid)->first();

            if ($request->action == 0) {
                
                $info->blocked_paymnt_status = ($request->action == 0) ? 0 : 1 ;
                $info->status_desc = ($request->action == 0) ? 'RE-ACTIVE' : 'ON-HOLD';
                $info->blockedby = session()->get('authenticatedUser')['userid'];
                $info->reasons = ($request->reasons);
                $info->blockpayment_flag = 0;
                $info->FAILEDCOUNT = 0;
                $info->blocked_paymnt_status = 0;
                $info->save();
                
            }else{

                $info->blocked_paymnt_status = ($request->action == 0) ? 0 : 1 ;
                $info->status_desc = ($request->action == 0) ? 'RE-ACTIVE' : 'ON-HOLD';
                $info->blockedby = session()->get('authenticatedUser')['userid'];
                $info->reasons = ($request->reasons);
                $info->blockpayment_flag = 3;
                $info->FAILEDCOUNT = 3;
                $info->blocked_paymnt_status = 1;
                // $info->blockpayment_date = date('Y-m-d');
                $info->save();
                

            }
            return back()->with('activestatus', 'Status telah dikemaskini.');
        }else{
            return back()->with('activestatus', 'Anda Tidak Mempunyai Akses Untuk Melakukan Tindakan ini.');
        }          
 
    }
}

