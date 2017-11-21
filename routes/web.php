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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function() {
        return view('admin.layout.index');
    })->name('getDashboard');
    //================= Thể loại ==========================/
    Route::get('/theloai',[
        'as' => 'getTheLoai',
        'uses' => 'TheLoaiController@getTheLoai'
    ]);
    Route::get('/theloai/them', [
        'as' => 'getThemTheLoai',
        'uses' => 'TheLoaiController@getThemTheLoai'
    ]);
    Route::post('/theloai/them', [
        'as' => 'postThemTheLoai',
        'uses' => 'TheLoaiController@postThemTheLoai'
    ]);
    Route::get('/theloai/sua/{id}', [
        'as' => 'getSuaTheLoai',
        'uses' => 'TheLoaiController@getSuaTheLoai'
    ]);
    Route::post('/theloai/sua/{id}', [
        'as' => 'postSuaTheLoai',
        'uses' => 'TheLoaiController@postSuaTheLoai'
    ]);
    Route::get('/theloai/xoa/{id}', [
        'as' => 'getXoaTheLoai',
        'uses' => 'TheLoaiController@getXoaTheLoai'
    ]);
    //================= Sản phẩm ==========================/
    Route::get('/sanpham',[
        'as' => 'getSanPham',
        'uses' => 'SanPhamController@getSanPham'
    ]);
    Route::get('/sanpham/them', [
        'as' => 'getThemSanPham',
        'uses' => 'SanPhamController@getThemSanPham'
    ]);
    Route::post('/sanpham/them', [
        'as' => 'postThemSanPham',
        'uses' => 'SanPhamController@postThemSanPham'
    ]);
    Route::get('/sanpham/sua/{id}', [
        'as' => 'getSuaSanPham',
        'uses' => 'SanPhamController@getSuaSanPham'
    ]);
    Route::post('/sanpham/sua/{id}', [
        'as' => 'postSuaSanPham',
        'uses' => 'SanPhamController@postSuaSanPham'
    ]);
    Route::get('/sanpham/xoa/{id}', [
        'as' => 'getXoaSanPham',
        'uses' => 'SanPhamController@getXoaSanPham'
    ]);
    //================= Slide ==========================/
    Route::get('/slide',[
        'as' => 'getSlide',
        'uses' => 'SlideController@getSlide'
    ]);
    Route::get('/slide/them', [
        'as' => 'getThemSlide',
        'uses' => 'SlideController@getThemSlide'
    ]);
    Route::post('/slide/them', [
        'as' => 'postThemSlide',
        'uses' => 'SlideController@postThemSlide'
    ]);
    Route::get('/slide/sua/{id}', [
        'as' => 'getSuaSlide',
        'uses' => 'SlideController@getSuaSlide'
    ]);
    Route::post('/slide/sua/{id}', [
        'as' => 'postSuaSlide',
        'uses' => 'SlideController@postSuaSlide'
    ]);
    Route::get('/slide/xoa/{id}', [
        'as' => 'getXoaSlide',
        'uses' => 'SlideController@getXoaSlide'
    ]);
    //================= Xu Hướng ==========================/
    Route::get('/xuhuong', function() {
        return  redirect()->route('getBanChay');
    })->name('getXuHuong');
    Route::get('/xuhuong/banchay', [
        'as' => 'getBanChay',
        'uses' => 'XuHuongController@getBanChay'
    ]);
    Route::get('/xuhuong/hangmoi', [
        'as' => 'getHangMoi',
        'uses' => 'XuHuongController@getHangMoi'
    ]);
    Route::get('/xuhuong/sua', [
        'as' => 'getSuaXuHuong',
        'uses' => 'XuHuongController@getSuaXuHuong'
    ]);
    Route::post('/xuhuong/sua', [
        'as' => 'postSuaXuHuong',
        'uses' => 'XuHuongController@postSuaXuHuong'
    ]);
    //================= Admin ==========================/
    Route::get('/admin',[
        'as' => 'getAdmin',
        'uses' => 'AdminController@getAdmin'
    ]);
    Route::get('/admin/them', [
        'as' => 'getThemAdmin',
        'uses' => 'AdminController@getThemAdmin'
    ]);
    Route::post('/admin/them', [
        'as' => 'postThemAdmin',
        'uses' => 'AdminController@postThemAdmin'
    ]);
    Route::get('/admin/sua/{id}', [
        'as' => 'getSuaAdmin',
        'uses' => 'AdminController@getSuaAdmin'
    ]);
    Route::post('/admin/sua/{id}', [
        'as' => 'postSuaAdmin',
        'uses' => 'AdminController@postSuaAdmin'
    ]);
    Route::get('/admin/xoa/{id}', [
        'as' => 'getXoaAdmin',
        'uses' => 'AdminController@getXoaAdmin'
    ]);
    //Cuong edit===========================Don hang==========================
     Route::get('/admin/donghangdaduyet', [
        'as' => 'getOrder',
        'uses' => 'DonHangController@getOrder'
    ]);
    Route::get('/admin/donghangdangcho', [
        'as' => 'getWaitingOrder',
        'uses' => 'DonHangController@getWaitingOrder'
    ]);
    Route::get('/admin/deleteorder/{id}', [
        'as' => 'getDeleteOrder',
        'uses' => 'DonHangController@getDeleteOrder'
    ]);

    Route::get('/admin/duyetdonhang/{id}', [
        'as' => 'getDaDuyet',
        'uses' => 'DonHangController@getDaDuyet'
    ]);
    Route::post('/admin/timkiemdonhang/', [
        'as' => 'getSearchOrder',
        'uses' => 'DonHangController@getSearchOrder'
    ]);
    
    
});
