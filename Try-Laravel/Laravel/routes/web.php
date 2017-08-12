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

use App\Categories;
use Illuminate\Http\Request;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('main');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::post('/categories', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $category = new Categories;
    $category->name = $request->name;
    $category->save();
    return redirect('/');
});

Route::get('/items', function () {
    $categories = Categories::orderBy('name', 'asc')->get();
    return view('items', [
        'categories' => $categories
    ]);
});
