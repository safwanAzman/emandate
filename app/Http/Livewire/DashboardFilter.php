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
        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];
        $branch_type = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $state_name = session('authenticatedUser')['state_name'];
        //$user_level = session('authenticatedUser')['access_user'];

        if ($state_brn == 'HQ' && $state_user == '00') {

            if (!empty($this->country)) {
                //$this->cities = BRANCHES::where('state_code', $this->country)->get();
                $this->cities = DB::table('BRANCHES')
                    ->select('branch_code', 'branch_name')
                    ->where('state_code', $this->country)
                    ->orderBy('branch_name')
                    ->get();
            }

            $selected_state = $this->country;
            $selected_branch = $this->city;


            if ($selected_state == 'Malay') {

                $daftardata = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->paginate(10);

                $daftar = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->get();

                $lulus = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('MDT_PRNE.SECTION', 'BLOCK2')
                    ->get();

                $gagal = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
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

            if ($selected_branch == 'All') {
                $daftardata = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.STATE_CODE',  $selected_state)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->paginate(10);

                $daftar = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.STATE_CODE',  $selected_state)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->get();


                $lulus = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.STATE_CODE', $selected_state)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('MDT_PRNE.SECTION', 'BLOCK2')
                    ->get();

                $gagal = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.STATE_CODE', $selected_state)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
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
            } else {

                $daftardata = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.BRANCH_CODE',  $selected_branch)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    //->get();
                    ->paginate(10);

                $daftar = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.BRANCH_CODE', $selected_branch)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->get();

                $lulus = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.BRANCH_CODE', $selected_branch)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('MDT_PRNE.SECTION', 'BLOCK2')
                    ->get();

                $gagal = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where(
                        'BRANCHES.BRANCH_CODE',
                        $selected_branch
                    )
                    ->join(
                        'ACCOUNT_MASTER',
                        DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                        '=',
                        DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                    )
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where(
                        'MDT_PRNE.SECTION',
                        'BLOCK1'
                    )
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
            } //end if select cawangan all

        } //end LEVEL USER ACCESS ALL

        elseif ($state_brn == 'STA' && $state_user != '00') {

            $this->cities = DB::table('BRANCHES')
                ->select('branch_code', 'branch_name')
                ->where('state_code', $state_user)
                ->orderBy('branch_name')
                ->get();

            $selected_branch = $this->city;

            if ($selected_branch == 'All') {
                /* start for view data */
                $daftardata = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->join(
                        'ACCOUNT_MASTER',
                        DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                        '=',
                        DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                    )
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.STATE_CODE', '=', $state_user)
                    ->paginate(10);

                $daftar = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.STATE_CODE', '=', $state_user)
                    ->join(
                        'ACCOUNT_MASTER',
                        DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                        '=',
                        DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                    )
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->get();


                $lulus = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.STATE_CODE', '=', $state_user)
                    ->join(
                        'ACCOUNT_MASTER',
                        DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                        '=',
                        DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                    )
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where(
                        'MDT_PRNE.SECTION',
                        'BLOCK2'
                    )
                    ->get();


                $gagal = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->where('BRANCHES.STATE_CODE', '=', $state_user)
                    ->join(
                        'ACCOUNT_MASTER',
                        DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                        '=',
                        DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                    )
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where(
                        'MDT_PRNE.SECTION',
                        'BLOCK1'
                    )
                    ->get();
                    //dd($daftardata);
                return view('livewire.dashboard-filter')->with([
                    'posts' => $daftar,
                    'postspass' => $lulus,
                    'postsfail' => $gagal,
                    'postsdata' => $daftardata,

                ]);

            } else {

                /* start for view data */
                $daftardata = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    ->join(
                        'ACCOUNT_MASTER',
                        DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                        '=',
                        DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                    )
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.STATE_CODE', '=', $state_user)
                    ->where(
                        'BRANCHES.BRANCH_CODE',
                        $selected_branch
                    )
                    //->get();
                    ->paginate(10);


                $daftar = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    // ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                    ->where('BRANCHES.STATE_CODE', '=', $state_user)
                    ->where(
                        'BRANCHES.BRANCH_CODE',
                        $selected_branch
                    )
                    ->join(
                        'ACCOUNT_MASTER',
                        DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                        '=',
                        DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                    )
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->get();


                $lulus = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    // ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                    ->where('BRANCHES.STATE_CODE', '=', $state_user)
                    ->join(
                        'ACCOUNT_MASTER',
                        DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                        '=',
                        DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                    )
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where(
                        'MDT_PRNE.SECTION',
                        'BLOCK2'
                    )
                    ->where(
                        'BRANCHES.BRANCH_CODE',
                        $selected_branch
                    )
                    ->get();


                $gagal = MDT_PRNE::select(
                    'BRANCHES.BRANCH_CODE',
                    'BRANCHES.STATE_CODE',
                    'BRANCHES.BRANCH_NAME',
                    'MDT_PRNE.HCRDATE',
                    'MDT_PRNE.PAYREFNUM',
                    'MDT_PRNE.IDNUM',
                    'MDT_PRNE.BUYERNAME',
                    'MDT_PRNE.PURPOSE',
                    'MDT_PRNE.EFFDATE',
                    'MDT_PRNE.EXPDATE',
                    'MDT_PRNE.APPROVAL'
                )
                    // ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                    ->where('BRANCHES.STATE_CODE', '=', $state_user)
                    ->join(
                        'ACCOUNT_MASTER',
                        DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                        '=',
                        DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                    )
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where(
                        'MDT_PRNE.SECTION',
                        'BLOCK1'
                    )
                    ->where(
                        'BRANCHES.BRANCH_CODE',
                        $selected_branch
                    )
                    ->get();


                return view('livewire.dashboard-filter')->with([
                    'posts' => $daftar,
                    'postspass' => $lulus,
                    'postsfail' => $gagal,
                    'postsdata' => $daftardata,

                ]);
            }
        } //END FOR LEVEL STATE


        elseif ($state_brn == 'BRN' && $state_user != '00') {
            // else{

            $daftardata = MDT_PRNE::select(
                'BRANCHES.BRANCH_CODE',
                'BRANCHES.STATE_CODE',
                'BRANCHES.BRANCH_NAME',
                'MDT_PRNE.HCRDATE',
                'MDT_PRNE.PAYREFNUM',
                'MDT_PRNE.IDNUM',
                'MDT_PRNE.BUYERNAME',
                'MDT_PRNE.PURPOSE',
                'MDT_PRNE.EFFDATE',
                'MDT_PRNE.EXPDATE',
                'MDT_PRNE.APPROVAL'
            )
                ->join(
                    'ACCOUNT_MASTER',
                    DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                    '=',
                    DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                )
                ->join(
                    'BRANCHES',
                    'BRANCHES.BRANCH_CODE',
                    '=',
                    'ACCOUNT_MASTER.BRANCH_CODE'
                )
                //->get();
                ->paginate(10);

            $daftar = MDT_PRNE::select(
                'BRANCHES.BRANCH_CODE',
                'BRANCHES.STATE_CODE',
                'BRANCHES.BRANCH_NAME',
                'MDT_PRNE.HCRDATE',
                'MDT_PRNE.PAYREFNUM',
                'MDT_PRNE.IDNUM',
                'MDT_PRNE.BUYERNAME',
                'MDT_PRNE.PURPOSE',
                'MDT_PRNE.EFFDATE',
                'MDT_PRNE.EXPDATE',
                'MDT_PRNE.APPROVAL'
            )
                ->where('BRANCHES.BRANCH_CODE', '=', $branch_user)
                ->join(
                    'ACCOUNT_MASTER',
                    DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                    '=',
                    DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                )
                ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                ->get();


            $lulus = MDT_PRNE::select(
                'BRANCHES.BRANCH_CODE',
                'BRANCHES.STATE_CODE',
                'BRANCHES.BRANCH_NAME',
                'MDT_PRNE.HCRDATE',
                'MDT_PRNE.PAYREFNUM',
                'MDT_PRNE.IDNUM',
                'MDT_PRNE.BUYERNAME',
                'MDT_PRNE.PURPOSE',
                'MDT_PRNE.EFFDATE',
                'MDT_PRNE.EXPDATE',
                'MDT_PRNE.APPROVAL'
            )
                ->where('BRANCHES.BRANCH_CODE', '=',  $branch_user)
                ->join(
                    'ACCOUNT_MASTER',
                    DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                    '=',
                    DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                )
                ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                ->where(
                    'MDT_PRNE.SECTION',
                    'BLOCK2'
                )
                ->get();


            $gagal = MDT_PRNE::select(
                'BRANCHES.BRANCH_CODE',
                'BRANCHES.STATE_CODE',
                'BRANCHES.BRANCH_NAME',
                'MDT_PRNE.HCRDATE',
                'MDT_PRNE.PAYREFNUM',
                'MDT_PRNE.IDNUM',
                'MDT_PRNE.BUYERNAME',
                'MDT_PRNE.PURPOSE',
                'MDT_PRNE.EFFDATE',
                'MDT_PRNE.EXPDATE',
                'MDT_PRNE.APPROVAL'
            )
                ->where('BRANCHES.BRANCH_CODE', '=',  $branch_user)
                ->join(
                    'ACCOUNT_MASTER',
                    DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"),
                    '=',
                    DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")
                )
                ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                ->where(
                    'MDT_PRNE.SECTION',
                    'BLOCK1'
                )
                //->get();
                ->paginate(10);

            return view('livewire.dashboard-filter')->with([
                'posts' => $daftar,
                'postspass' => $lulus,
                'postsfail' => $gagal,
                'postsdata' => $daftardata,


            ]);
        } //END FOR LEVEL BRANCH



    }
}
