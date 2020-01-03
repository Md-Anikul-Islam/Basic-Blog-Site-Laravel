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


//Normal
// Route::get('/about', function () {
//     //echo "NSU";
//     return view('admin.basic');
// });




//Middlewere
// Route::get('home', function () {
//     echo "This Is Home Page";
   
// });
// Route::get('/contuct', function () {

//     return view('admin.contuct');
// })->middleware('age');





//bladw Template
// Route::get('/other', function () {
//     //echo "NSU";
//     return view('other',['anik' =>'Information Page']);
// });


// Route::prefix('nsu')->group(function(){

// 	Route::get('/about', function () {
//     //echo "NSU";
//     return view('admin.basic');
// });

// });


//use controller
// Route::get('/','AllInOneController@main_page');

// Route::get('/info','AllInOneController@basic_info');

//Route::get(md5('allinfo'),'AllInOneController@basic_info')->name('info');

// Route::get(md5('/nsu'),'AllInOneController@nsu_info')->name('university');
// Route::get('/write','AllInOneController@write_post');
//Route::get('/','AllInOneController@main_page');
// Route::get('/', function () {
//     return view('admin.index');
// });


Route::get('/','AllInOneController@index');


Route::get('/contuct','AllInOneController@contuct_page');
Route::get('/about','AllInOneController@about_page');


Route::get('/home','AllInOneController@home_page');

Route::get('/addcategory','AllInOneController@add_category');

Route::post('/save-category','AllInOneController@save_category');

Route::get('/allcategory','AllInOneController@all_category');


Route::get('view/category/{id}','AllInOneController@view_category');

Route::get('delete/category/{id}','AllInOneController@delete_category');
Route::get('edit/category/{id}','AllInOneController@edit_category');
Route::post('update/category/{id}','AllInOneController@update_category');

//************************************************************************************
//************************************************************************************
//************************************************************************************
//************************************************************************************
//************************************************************************************
//************************************************************************************
//************************************************************************************
//************************************************************************************
//************************************************************************************

Route::get('/write','AllPostReletedController@write_post');

Route::post('/save-post','AllPostReletedController@save_post');
Route::get('/allpost','AllPostReletedController@all_post');


Route::get('view/post/{id}','AllPostReletedController@view_post');
Route::get('delete/post/{id}','AllPostReletedController@delete_post');


// Route::get('edit/post/{id}','AllPostReletedController@edit_post');
// Route::post('update/post/{id}','AllPostReletedController@update_post');


Route::get('/addstudent','StudentController@add_student');
Route::post('/save-student','StudentController@save_student');
Route::get('/allstudent','StudentController@all_student');




Route::get('view/student/{id}','StudentController@view_student');
Route::get('delete/student/{id}','StudentController@delete_student');



Route::get('edit/student/{id}','StudentController@edit_student');
Route::post('update/student/{id}','StudentController@update_student');