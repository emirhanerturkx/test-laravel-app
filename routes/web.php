<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SharePost;
use App\Http\Controllers\MainIndex;

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

Route::get('/', [MainIndex::class, 'Index']);


//Admin Route
Route::get('/admin', function () {
    return view('backend/index');
});
Route::get('/admin/blog', [SharePost::class, 'viewPage']);
Route::get('/admin/post/{id}/delete', [SharePost::class, 'deletePost']);

Route::middleware('validatePost')->post('/admin/blog/add-blog', [SharePost::class, 'sharePost'])->name('add-post');
//Admin Route