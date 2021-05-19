 <?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/panel',[HomeController::class,'admin'])->name('admin');
Route::get('/admin/panel/alumnos',[AdminController::class,'alumno'])->name('alumno');
Route::get('/admin/panel/registrar_Alumno',[AdminController::class,'registraralumno'])->name('registrarAlumno');
Route::post('/admin/panel/registroalumno',[AdminController::class,'registroA'])->name('registraform');
Route::get('/admin/panel/administrator',[AdminController::class,'admin'])->name('admins');
