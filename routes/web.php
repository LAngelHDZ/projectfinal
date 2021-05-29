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

//Rutas CRUD de alumnos
Route::get('/admin/panel/alumnos',[AdminController::class,'alumno'])->name('alumno');
Route::get('/admin/panel/registrar_alumno',[AdminController::class,'registraralumno'])->name('registrarAlumno');
Route::post('/admin/panel/registroalumno',[AdminController::class,'registroA'])->name('registraformA');
Route::get('/admin/panel/update_alumno/{id}/',[AdminController::class,'updatealumno'])->name('updateAlumno');
Route::patch('/admin/panel/update_alumno/',[AdminController::class,'updateA'])->name('updateformA');
Route::delete('/admin/panel/alumnos',[AdminController::class,'destroyA'])->name('alumnodel');
//Rutas CRUD de docente
Route::get('/admin/panel/registrar_docente',[AdminController::class,'registrardocente'])->name('registrarDocente');
Route::get('/admin/panel/docentes',[AdminController::class,'docente'])->name('docente');
Route::post('/admin/panel/registrodocente',[AdminController::class,'registroD'])->name('registraformD');
Route::get('/admin/panel/update_docente/{id}/',[AdminController::class,'updatedocente'])->name('updateDocente');
Route::patch('/admin/panel/update_docente/',[AdminController::class,'updateD'])->name('updateformD');
Route::delete('/admin/panel/docente',[AdminController::class,'destroyD'])->name('docentedel');

Route::get('/admin/panel/administrator/',[AdminController::class,'admin'])->name('admins');
Route::get('/register',[HomeController::class,'registre'])->name('registre');

Auth::routes();


