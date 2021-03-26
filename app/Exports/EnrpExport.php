<?php

namespace App\Exports;

use Illuminate\Http\Request;
//use App\Models\MDT_PRNE;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use DateTime;

class EnrpExport implements FromQuery,WithHeadings    
{
    

    protected $id;
        function __construct($id) {
        $this->idrptenrp = $id;
    }

    public function headings(): array
    {
        /*nama header */
        return [
            'SEQNO',
            'HCRDATE',
            'BATCHID',
            'PAYREFNUM',
            'IDTYPE',
            'IDNUM',
            'BUYERNAME',
            'BUYERACCT',
            'DEBITAMT',
            'PURPOSE',
            'TELNO',
            'EMAIL',
            'EFFDATE',
            'EXPDATE',
            'APPDATE',

        ];
    }

    public function query()
    {
        //return MDT_PRNE::query();
        /*you can use condition in query to get required result*/
        /* to select all column  
        return MDT_PRNE::query()->where('approval','not like','%00%');*/

       /* $test = MDT_PRNE::query()
                            ->select('seqno','hcrdate','batchid','payrefnum','idtype','idnum','buyername','buyeracct','debitamt','purpose', 'telno','email','effdate','expdate','appdate')
                            ->where('approval','not like','%00%')
                            ->get();
        dd($test); */

        /* to select selected column */
        /*return MDT_PRNE::query()
                                ->select('seqno','hcrdate','batchid','payrefnum','idtype','idnum','buyername','buyeracct','debitamt','purpose', 'telno','email','effdate','expdate','appdate')
                                ->where('approval','not like','%00%')
                                ; */
       /*  $state_user = session('authenticatedUser')['state_code'];*/
       $branch_user = session('authenticatedUser')['branch_code'];
       $branch_type = session('authenticatedUser')['branch_type'];

        /* if ( $state_user == 00){ */
        if ( $branch_type == 'HQ'){    
            return  DB::table('MDT_PRNE')
                    ->select('hcrdate','batchid','payrefnum','idtype','idnum','buyername','buyeracct','debitamt','purpose', 'telno','email','effdate','expdate','appdate')
                    ->where('hcrdate','like', "%".$this->idrptenrp."%")
                    ->where('approval','not like','%00%')
                    ->orderby('seqno');                   
        }
        else{
            return  DB::table('MDT_PRNE')
                    ->select('hcrdate','batchid','payrefnum','idtype','idnum','buyername','buyeracct','debitamt','purpose', 'telno','email','effdate','expdate','appdate')
                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.STATE_CODE' , '=',  $branch_user )
                    ->where('hcrdate','like', "%".$this->idrptenrp."%")
                    ->where('approval','not like','%00%')
                    ->orderby('seqno'); 
        }  


    }



}