<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PastientsController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\ApiUserController;
// use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
//user
Route::get('/users',[UserController::class,'loadAllUsers']);
//menampilkan halaman tambah user
Route::get('/add/user',[UserController::class,'loadAddUserForm']);
//untuk nambah user
Route::post('/add/user',[UserController::class,'AddUser'])->name('AddUser');
Route::get('/edit/{id}',[UserController::class,'loadEditForm']);
Route::get('/delete/{id}',[UserController::class,'deleteUser']);
//untuk edit user
Route::post('/edit/user',[UserController::class,'EditUser'])->name('EditUser');

//patients
Route::get('/patients', [PastientsController::class,'loadAllPatients']);
Route::get('/add/patients', [PastientsController::class,'loadAddPatientsForm']);

//todo list
Route::get('/todo',[TodoListController::class,'loadAllTodolist']);
Route::get('/add/todo',[TodoListController::class,'loadAddTodoForm']);
//untuk nambah todo
Route::post('/add/todo',[TodoListController::class,'AddTodo'])->name('AddTodo');
Route::get('/edit/{id}',[TodoListController::class,'loadEditForm']);
Route::get('/delete/{id}',[TodoListController::class,'deleteTodo']);
//untuk edit todo
Route::post('/edit/todo',[TodoListController::class,'EditTodo'])->name('EditTodo');

//api
Route::get('/user', [ApiUserController::class, 'loadAllUsers']);
// Route::post('/user', [ApiUserController::class, 'addUser'])->withoutMiddleware(VerifyCsrfToken::class);
Route::post('/user', [ApiUserController::class, 'addUser']);
Route::put('/users/{id}', [ApiUserController::class, 'editUser']);
Route::delete('/users/{id}', [ApiUserController::class, 'deleteUser']);



