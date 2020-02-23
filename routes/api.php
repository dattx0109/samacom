<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/virtual-assistant/get-job', ['as' => 'filterJob', 'uses' => 'VirtualAssistant\VirtualAssistantController@filterJob']);
Route::post('/virtual-register-user', ['as' => 'v-register-user', 'uses' => 'Account\AccountController@virtualRegisterAccount']);
Route::post('/active-user', ['as' => 'v-register-user-2', 'uses' => 'Account\AccountController@verifyAccount']);
Route::post('/verify-code', ['as' => 'v-register-user-3', 'uses' => 'Account\AccountController@verifyCode']);
Route::post('/login', ['as' => 'login', 'uses' => 'Account\AccountController@loginAccount']);
Route::get('list-province', ['as' => 'list-province', 'uses' => 'Province\ProvinceController@listProvince']);

Route::group(['middleware' => 'authSamacomUser'], function (){
    Route::post('update-account-detail', ['as' => 'update-account-detail', 'uses' => 'Account\AccountController@updateAccountDetail']);
    Route::post('update-account-detail-goal', ['as' => 'update-account-detail-goals', 'uses' => 'Account\AccountController@updateAccountDetailGoal']);
    Route::get('update-detail-api', ['as' => 'update-detail', 'uses' => 'Account\AccountController@detailApi']);
    Route::post('update-account-character', ['as' => 'add-character', 'uses' => 'Account\AccountController@addCharacterProfile']);

});

