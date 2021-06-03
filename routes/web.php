 <?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnoController;
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

//rutas main admin
Route::get('/admin/panel',[HomeController::class,'admin'])->name('admin');
Route::get('/admin',[AdminController::class,'main'])->name('main');
//rutas main alumno
Route::get('/alumno/panel',[HomeController::class,'alumno'])->name('alumn');

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
//Rutas CRUD materia
Route::get('/admin/panel/materias',[AdminController::class,'materia'])->name('materia');
Route::get('/admin/panel/registrar_materia',[AdminController::class,'registrarmateria'])->name('registrarMateria');
Route::post('/admin/panel/registromateria',[AdminController::class,'registroM'])->name('registraformM');
Route::get('/admin/panel/update_materia/{id}/',[AdminController::class,'updatemateria'])->name('updateMateria');
Route::patch('/admin/panel/update_materia/{id}/',[AdminController::class,'updateM'])->name('updateformM');
Route::delete('/admin/panel/materias',[AdminController::class,'destroyM'])->name('materiadel');
//Rutas CRUD cursos
Route::get('/admin/panel/cursos',[AdminController::class,'curso'])->name('curso');
Route::get('/admin/panel/registrar_curso',[AdminController::class,'registrarcurso'])->name('registrarCurso');
Route::post('/admin/panel/registrocurso',[AdminController::class,'registroC'])->name('registraformC');
Route::get('/admin/panel/update_curso/{id}/',[AdminController::class,'updatecurso'])->name('updateCurso');
Route::patch('/admin/panel/update_curso/{id}/',[AdminController::class,'updateC'])->name('updateformC');
Route::delete('/admin/panel/cursos',[AdminController::class,'destroyC'])->name('cursodel');
//rutas crud horario
Route::get('/admin/panel/horarios/{id}/',[AdminController::class,'horario'])->name('horario');
Route::get('/admin/panel/horarios/{id}/reg',[AdminController::class,'registrarhorario'])->name('registrarHorario');
Route::post('/admin/panel/registrohorario',[AdminController::class,'registroH'])->name('registrarformH');
Route::get('/admin/panel/update_horario/{id}/',[AdminController::class,'updatehorario'])->name('updateHorario');
Route::patch('/admin/panel/update_horario/{id}/',[AdminController::class,'updateH'])->name('updateformH');
Route::delete('/admin/panel/horarios',[AdminController::class,'destroyH'])->name('horariodel');

//rutas de vista alumnos
Route::get('/alumno/panel/cursos',[AlumnoController::class,'cursoA'])->name('cursoA');
Route::post('/alumno/panel/cursosadd',[AlumnoController::class,'cursoAdd'])->name('cursoAdd');

Route::get('/admin/panel/administrator/',[AdminController::class,'admin'])->name('admins');
Route::get('/register',[HomeController::class,'registre'])->name('registre');

Auth::routes();


