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

use Illuminate\Support\Facades\Hash;

    Route::get('/hash', function () {
        return Hash::make('admin@123');
    });

	Route::get('/{url}', ['middleware' => 'guest', function ($url) {
    	return view('admin.login.index'); 
    }])->where(['url' => 'admindashlogin|login']);//
	//Route::get('/admindashlogin', function () { return view('admin.login.index'); })->name('admin-login');
	Route::post('/admindashlogin','Auth\LoginController@login');
	Route::post('/login','Auth\LoginController@login');
	Route::get('/logout','Auth\LoginController@logout');
    Route::group(['namespace'=>'Backend','prefix'=>'backend','middleware'=>['auth','admin']],  function(){        
        Route::get('/dashboard', 'DashBoardController@index')->name('admin-dashboard');
		Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');
		Route::resource('/category','ManageCategoryController');
        Route::resource('/banner','ManageBannerController');
		//Route::resource('/exhibition','ManageExhibitionController'); 
		Route::resource('/cms','ManageCmsController');
		Route::resource('/gallery_product','ManageProductGalleryController');
		Route::resource('/product','ManageProductController');
        Route::get('/product/gallery/{id}', 'ManageProductGalleryController@index')->name('product-gallery');
        Route::get('/product/gallery/create/{id}', 'ManageProductGalleryController@create')->name('product-gallery-create');
        Route::get('/statusupdate/{pid}/{status}/{tbl}', 'AjaxManageController@statusupdate');
        Route::resource('/newsletter','ManageNewsletterController');
        Route::get('contactus','ManageNewsletterController@contactus');
        // excel download
        Route::get('/export_excel', 'ExportExcelController@index');
        Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');
        Route::get('/exhibition/index/{id}', 'ManageExhibitionController@index');
        Route::post('/exhibition/upload_data', 'ManageExhibitionController@store');
        Route::post('/exhibition/delete', 'ManageExhibitionController@destroy');
    });
    /* Route::get('/', function () {
        return view('welcome');
    }); */
    Route::get('/ccache', function() {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    });
	// Route::group(['prefix' => 'backend'], function () {
        //Auth::routes();
    //});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/cms/{slug}', 'HomeController@cms')->name('cms');
//Route::get('/contact', 'HomeController@contactus')->name('contact');
Route::get('/contact',function(){
    return view('front.pages.contact');
});

Route::get('/ecatalogue',function(){
    return view('samples.basic.index');
});
Route::get('/galleryartwork',function(){
    return view('front.pages.galleryartwork');
});
Route::get('/galleryexhibition',function(){
    return view('front.pages.galleryexhibition');
});
Route::get('/galleryvideo',function(){
    return view('front.pages.galleryvideo');
});
Route::get('/upcomingexhibition',function(){
    return view('front.pages.galleryupexhibition');
});
Route::post('/contact','HomeController@contactus')->name('contactus');
Route::post('/newsletter','HomeController@newsletter')->name('newsletter');
Route::get('/product/{category}/{subcategory}','HomeController@product')->name('product');
Route::get('/detail/{category}/{subcategory}','HomeController@productdetail')->name('product');
Route::get('/category/{slug}',  'HomeController@category')->name('category');
Route::get('/search',  'HomeController@search')->name('search');


