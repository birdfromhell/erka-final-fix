<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BaseController;
use Modules\Store\Http\Controllers\StoreController;
use Laravel\passport\Passport;

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

//------------------------------------------------------------------\\
// Passport::routes();

Route::post('/login', [
    'uses' => 'Auth\LoginController@login',
    'middleware' => 'Is_Active',
]);

Route::get('password/find/{token}', 'PasswordResetController@find');


Route::group(['middleware' => ['web', 'auth:web', 'Is_Active']], function () {

    Route::get('/login', function () {
        return redirect('/login');
    });


    Route::get('/{vue?}', function () {
        $ModulesData = BaseController::get_Module_Info();

        return view('layouts.master', [
            'ModulesInstalled' => $ModulesData['ModulesInstalled'],
            'ModulesEnabled' => $ModulesData['ModulesEnabled'],
        ]);
    })->where('vue', '^(?!api|setup|update|update_database_module|password|module|store|online_store).*$');
 
});
   
    Auth::routes([
        'register' => false,
    ]);


//------------------------- -UPDATE ----------------------------------------\\

Route::group(['middleware' => ['web', 'auth:web', 'Is_Active']], function () {

    Route::get('update_database_module/{module_name}', 'ModuleSettingsController@update_database_module')->name('update_database_module');


    Route::get('/update', 'UpdateController@viewStep1');

    Route::get('/update/finish', function () {

        return view('update.finishedUpdate');
    });

    Route::post('/update/lastStep', [
        'as' => 'update_lastStep', 'uses' => 'UpdateController@lastStep',
    ]);

});




