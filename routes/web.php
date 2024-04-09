<?php

use App\Models\tasks;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\users;

Route::get('/', function () {
    return view('welcome', [
            'users' => users::all(),
            'tasks' => tasks::all(),
        ]
    );
});


Route::get('/tasks/{id}', function ($id) {
    return view('tasks', [
            'tasks' => tasks::all()[$id-1],
        ]
    );
});
