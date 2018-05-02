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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function()
{
    return View::make('pages.login');
});
Route::get('home', function()
{
    return View::make('pages.home');
});
Route::get('about', function()
{
    return View::make('pages.about');
});
Route::get('projects', function()
{
    return View::make('pages.projects');
});
Route::get('contact', function()
{
    return View::make('pages.contact');
});
Route::get('tdhome', function()
{
    return View::make('pages.tdhome');
});
Route::get('tchome', function()
{
    return View::make('pages.tchome');
});
Route::get('training_center_form', function()
{
    return View::make('pages.tchome');
});
Route::post('/login', 'loginController@login');

Route::get('/pftarget/ajax/{id}','pftargetfetchController@getBatchList');
Route::get('/pftarget/batchajax/{id}','pftargetfetchController@getBatchInfo');
Route::get('/pftarget', 'pftargetfetchController@pftargetfetch');
Route::post('insertpftarget', 'insertpftargetController@insertpf');

Route::get('/viewpftarget', 'viewpftargetfetchController@viewpftargetfetch');
Route::get('/viewpftarget/ajax/{id}','viewpftargetfetchController@viewgetBatchList');
Route::get('/viewpftarget/batchajax/{id}','viewpftargetfetchController@viewgetBatchInfo');

Route::get('/training_center_form','TCfomController@tcform');
Route::post('/training_center_form','TCfomController@insert');
// Route::post('/insertpftarget', function()
// {
//     echo "ya its working";
// });
