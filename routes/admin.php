<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('admin/dashboard', function (){
//    return view('admin.dashboard');
//})->name('admin.dashboard');

define('PAGINATION_MY_COUNT','20');      // this is the constant of pagination value

Route::group(['namespace' => 'Admin' , 'middleware' => 'auth:admin'],function (){
    Route::get('/','DashboardController@index') -> name('admin.dashboard');

    ################ Start Languages Routes ################

    Route::group(['prefix'=>'languages'],function (){
        Route::get('/','LanguagesController@index') -> name('admin.languages');
        Route::get('create','LanguagesController@create') -> name('admin.languages.create');
        Route::post('store','LanguagesController@store') -> name('admin.languages.store');

        Route::get('edit/{id}','LanguagesController@edit') -> name('admin.languages.edit');
        Route::post('update/{id}','LanguagesController@update') -> name('admin.languages.update');

        Route::get('delete/{id}','LanguagesController@destroy') -> name('admin.languages.delete');
    });

    ################ End Languages Routes ################
});

Route::get('allData',function (){
    return ('Yes this is the total data');
});

Route::group(['namespace' => 'Admin','middleware' => 'guest:admin'],function (){
    Route::get('login','LoginController@getLogin') -> name('admin.getLogin');
    Route::post('login','LoginController@login')-> name('admin.login');
});
