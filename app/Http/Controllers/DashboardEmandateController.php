<?php

namespace App\Http\Controllers;

use App\Models\MDT_PRNE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardEmandateController extends Controller
{
    
    public function index(Request $request)
    {
        

        $state_user = session('authenticatedUser')['state_code'];
        
        if  ($state_user == '00')
        { 
            //$state = DB::table('MDT_PRNE')->select('section')->distinct()->get()->pluck('section');
            //$branch = DB::table('MDT_PRNE')->select('payrefnum')->distinct()->get()->pluck('payrefnum');

        /* $state =  DB::table('MDT_PRNE')
                        ->select('BNM_STATECODES.description')
                        ->distinct()
                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                        ->join ('BNM_STATECODES',  'BRANCHES.STATE_CODE' , '=', 'BNM_STATECODES.CODE' )
                        ->get()
                        ->pluck('description');  */

            $state = DB::table('BNM_STATECODES')->select('description')->distinct()->get()->pluck('description');        
           
                    
            /*$branch =  DB::table('MDT_PRNE')
                        ->select('BRANCHES.BRANCH_NAME')
                        ->distinct()
                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                        ->join ('BNM_STATECODES',  'BRANCHES.STATE_CODE' , '=', 'BNM_STATECODES.CODE' )
                        ->get()
                        ->pluck('branch_name'); */ 
            
            $branch = DB::table('BRANCHES')->select('branch_name','state_code')->distinct()->orderby('state_code')->get()->pluck('branch_name');                       

            $transdate = DB::table('MDT_PRNE')->select('effdate')->distinct()->get()->pluck('effdate');

            $post = "";
            $post_pass = "";
            $post_fail = "";

            if(!empty($request->all())) {
                
                $selected_state = $request->input('state');
                $selected_branch = $request->input('branch');
                $selected_transdate = $request->input('transdate');

               // dump($selected_state); 
               // dump($selected_branch); 
               // dump($selected_transdate); 
                
               /* $post = MDT_PRNE::where(function($query) use ($distance, $price, $rating) { 
                        $query->where('section', '=', $distance)
                              ->orWhere(DB::RAW("TRIM(payrefnum)"), '=', $price)
                              ->orWhere('effdate', '=', $rating);})
                              ->get(); */
                   
               /* $post = DB::table('MDT_PRNE')
                            ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->join ('BNM_STATECODES',  'BRANCHES.STATE_CODE' , '=', 'BNM_STATECODES.CODE' )
                            ->where('BNM_STATECODES.description', $selected_state  )
                            ->orwhere('BRANCHES.branch_name', $selected_branch  )
                            ->orwhere('MDT_PRNE.effdate',  $selected_transdate )
                            ->get();  */
                 $post = MDT_PRNE::where(function($query) use ($selected_state, $selected_branch, $selected_transdate) { 
                                $query->where('BNM_STATECODES.description',  $selected_state)
                                    ->Where('BRANCHES.branch_name',  $selected_branch);})
                                    //->Where('MDT_PRNE.effdate',  $selected_transdate);})
                                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                    ->join ('BNM_STATECODES',  'BRANCHES.STATE_CODE' , '=', 'BNM_STATECODES.CODE' )
                                    ->get();           
                     
                     // dump($post);     
                            
               /* $post_pass = DB::table('MDT_PRNE')
                            ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->join ('BNM_STATECODES',  'BRANCHES.STATE_CODE' , '=', 'BNM_STATECODES.CODE' )
                            ->where('MDT_PRNE.SECTION', 'BLOCK2')
                            ->orwhere('BNM_STATECODES.description', $selected_state  )
                            ->orwhere('BRANCHES.branch_name', $selected_branch  )
                            ->orwhere('MDT_PRNE.effdate',  $selected_transdate )
                            ->get(); */    
                           // dump($post);  

                    $post_pass = MDT_PRNE::where(function($query) use ($selected_state, $selected_branch, $selected_transdate) { 
                                $query->where('BNM_STATECODES.description',  $selected_state)
                                    ->Where('BRANCHES.branch_name',  $selected_branch);})
                                    //->Where('MDT_PRNE.effdate',  $selected_transdate);})
                                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                    ->join ('BNM_STATECODES',  'BRANCHES.STATE_CODE' , '=', 'BNM_STATECODES.CODE' )
                                    ->where('MDT_PRNE.SECTION', 'BLOCK2')
                                    ->get();


                            
                    $post_fail = MDT_PRNE::where(function($query) use ($selected_state, $selected_branch, $selected_transdate) { 
                                        $query->where('BNM_STATECODES.description',  $selected_state)
                                            ->Where('BRANCHES.branch_name',  $selected_branch);})
                                            //->Where('MDT_PRNE.effdate',  $selected_transdate);})
                                            ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                            ->join ('BNM_STATECODES',  'BRANCHES.STATE_CODE' , '=', 'BNM_STATECODES.CODE' )
                                            ->where('MDT_PRNE.SECTION', 'BLOCK1')
                                            ->get();            
                //dump($post);

            }
        
            //dd($state);
            return view('pages.dashboard_emandate', [
                'state' => $state,
                'branch' => $branch,
                'transdate' => $transdate,
                //'posts' =>'',
                'posts' => $post,
                'postspass' => $post_pass,
                'postsfail' => $post_fail,
            ]);
    
        }


        /* for all except HQ */
        else {
            
            $state_user = session('authenticatedUser')['state_code'];
            //dd($state_user);
        
            $daftarCount = DB::table('MDT_PRNE')
                            ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                            ->get();
            //dd($daftarCount);               

            $lulusCount = DB::table('MDT_PRNE')
                            ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                            ->where('MDT_PRNE.SECTION', '=', 'BLOCK2' )
                            ->get();

            $gagalCount = DB::table('MDT_PRNE')
                            ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                            ->where('MDT_PRNE.SECTION', '=', 'BLOCK1' )
                            ->get();
           
            return view('pages.dashboard_emandate',compact('daftarCount','lulusCount','gagalCount'));  
        }




    }
    /* end if else */

    public function store(Request $request)
    {
        return $request->all();
        return view('Pages.dashboard_emandate');
    }

}
