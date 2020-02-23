
<?php

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

Route::post('/push-file',['as' =>'push-file', 'uses' => 'Test\TestController@pushFile']);

Route::get('/register',['as' =>'get-register', 'uses' => 'Auth\RegisterController@getRegister']);
Route::post('/register',['as' =>'post-register', 'uses' => 'Auth\RegisterController@postRegister']);
// login
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@getlogin']);
Route::post('/postLogin', ['as' => 'post-login', 'uses' => 'Auth\LoginController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/', ['as' => 'home', 'uses' => 'Jobs\JobController@index']);

Route::get('/cong-viec/{id}', ['as' => 'detail_job.id', 'uses' => 'Jobs\JobController@getDetailJobById']);
//Route::get('/cong-viec/{slug}', ['as' => 'detail_job.slug', 'uses' => 'Jobs\JobController@getDetailJobBySlug'])->name('b');


Route::get('/danh-sach-cong-viec', ['as' => 'list-job', 'uses' => 'Jobs\JobController@getListJobs']);
Route::get('/list-district-by-province', ['as' => 'list-district', 'uses' => 'Jobs\JobController@listDistrictByProvince']);

Route::get('/list-province', ['as' => 'list-province', 'uses' => 'PlaceWork\ProvinceController@getList']);
Route::get('/test', ['as' => 'test', 'uses' => 'PlaceWork\ProvinceController@test']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


Route::get('account/get-all-filed-job', ['as' => 'get-all-field-job', 'uses' => 'Account\AccountController@getAllFieldJobs']);
Route::get('account/get-list-all-skill', ['as' => 'get-list-skill', 'uses' => 'Account\AccountController@getAllSkill']);
Route::get('account/get-list-all-character', ['as' => 'get-list-character', 'uses' => 'Account\AccountController@getAllCharacter']);


Route::group(['middleware' => 'authSamacomUser'], function (){

    Route::get('/job/{id}', ['as' => 'detail-job-id', 'uses' => 'Jobs\JobController@getJobByIdApi']);

    Route::get('/candidate/{id}', ['as' => 'candidate', 'uses' => 'Candidate\CandidateController@applyJob']);
    Route::get('/candidate-api/{id}', ['as' => 'candidate', 'uses' => 'Candidate\CandidateController@applyJobApi']);
    Route::namespace('Account')->prefix('account')->group(function () {
        //skill
        Route::post('add-account-skill', ['as' => 'add-account-skill', 'uses' => 'AccountController@storeAccountSkill']);
        Route::post('delete-account-skill/{id}', ['as' => 'delete-account-skill', 'uses' => 'AccountController@deleteAccountSkill']);
        Route::get('detail-account-skill/{id}', ['as' => 'detail-account-skill', 'uses' => 'AccountController@getAccountSkillById']);
        Route::get('update-account-skill/{id}', ['as' => 'update-account-skill', 'uses' => 'AccountController@updateAccountSkill']);
        //exp
        Route::post('add-exp', ['as' => 'add-exp', 'uses' => 'AccountController@createExperience']);
        Route::post('delete-exp/{id}', ['as' => 'delete-exp', 'uses' => 'AccountController@deleteAccountExperience']);
        Route::get('get-exp/{id}', ['as' => 'get-exp', 'uses' => 'AccountController@getAccountExperienceById']);
        Route::post('update-exp/', ['as' => 'update-exp', 'uses' => 'AccountController@updateAccountExperience']);
        Route::post('update-job-status/', ['as' => 'job-status-exp', 'uses' => 'AccountController@updateJobStatus']);
        Route::get('get-list-exp', ['as' => 'get-list-exp', 'uses' => 'AccountController@getListAccountExp']);


        //edu
        Route::get('get-account-education/{id}', ['as' => 'get-account-education', 'uses' => 'AccountController@getAccountEduId']);
        Route::post('add-account-education', ['as' => 'add-account-education', 'uses' => 'AccountController@createAccountEducation']);
        Route::post('delete-account-education/{id}', ['as' => 'delete-account-education', 'uses' => 'AccountController@deleteAccountEducation']);
        Route::post('update-account-education/{id}', ['as' => 'update-account-education', 'uses' => 'AccountController@updateAccountEducation']);
        Route::get('get-list-edu', ['as' => 'get-list-edu', 'uses' => 'AccountController@getListAccountEdu']);


        Route::get('get-list-account-wish', ['as' => 'get-list-account-wish', 'uses' => 'AccountController@getListAccountWish']);
        Route::get('get-list-profile-percentage', ['as' => 'get-list-percentage', 'uses' => 'AccountController@percentageProfile']);

        Route::get('get-list-account-skill', ['as' => 'get-list-skill', 'uses' => 'AccountController@getSkillCharacter']);
        Route::get('get-profile-character', ['as' => 'get-profile-character', 'uses' => 'AccountController@getCharacterProfile']);
        Route::get('get-account', ['as' => 'get-account', 'uses' => 'AccountController@getAccount']);

        Route::get('get-list-province', ['as' => 'get-list-province', 'uses' => 'AccountController@getListProvince']);

        //info
        Route::get('update-detail', ['as' => 'update-detail', 'uses' => 'AccountController@detail']);

        Route::post('update-avatar', ['as' => 'update-avatar', 'uses' => 'AccountController@uploadAvatar']);
        Route::post('add-account-wish', ['as' => 'add-account-wish', 'uses' => 'AccountController@updateAccountWish']);
        Route::post('check', ['as' => 'check-account', 'uses' => 'AccountController@checkAccount']);

        //dieukhoanchinhsach

    });
// virtual assistant
    Route::get('/tro-ly-ao', ['as' => 'tla', 'uses' => 'VirtualAssistant\VirtualAssistantController@homeNew']);
});
//verify account
Route::group(['middleware' => 'activeCode'], function () {
    Route::get('/confirm/sms', ['as' => 'confirm sms', 'uses' => 'SmsConfirm\SmsConfirmController@smsConfirm']);
    Route::post('/confirm/code', ['as' => 'confirm-code', 'uses' => 'SmsConfirm\SmsConfirmController@confirmSms']);
    Route::post('/confirm/new-code-active', ['as' => 'new-code-active', 'uses' => 'Auth\RegisterController@newAccountVerify']);
    Route::get('/change-password', ['as' => 'change-password', 'uses' => 'Account\AccountController@changePassword']);
    Route::post('/change-password', ['as' => 'change-password', 'uses' => 'Account\AccountController@changePasswordAfterAddPasswordNew']);
});



Route::get('/workplace/list-district-by-province', ['as' => 'list-district-by-province', 'uses' => 'PlaceWork\WorkPlaceController@getListDistrictByProvince']);
// LandingPage & tu van

//Route::get('/smc-landing-page', function(){
//    return view('landing-page.landingPage');
//});
//
//Route::post('/landing-advisory', ['as' => 'advisory', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForLandingPage']);
//
//Route::get('/goi-dang-tin', function(){
//    return view('landing-page.page.goidangtin');
//});
//Route::post('/advisory-package-1', ['as' => 'advisory1', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage1']);
//
//
//Route::get('/goi-loc-cv', function(){
//    return view('landing-page.page.goiloccv');
//});
//Route::post('/advisory-package-2', ['as' => 'advisory', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage2']);
//
//Route::get('/goi-combo', function(){
//    return view('landing-page.page.goicombo');
//});
//Route::post('/advisory-package-3', ['as' => 'advisory', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage3']);
//
//Route::get('/goi-ung-vien', function(){
//    return view('landing-page.page.goiungvientdpv');
//});
//Route::post('/advisory-package-4', ['as' => 'advisory', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage4']);
//
//Route::get('/goi-nhan-su-tc', function(){
//    return view('landing-page.page.goinhansutd');
//});
//Route::post('/advisory-package-5', ['as' => 'advisory', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage5']);
//
//Route::get('/goi-dao-tao', function(){
//    return view('landing-page.page.goidaotao');
//});
//Route::post('/advisory-package-6', ['as' => 'advisory', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage6']);
//
Route::get('/dieu-khoan-chinh-sach', function(){
    return view('policy.policy');
});
Route::get('/download-tai-lieu', ['as' => 'test', 'uses' => 'Document\DocumentController@listFile']);
Route::get('/download-file', ['as' => 'download file', 'uses' => 'Document\DocumentController@downloadFile']);

