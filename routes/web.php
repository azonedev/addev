<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'frontend\Home@index');

// --------------
// Frontend
// --------------

Route::get('/{id}/{name?}','frontend\Single@index')->where('id', '[0-9]+');
Route::get('/about-us','admin\AboutUs@show');
Route::get('/terms','admin\Terms@show');

Route::get('/all-ads','frontend\Listing@index');
Route::get('/all-category','frontend\Category@index');
Route::get('/category/{name}','frontend\Category@categoryAds');

Route::get('/contact-us','frontend\ContactUs@index');
Route::post('/contact-us/store','frontend\ContactUs@store');

// tag
Route::get('/product/{tag}','frontend\Tag@index');

// search
Route::get('/search/result','frontend\Search@index');

// --------------
// Admin
// --------------

Route::group(['prefix'=>'admin', 'middleware' =>'role'],function (){

    Route::get('/',"admin\Admin@index");

    // category
    Route::get('/category',"admin\Category@index");
    Route::post('/category/save',"admin\Category@store");
    Route::get('/category/edit/{id}',"admin\Category@edit");
    Route::post('/category/update/{id}',"admin\Category@update");
    Route::get('/category/delete/{id}',"admin\Category@destroy");

    // ADS
    Route::get('/add-to-paid','admin\AdShow@AddToPaid');
    Route::post('/add-to-paid/update/{id}','admin\AdShow@update');
    Route::get('/paid-ads','admin\AdShow@paidAds');
    Route::get('/active-ads','admin\AdShow@active');
    Route::get('/deactivated-ads','admin\AdShow@deactivated');
    Route::get('/all-ads','admin\AdShow@index');
    Route::get('/ads/delete/{id}','admin\AdShow@destroy');

    // messages
    Route::get('/new-messages','admin\Messages@index');
    Route::get('/message/{id}','admin\Messages@single');
    Route::get('/message/update/{id}','admin\Messages@update');
    Route::get('/all-messages','admin\Messages@create');
    Route::get('/message/delete/{id}','admin\Messages@destroy');

    // user [admin-list]
    Route::get('/admin-list',"admin\AdminUserShow@index");
    Route::get('/admin-list/delete/{id}',"admin\AdminUserShow@destroy");

    // user [admin-add]
    Route::get('/add-new',"admin\AdminUserShow@create");
    Route::post('/add-new/update/{id}',"admin\AdminUserShow@update");
    
    // user [normal-user-list]
    Route::get('/user-list',"admin\AdminUserShow@show");
    
    // section-settings
    Route::get('/section-settings',"admin\SectionSettings@index");
    Route::post('/section-settings/update/',"admin\SectionSettings@update");;
    
    // page-settings [about-us]
    Route::get('/about-us',"admin\AboutUs@index");
    Route::post('/about-us/update/{id}',"admin\AboutUs@update");

    // page-settings [terms]
    Route::get('/terms',"admin\Terms@index");
    Route::post('/terms/update/{id}',"admin\Terms@update");

    // setting
    Route::get('/setting',"admin\Setting@index");
    Route::post('/setting/update/{id}',"admin\Setting@update");

    Route::get('/export-data',"admin\ExportExcelController@index");

    // export user data
    Route::get('/export-data/user',"admin\ExportExcelController@userExport");
});

// --------------
// User
// --------------

// user login & reg

Route::get('/register',"user\GeneralUser@index");
Route::post('/register/save',"user\GeneralUser@store");

Route::get('/login/{url?}',"user\GeneralUser@showLogin");
Route::post('/login/match',"user\GeneralUser@matchLogin");
Route::get('/logout',"user\GeneralUser@logout");
                                                                                        
// all-user-action

Route::group(['prefix' => 'user','middleware' =>'useraction'], function () {

    // ad-post
    Route::get('/ad-post','user\AdPost@index');
    Route::post('/ad-post/save','user\AdPost@store');

    // user-account
    Route::get('/profile','user\MyAccount@index');
    Route::post('/profile/update/{id}','user\MyAccount@update');
    
    Route::get('/account','user\MyAccount@account');
    Route::get('/ad-post/edit/{id}','user\MyAccount@editAccount');
    Route::post('/account/update/{id}','user\MyAccount@updateAccount');
    Route::get('/post/delete/{id}','user\MyAccount@destroy');

});

