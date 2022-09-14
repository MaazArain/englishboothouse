<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SizesController;
use App\Models\Product;
use App\Models\Sizes;
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
// Pages Controller Start
Route::get('/',[PagesController::class, 'index'])->name('index');
Route::get('/collection',[PagesController::class, 'collection'])->name('collection');
Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
Route::get('/shoes',[PagesController::class, 'shoes'])->name('shoes');
Route::get('/racing_boots',[PagesController::class, 'racing_boots'])->name('racing_boots');
Route::get('/details/{id}',[PagesController::class, 'details'])->name('details');
Route::get('/question/{product_id}',[QuestionController::class, 'question'])->name('question');
Route::post('/store_question',[QuestionController::class, 'store_question'])->name('store_question');
Route::get('/admin/product_question/list_question',[AdminController::class, 'list_question'])->name('list_question');
Route::get('/admin/product_question_reply/reply_question/{qid}',[AdminController::class, 'reply_question'])->name('reply_question');
Route::get('/admin/product_answer_reply/reply_answer/{qid}',[AdminController::class, 'reply_answer'])->name('reply_answer');
Route::post('/admin/product_answer_reply/store_answer',[AdminController::class, 'store_answer'])->name('store_answer');
// Pages Controller End
// Admin Controller Work
Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/categories/add_category',[AdminController::class, 'add_category'])->name('add_category');
Route::get('/admin/categories/list_category',[AdminController::class, 'list_category'])->name('list_category');
Route::post('/admin/categories/store_category',[AdminController::class, 'store_category'])->name('store_category');
Route::get('/admin/categories/edit_category/{id}',[AdminController::class , 'edit_category'])->name('edit_category');
Route::post('/admin/categories/update_category/{id}' ,[AdminController::class, 'update_category'])->name('update_category');
Route::get('/admin/categories/delete_category/{id}' ,[AdminController::class, 'delete_category'])->name('delete_category');
// Products Work Start
Route::get('/admin/categories/products',[ProductsController::class, 'index'])->name('products');
Route::post('/admin/categories/store_products' , [ProductsController::class , 'store_products'])->name('store_products');
// Products Work End
// Size Work Start
Route::get('/admin/sizes' , [SizesController::class , 'add_size'])->name('add_size');
Route::post('/admin/add_size' , [SizesController::class , 'store_size'])->name('store_size');
Route::get('/admin/list_size' , [SizesController::class , 'list_size'])->name('list_size');
Route::get('/admin/edit_size/{id}' , [SizesController::class , 'edit_size'])->name('edit_size');
Route::post('/admin/update_size/{id}' ,[SizesController::class, 'update_size'])->name('update_size');
Route::get('/admin/delete_size/{id}' , [SizesController::class , 'delete_size'])->name('delete_size');
// Size Work End
// Colors Work Start
Route::get('/admin/colors',[ColorsController::class , 'add_colors'])->name('add_colors');
Route::get('/admin//colors/list_colors',[ColorsController::class , 'list_colors'])->name('list_colors');
Route::get('/admin//colors/edit_colors/{id}',[ColorsController::class , 'edit_colors'])->name('edit_colors');
Route::post('/admin//colors/update_colors/{id}',[ColorsController::class , 'update_colors'])->name('update_colors');
Route::get('/admin//colors/delete_colors/{id}',[ColorsController::class , 'delete_colors'])->name('delete_colors');
Route::post('/admin/colors/add_colors',[ColorsController::class , 'store_colors'])->name('store_colors');
// Colors Work End