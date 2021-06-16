<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/mid', function () {
    return view('welcome');
});

Route::post('/getpayment','MidtransController@getTokenGet')->name('getpayment');

Route::get('/', 'AdminController@viewclass');
Route::get('/classcategory{nameCategory}', 'AdminController@percategory');

// Register 
Route::get('/class{id}', 'AdminController@class');
Route::get('/registerst', 'AdminController@class');

Route::post('/dataregister', 'AdminController@createuser')->name('dataregister');

Route::post('/pembayaran', 'AdminController@billings')->name('billings');
Route::post('/reginstansi', 'InstansiController@create')->name('reginstansi');

Route::post('/datasiswa','MemberController@datasiswa')->name('datasiswa');

Auth::routes();

// Test Midtrans

Route::get('/payment', 'MidtransController@bayar')->name('payment');
Route::post('/pembayaran', 'MidtransController@databayar')->name('pembayaran');

Route::group(['middleware' => ['CheckRole:admin']], function () {
    // Admin
    Route::get('/dashboardadmin', 'AdminController@dashboardadmin')->name('dashboardadmin');

    // Data User
    Route::get('/user', 'AdminController@user');
    Route::post('/user/create', 'AdminController@create');
    Route::put('/user/update/{id}', 'AdminController@update');
    Route::delete('/user/destroy/{id}', 'AdminController@destroy');
    Route::get('/user/updatepw', 'AdminController@updatepw');
    Route::get('/data_ins/cetak_pdf', 'AdminController@cetak_pdfIns');

    Route::put('/user/updatest/{id}', 'AdminController@updatest');
    Route::put('/user/updateest/{id}', 'AdminController@updateest');
    Route::delete('/user/destroyst/{id}', 'AdminController@destroyst');

    Route::put('/user/updatesiswa/{id}', 'AdminController@updatesiswa');
    
    // Program 
    Route::get('/program','AdminController@indexprogram');
    Route::delete('/program/delete/{id}','AdminController@deleteprogram');
    Route::post('/program/create','AdminController@createprogram');
    Route::put('/program/update/{id}','AdminController@updateprogram');

    // Testi
    Route::get('/testi','AdminController@indextesti');
    Route::delete('/testi/delete/{id}','AdminController@deletetesti');
    Route::post('/testi/create','AdminController@createtesti');
    Route::put('/testi/update/{id}','AdminController@updatetesti');

    // Classes
    Route::get('/class', 'AdminController@classes');
    Route::post('/class/create', 'AdminController@create_class');
    Route::delete('/class/delete/{id}', 'AdminController@delete_class');
    Route::put('/class/update/{id}', 'AdminController@update_class');
    Route::get('/siswa{category}', 'AdminController@show');
    Route::get('/data_member/cetak_pdf{category}', 'AdminController@cetak_pdfMember');

    // Moduls
    Route::get('/moduls', 'ModulController@index');

    // ass
    Route::get('/assignment', 'AssignmentController@index');

    // schedule
    Route::get('/schedule', 'ScheduleController@index');
    Route::post('/schedule/create', 'ScheduleController@create');
    Route::delete('/schedule/delete/{id}', 'ScheduleController@delete');
    Route::put('/schedule/update/{id}', 'ScheduleController@update');

    // Instansi 
    Route::get('/instansi', 'InstansiController@index');
    Route::delete('/instansi/delete/{id}', 'InstansiController@delete');
    Route::post('/int/create', 'InstansiController@createadmin');

    // Route::get('/updatepw', 'AdminController@updateview');
    Route::get('/databillings', 'AdminController@databillings')->name('databillings');
    Route::delete('/bill/delete/{id}', 'AdminController@deletebillings')->name('deletebillings');
    Route::get('/databill/cetakpdf', 'AdminController@cetakbill');

    // produk 
    Route::get('/adminproduk', 'ProductController@indexadmin');
    Route::delete('/pro/delete/{id}', 'ProductController@delete');
    Route::post('/pro/create', 'ProductController@create');
    

    // pemesanan
    Route::get('/adminpemesan', 'PemesanController@indexadmin');
    Route::delete('/pe/delete/{id}', 'PemesanController@delete');
    Route::post('/pe/create', 'PemesanController@create');
    Route::get('/pe/cetak_pdf', 'PemesanController@cetak');
    Route::put('/pe/update/{id}', 'PemesanController@update');
});

Route::group(['middleware' => ['CheckRole:instructor']], function () {
    // Ins
    Route::get('/dashboardins', 'InsController@dashboardins')->name('dashboardins');

    // Classes
    Route::get('/classes', 'InsController@class');
    Route::get('/memberclass', 'InsController@selectClass');
    Route::get('/student{category}', 'InsController@show');
    // Route::get('/memberclass','InsController@')
    // schedule
    Route::get('/scheduls', 'InsController@schedule');
    Route::post('/scheduls/create', 'InsController@createSchedule');
    Route::delete('/scheduls/delete/{id}', 'InsController@deleteSchedule');
    Route::put('/scheduls/update/{id}', 'InsController@updateSchedule');

    // Moduls
    Route::get('/modulede', 'ModulController@indexins');
    Route::post('/moduled/create', 'ModulController@createins');
    Route::delete('/module/delete/{id}', 'ModulController@deleteins');
    Route::put('/moduled/update/{id}', 'ModulController@updateins');

    // assignment
    Route::get('/assignments', 'AssignmentController@indexins');
    Route::delete('/ass/delete/{id}', 'AssignmentController@deleteins');
    Route::post('/ass/create', 'AssignmentController@create');
    Route::put('ass/update/{id}', 'AssignmentController@updateins');
});
    
    Route::get('/detail{category}', 'MemberController@detail');

Route::group(['middleware' => ['CheckRole:student']], function () {
    // Student
    Route::get('/homestudent', 'MemberController@viewclass');
    Route::get('/detail/{category}', 'MemberController@detailst');
    Route::get('/dashstudent{class_category}', 'MemberController@index')->name('dashstudent');
    Route::get('/student', 'MemberController@student')->name('student');

    // User modul
    Route::get('/viewmodul', 'ModulController@list');
    Route::get('/reading{id}', 'ModulController@listdetail');

    Route::get('/schedulesiswa', 'ScheduleController@indexsiswa');

    // User Sand Ass
    Route::get('/up{id}', 'AssignmentController@formsand');
    Route::get('/listass', 'AssignmentController@listuser');
    Route::delete('/ass/deletesiswa/{id}', 'AssignmentController@delete');
    Route::post('/ass/create', 'AssignmentController@create');
    Route::put('ass/updatesiswa/{id}', 'AssignmentController@updatesiswa');

    Route::get('/materi/baca/{id}', 'ModulController@baca');
});

// Agency
    Route::get('/digiclassagency', 'ProductController@index');
    Route::get('/detailproduk/{id}', 'ProductController@detail');

// Route Change Password
Route::get('password', 'AdminController@changeview')->name('change.password');
Route::patch('password', 'AdminController@updatepw')->name('change.password');

// Update Profile
Route::get('/viewprofile', 'AdminController@view_profile')->name('viewprofile');
Route::put('/setprofile/{id}', 'AdminController@update_profile');


Route::get('/upload', function () {
    return view('user.upload_ass');
});

// Notificaton alert
Route::get('/pesan', 'NotifController@index');
Route::get('/pesan/adding', 'NotifController@adding');
Route::get('/pesan/update', 'NotifController@update');
Route::get('/pesan/gagal', 'NotifController@gagal');
