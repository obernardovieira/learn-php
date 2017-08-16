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
use App\Items;
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

Route::post('/items', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'value' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $item = new Items;
    $item->category = Categories::select('id')->where('name', $request->category)->get()[0]['id'];
    $item->name = $request->name;
    $item->value = $request->value;
    $item->save();
    return redirect('/');
});
