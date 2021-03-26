<?php

namespace App\Http\Livewire;
//set_time_limit(0);
use Livewire\Component;
use App\Models\MDT_PRNE;
use App\Models\BNM_STATECODES;
use App\Models\BRANCHES;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class DashboardFilter extends Component
{

    use WithPagination;

    public $country;
    public $city;
    public $cities = [];
    
   // public $table = [];

    public function render()
    {
        $post = "";
        $branch_user = session('authenticatedUser')['branch_code'];
        $branch_type = session('authenticatedUser')['branch_type'];

        if ( $branch_type == 'HQ'){
            
            if(!empty($this->country)){
                //$this->cities = BRANCHES::where('state_code', $this->country)->get();
                $this->cities = DB::table('BRANCHES')
                                ->select('branch_code', 'branch_name')
                                ->where('state_code',$this->country)
                                ->orderBy('branch_name')
                                ->get();

            } 

            $selected_state = $this->country;
            $selected_branch = $this->city;
            

            if($selected_state == 'Malay' && $selected_branch == 'All'){
                
                $daftardata = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                            'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                            'MDT_PRNE.APPROVAL')
                                ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->paginate(5);

                $daftar = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                            'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                            'MDT_PRNE.APPROVAL')
                                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                    ->get();
                                
                $lulus = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                    ->where('MDT_PRNE.SECTION', 'BLOCK2')
                                    ->get();

                $gagal = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                        ->where('MDT_PRNE.SECTION', 'BLOCK1')
                                        ->get();
        
                /* code '00' is not malaysian */
                $countries = BNM_STATECODES::whereNotIn('code', ['00', '99'])->orderBy('code')->get();
                //$countries = BNM_STATECODES::orderBy('code')->get();
                
                return view('livewire.dashboard-filter')->with([
                    'countries'  => $countries,
                    'posts' => $daftar,
                    'postspass' => $lulus,
                    'postsfail' => $gagal,
                    'postsdata' => $daftardata,
                
                ]);
        
            }

            //if($selected_branch == 'All'){
            if($selected_state !== 'Malay' && $selected_branch == 'All'){
            
                $daftardata = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                'MDT_PRNE.APPROVAL')
                ->where('BRANCHES.STATE_CODE',  $selected_state)
                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                   //->get();
                ->paginate(5);

                $daftar = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                            'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                            'MDT_PRNE.APPROVAL')
                    ->where('BRANCHES.STATE_CODE',  $selected_state)
                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->get();
                    
                                
                $lulus = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                    ->where('BRANCHES.STATE_CODE',  $selected_state)
                                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                    ->where('MDT_PRNE.SECTION', 'BLOCK2')
                                    ->get();

                $gagal = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                        ->where('BRANCHES.STATE_CODE',  $selected_state)
                                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                        ->where('MDT_PRNE.SECTION', 'BLOCK1')
                                        ->get();
        
                /* code '00' is not malaysian */
                $countries = BNM_STATECODES::whereNotIn('code', ['00', '99'])->orderBy('code')->get();
                //$countries = BNM_STATECODES::orderBy('code')->get();
                
                return view('livewire.dashboard-filter')->with([
                    'countries'  => $countries,
                    'posts' => $daftar,
                    'postspass' => $lulus,
                    'postsfail' => $gagal,
                    'postsdata' => $daftardata,
                
                ]);
            }
            else
            {

                $daftardata = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                'MDT_PRNE.APPROVAL')
                ->where('BRANCHES.BRANCH_CODE',  $selected_branch)
                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    //->get();
                ->paginate(5);
                
                $daftar = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                    ->where('BRANCHES.BRANCH_CODE',  $selected_branch)
                                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                    ->get();

                $lulus = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                        ->where('BRANCHES.BRANCH_CODE',  $selected_branch)
                                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                        ->where('MDT_PRNE.SECTION', 'BLOCK2')
                                        ->get();

                $gagal = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                        ->where('BRANCHES.BRANCH_CODE',  $selected_branch)
                                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                        ->where('MDT_PRNE.SECTION', 'BLOCK1')
                                        ->get();
        
                /* code '00' is not malaysian */
                $countries = BNM_STATECODES::whereNotIn('code', ['00', '99'])->orderBy('code')->get();
                //$countries = BNM_STATECODES::orderBy('code')->get();
                
                return view('livewire.dashboard-filter')->with([
                    'countries'  => $countries,
                    'posts' => $daftar,
                    'postspass' => $lulus,
                    'postsfail' => $gagal,
                    'postsdata' => $daftardata,
                
                ]);

            }//end if select cawangan all





        } //end if branchtype = hq
        else{

            $daftardata = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
            'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
            'MDT_PRNE.APPROVAL')
                ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                //->get();
                ->paginate(5);

                $daftar = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                    ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                    ->get();
                                     //->paginate(5);

                $lulus = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                        ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                        ->where('MDT_PRNE.SECTION', 'BLOCK2')
                                        //->get();
                                    ->paginate(5);

                $gagal = MDT_PRNE::select( 'BRANCHES.BRANCH_CODE','BRANCHES.STATE_CODE', 'BRANCHES.BRANCH_NAME', 'MDT_PRNE.HCRDATE', 'MDT_PRNE.PAYREFNUM',
                                    'MDT_PRNE.IDNUM', 'MDT_PRNE.BUYERNAME', 'MDT_PRNE.PURPOSE', 'MDT_PRNE.EFFDATE', 'MDT_PRNE.EXPDATE',
                                    'MDT_PRNE.APPROVAL')
                                        ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                        ->where('MDT_PRNE.SECTION', 'BLOCK1')
                                        //->get();
                                    ->paginate(5);

            return view('livewire.dashboard-filter')->with([
                'posts' => $daftar,
                'postspass' => $lulus,
                'postsfail' => $gagal,
                'postsdata' => $daftardata,

                                            
            ]);             


        }

    }
}
