<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SiteController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [SiteController::class, 'index'])->name('welcome');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/test', [SiteController::class, 'test'])->name('test');


Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');
Route::get('/department/all', [DepartmentController::class, 'class_name'])->name('class_name');//Function URL หน้า Class
Route::post('/department/add' , [DepartmentController::class,'store'])->name('addDepartment');//ปุ่มบันทึกหน้า Class

Route::get('/register_student', [SiteController::class, 'register_student'])->name('register_student');
Route::get('/search', [SiteController::class, 'search'])->name('search');



//test
// Route::get('/about', function () {
//     return 'Hellow about page';
// })->name('about');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function ()
{
    Route::get('/dashboard', function () {
        $users=DB::table('users')->get();
        return view('dashboard' ,compact('users'));
    })->name('dashboard');
});
