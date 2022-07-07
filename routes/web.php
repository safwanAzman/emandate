<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticatedUser;
use App\Http\Controllers\AuthenticationUser;
// use App\Http\Controllers\DashboardController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logmasuk', [AuthenticationUser::class, 'logmasuk'])->name('logmasuk');
Route::post('/loggingin', [AuthenticationUser::class, 'loggingin'])->name('loggingin');
Route::post('/systemlogin?userid={userid}&password={password}', [AuthenticationUser::class, 'systemLogin']);
Route::get('/logkeluar', [AuthenticationUser::class, 'logkeluar'])->name('logkeluar');
Route::get('/emandate-auth', 'Bypasslogin@loggingin2');

Route::get('/loginterus/{userId}/{password}',function($userId,$password){
  
  $a = session(['key' => 'value']);

  dd(session()->get('key'));
});


//Route::post('/loggingin', [AuthenticationUser::class, 'loggingin'])->name('loggingin');

Route::middleware([AuthenticatedUser::class])->group(function() {
    
     /* Dashboard */
      Route::get('/', 'DashboardController@index')->name('dashboard');
      Route::get('/emandate-list', 'EmandateController@index')->name('Emandate_list.index');
      Route::get('/emandate-daftarnegeri', 'DaftarNegeriController@index')->name('listdaftar');
      Route::get('/emandate-lulusnegeri', 'LulusNegeriController@index')->name('listlulus');
      Route::get('/emandate-gagalnegeri', 'GagalNegeriController@index')->name('listgagal');
      /* dashboard emandate use livewire */
      //Route::get('emandate/emandate-dashboard', 'HomeController@index')->name('emandate.dashboard');
      Route::get('emandate-dashboard', 'HomeController@index')->name('emandate.dashboard');
      Route::get('dwh-dashboard', 'HomeController@index')->name('dwh.dashboard');
      //Route::resource('/DashboardENRPAll','dashenrpController');
      

        
      /* Report */
      Route::get('emandate/emandate-report', 'EmandateReportController@index')->name('report.dashboard');
     // Route::get('/emandate-report/sekatan-pemotongan', 'EmandateReportController@BlockedpaymentRpt')->name('report.blockedpayment');
     /* Report ENRP */
      Route::get('/main-enrp-report', 'EmandateReportController@ENRPRpt')->name('report.enrp');
      Route::resource('linkrptenrp','RptENRPController'); 
      Route::get('exportenrp', 'RptENRPController@export')->name('export-ENRP');
     /* Report RES (failed) */
      Route::get('/main-resfail-report', 'EmandateReportController@RESRptFail')->name('report.resfail');
      Route::resource('linkrptresfailed','RptRESfailController'); 
      Route::get('exportresfail', 'RptRESfailController@export')->name('export-resfail');
     /* Report RES (pass) */
      Route::get('/main-respass-report', 'EmandateReportController@RESRptPass')->name('report.respass');
      Route::resource('linkrptrespasses','RptRESpassController');
      Route::get('exportrespass', 'RptRESpassController@export')->name('export-respass');
     /* Report Hold (for all) */
      Route::get('/main-holdall-report', 'EmandateReportController@RESRptHoldall')->name('report.holdall');
      Route::resource('linkrptholdall','RptHoldAllController'); 
      Route::get('exportholdall', 'RptHoldAllController@export')->name('export-holdall');
      
      

      
      /* emandate_info */
      Route::get('emandate/search-box', 'searchController@index')->name('search.index');
      Route::get('/EmandateInfo', 'EmandateInfoController@index')->name('EmandateInfo.index');
      Route::post('/emandateinfoaactstatus', 'EmandateInfoController@activestatus')->name('EmandateInfo.activestatus');
      Route::resource('linkviewsearch','EmandateInfoController');
      Route::get('emandate/RujukanKod', 'RujukanKodController@index')->name('RujukanKod.index');
      Route::get('exportkodrujukan', 'RujukanKodController@export')->name('export-kodRujukan');




      Route::get('rpt-result', 'RptResultController@index')->name('rpt-result');




      /* emandate_info_action */
      Route::get('emandate/EmandateAction','EmandateAction@index') ->name('EmandateAction.index');


      /* for CFT */
      Route::get('emandate/search_cftlist', 'searchCFTController@index')->name('searchcft.index');
      Route::resource('linkmainCFT','CFTController');
      //Route::resource('linkcft','CFTControllerDetails');
      Route::get('linkcft','CFTControllerDetails@index')->name('linkcft.index');
      Route::get('linkcft/{id}/{file}','CFTControllerDetails@show')->name('linkcft.show');
      Route::get('exportcft', 'CftExportController@export')->name('export-cft');
      //Route::get('/linkmainCFT/{id}', 'CFTController@index')->name('linkcft.index');
    
      /* For ENRP */
      Route::get('emandate/search_mainenrp', 'searchMainENRPController@index')->name('searchenrp.index');
      Route::resource('linkmainenrp','EmandateController');
      Route::resource('link','EmandateControllerDetails');
      Route::get('exportenrp', 'EnrpExportController@export')->name('export-enrp');
      
    

      /*TESTING SP */
      Route::get('/sp_info', 'DashboardController@sp_info')->name('dashboard.sp_info');
      
      /* testing */
      Route::get('/sp01', function(){
          return Redirect::to('http://localhost/enrp/newenrp/enrp.php');
      })->name('sp01');


      /* TEST FOR CRUD USING Product */
      //Route::get('/cft-list', 'CFTController@index')->name('cft_list.index');
     //Route::get('/cft-listdetails', 'CFTControllerDetails@index')->name('cft_listdetails.index');
     //Route::get('/emandate-listdetails', 'EmandateControllerDetails@index')->name('Emandate_listDetails.index'); 
      //Route::get('/emandate-dashboard', 'DashboardEmandateController@index')->name('emandate.dashboard');
      //Route::post('/emandate-dashboard', 'DashboardEmandateController@index')->name('emandate.dashboard');

      //fullcalender crud
      Route::get('emandate/fullcalendareventmaster','FullCalendarEventMasterController@index')->name('fullcalander.index');
      Route::post('/fullcalendareventmaster/create','FullCalendarEventMasterController@create');
      Route::post('/fullcalendareventmaster/update','FullCalendarEventMasterController@update');
      Route::post('/fullcalendareventmaster/delete','FullCalendarEventMasterController@destroy');
      Route::get('api','FullCalendarEventMasterController@api');
      Route::post('/fullcalendareventmaster', 'FullCalendarEventMasterController@save')->name('fullcalendareventmaster.save');
});