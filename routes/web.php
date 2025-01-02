<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DocController;



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

Route::resource('user',UserController::class);
Route::resource('patient',PatientController::class);
Route::resource('treatment',TreatmentController::class);

Route::get('/',[UserController::class,'index']); //tem hide

Route::POST('/home',[LoginController::class,'checklogin'])->name('login');

Route::get('/',[LoginController::class,'logout'])->name('logout');

Route::get('/home',[pageController::class,'Home'])->name('home');  //tem hide

Route::get('/contactus',[pageController::class,'Contactus'])->name('contactus'); 

Route::get('/admission',[pageController::class,'Admission'])->name('admission');

Route::get('/staff',[pageController::class,'Staff'])->name('staff');

//Route::get('/patientfeature/{patient}',[pageController::class,'PatientFeature'])->name('patientfeature');

Route::get('/patients',[pageController::class,'PatientDetail'])->name('patients');

Route::get('/detailShow/{patient}',[PatientController::class,'Detailshow'])->name('show');

Route::get('/daytoday/{patient}',[PatientController::class,'DayToDay'])->name('daytoday');

Route::get('/poh/{patient}',[PatientController::class,'Poh'])->name('poh');
Route::get('/history/{patient}',[PatientController::class,'History'])->name('history');
Route::get('/deliveryhistory/{patient}',[PatientController::class,'DeliveryHistory'])->name('deliveryhistory');

Route::get('/admit/{patient}',[PatientController::class,'Admit'])->name('admit');

Route::get('/addpoh/{patient}',[PatientController::class,'Addpoh'])->name('addpoh');
Route::get('/addhistory/{patient}',[PatientController::class,'AddHistory'])->name('addhistory');
Route::get('/adddeliveryhistory/{patient}',[PatientController::class,'AddDeliveryHistory'])->name('adddeliveryhistory');

Route::get('/pohedit/{id}/{patient_id}',[PatientController::class,'PohEdit'])->name('pohedit');
Route::get('/historyedit/{id}/{patient_id}',[PatientController::class,'HistoryEdit'])->name('historyedit');
Route::get('/deliveryhistoryedit/{id}/{patient_id}',[PatientController::class,'DeliveryHistoryEdit'])->name('deliveryhistoryedit');

Route::patch('/updatepoh/{id}/{patient_id}',[PatientController::class,'updatepoh'])->name('updatepoh');
Route::patch('/updatehistory/{id}/{patient_id}',[PatientController::class,'updatehistory'])->name('updatehistory');
Route::patch('/updatedeliveryhistory/{id}/{patient_id}',[PatientController::class,'updatedeliveryhistory'])->name('updatedeliveryhistory');

Route::post('/store1',[PatientController::class,'PohStore'])->name('PohStore');
Route::post('/store2',[PatientController::class,'HistoryStore'])->name('HistoryStore');
Route::post('/store3',[PatientController::class,'DeliveryHistoryStore'])->name('DeliveryHistoryStore');

Route::get('/visit/{patient}',[PatientController::class,'Visit'])->name('visit');

Route::get('/dischargedView',[pageController::class,'dischargedView'])->name('dischargedView');

Route::get('/admittedView',[pageController::class,'admittedView'])->name('admittedView');

Route::get('/subvisit/{date}/{patient_id}/{visit}',[PatientController::class,'SubVisit'])->name('subvisit');

Route::get('/DayShow/{date}/{patient_id}',[PatientController::class,'DayShow'])->name('DayShow');

Route::get('/discharge/{patient}',[PatientController::class,'discharge'])->name('discharge');

Route::get('/treatmentEdit/{date}/{patient_id}/{visit}',[TreatmentController::class,'TreatmentEdit'])->name('treatmentEdit');

Route::get('/autocomplete1', [AutocompleteController::class, 'searchComp'])->name('searchComp');
Route::get('/autocomplete2', [AutocompleteController::class, 'searchExam'])->name('searchExam');
Route::get('/autocomplete3', [AutocompleteController::class, 'searchManage'])->name('searchManage');
Route::get('/autocomplete4', [AutocompleteController::class, 'searchDecision'])->name('searchDecision');

Route::get('/resetpassword/{user}',[UserController::class,'gotoReset'])->name('reset');
Route::post('/updatepassword/{user}',[UserController::class,'Resetpassword'])->name('getpassword');
Route::patch('/treatupdate/{date}/{patient_id}/{visit}',[TreatmentController::class,'treatupdate'])->name('treatupdate');



Route::get('monthentrychart', [ChartController::class, 'index'])->name('monthentrycharts');
Route::get('yearentrychart', [ChartController::class, 'yearEntryChart'])->name('yearentrycharts');

Route::match(['get', 'post'], '/doc', [DocController::class, 'Doc'])->name('doc');
Route::get('/download-pdf/{start_date}/{end_date}', [DocController::class, 'downloadPatientsPDF'])->name('download.pdf');
Route::get('/download-excel/{start_date}/{end_date}', [DocController::class, 'downloadPatientsExcel'])->name('download.excel');
Route::get('/downloadt-pdf/{start_date}/{end_date}', [DocController::class, 'downloadTreatmentsPDF'])->name('downloadt.pdf');
Route::get('/downloadt-excel/{start_date}/{end_date}', [DocController::class, 'downloadTreatmentsExcel'])->name('downloadt.excel');
Route::get('/download-combined-pdf/{start_date}/{end_date}',[DocController::class, 'downloadCombinedPdf'])->name('download.combined.pdf');
Route::get('/download-combined-excel/{start_date}/{end_date}',[DocController::class, 'downloadCombinedExcel'])->name('download.combined.excel');

Route::get('/download-sql-dump', [DocController::class, 'downloadSqlDump'])->name('download.sql.dump');

/* test routes 


Route::get('/add', function () {
    return view('addStaff');
}); 

Route::get('/staff', function () {
    return view('StaffDetails');
}); */

