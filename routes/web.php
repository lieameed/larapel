<?php

use App\Http\Controllers\Classes\IndexController;
use App\Http\Controllers\Classes\ShowController;
use App\Http\Controllers\Classes\CreateController;
use App\Http\Controllers\Classes\EditController;
use App\Http\Controllers\Classes\StoreController;
use App\Http\Controllers\Classes\UpdateController;
use App\Http\Controllers\Classes\DestroyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// management data siswa
Route::name('students.')->prefix('students')->group(function(){ // -> ada beberpa bagian yang penting disini, guna prefix agar nama web gaperlu diketik ulang misal "/students/..." jadi "/...", dan fucntion name yang membuat kita tidak perlu tambahkan students. di function name masing masing, serta group buat ngegroup/ngegabungkan keseluruhannya
    // halaman daftar siswa

// Route::get('/', function() { // -> ciptakan new page untuk web dengan menambahkan /students disampingnya
//     return "ini adalaha halaman daftar siswa"; // -> return value ke halaman
// })->name('index'); // -> berikan nama ke halaman data siswa

Route::get('/', [StudentController::class, 'index'])->name('index'); // -> berikan nama ke halaman data siswa

// halaman tambah siswa

// Route::get('/create', function(){ // -> nambah page tambah siswa
//     return "ini adalah halaman tambah siswa"; // -> return value ke web
// })->name('create');

Route::get('/create', [StudentController::class, 'create'])->name('create');
// halaman detail siswa

// Route::get('/{id}', function(string $id){ // -> nambahkan halaman lagi kusus setelah /students dengan /{id} dengan mendeclare $id sebagai string supaya bisa direturn
//     return "menampilkan detail siswa dengan ID: {$id}"; // -> return value
// })->name('show'); // -> beri nama

Route::get('/{id}',[StudentController::class, 'show'])->name('show'); // -> beri nama



// halaman edit

// Route::get('/{id}/edit', function(string $id){ // -> nambah page edit siswa
//     return "ini adalah halaman edit siswa dengan ID : {$id}"; // -> return value ke web
// })->name('edit');

Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');

// logika tambah siswa

// Route::post('', function(){ // -> buat logika nambah siswa, buat nambah pasti pakai POST
//     return "menanbah data siswa baru"; // -> return value
// })->name('store');

Route::post('', [StudentController::class, 'store'])->name('store');

//logika edit

// Route::put('/{id}', function(string $id){ // buat pakai logika yang sma diatas
//     return "mengedit siswa dari id : {$id}";
// })->name('update');

Route::put('/{id}', [StudentController::class, 'update'])->name('update');

// logika hapus siswa

// Route::delete('/{id}', function(string $id){ // buat pakai logika yang sama diatas, yg edit
//     return "menghapus data siswa dengan id : {$id}";
// })->name('destroy');

Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
});

// management data siswa
Route::name('teachers.')->prefix('teachers')->group(function(){ // -> ada beberpa bagian yang penting disini, guna prefix agar nama web gaperlu diketik ulang misal "/students/..." jadi "/...", dan fucntion name yang membuat kita tidak perlu tambahkan students. di function name masing masing, serta group buat ngegroup/ngegabungkan keseluruhannya
    // halaman daftar siswa

// Route::get('/', function() { // -> ciptakan new page untuk web dengan menambahkan /students disampingnya
//     return "ini adalaha halaman daftar siswa"; // -> return value ke halaman
// })->name('index'); // -> berikan nama ke halaman data siswa

Route::get('/', [TeacherController::class, 'index'])->name('index'); // -> berikan nama ke halaman data siswa

// halaman tambah siswa

// Route::get('/create', function(){ // -> nambah page tambah siswa
//     return "ini adalah halaman tambah siswa"; // -> return value ke web
// })->name('create');

Route::get('/create', [TeacherController::class, 'create'])->name('create');
// halaman detail siswa

// Route::get('/{id}', function(string $id){ // -> nambahkan halaman lagi kusus setelah /students dengan /{id} dengan mendeclare $id sebagai string supaya bisa direturn
//     return "menampilkan detail siswa dengan ID: {$id}"; // -> return value
// })->name('show'); // -> beri nama

Route::get('/{id}',[TeacherController::class, 'show'])->name('show'); // -> beri nama



// halaman edit

// Route::get('/{id}/edit', function(string $id){ // -> nambah page edit siswa
//     return "ini adalah halaman edit siswa dengan ID : {$id}"; // -> return value ke web
// })->name('edit');

Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

// logika tambah siswa

// Route::post('', function(){ // -> buat logika nambah siswa, buat nambah pasti pakai POST
//     return "menanbah data siswa baru"; // -> return value
// })->name('store');

Route::post('', [TeacherController::class, 'store'])->name('store');

//logika edit

// Route::put('/{id}', function(string $id){ // buat pakai logika yang sma diatas
//     return "mengedit siswa dari id : {$id}";
// })->name('update');

Route::put('/{id}', [TeacherController::class, 'update'])->name('update');

// logika hapus siswa

// Route::delete('/{id}', function(string $id){ // buat pakai logika yang sama diatas, yg edit
//     return "menghapus data siswa dengan id : {$id}";
// })->name('destroy');

Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

// // manajemen data guru (invokable)
Route::name('Classes.')->prefix('Classes')->group(function(){ 
// halaman daftar guru
Route::get('/', IndexController::class)->name('index');

// halaman tambah guru
Route::get('/create', CreateController::class)->name('create');

// halaman detail guru
Route::get('/{id}',ShowController::class)->name('show');

// halaman guru
Route::get('/{id}/edit', EditController::class)->name('edit');

// logika tambah guru
Route::post('', StoreController::class)->name('store');

//logika edit
Route::put('/{id}', UpdateController::class)->name('update');

// logika hapus guru
Route::delete('/{id}', DestroyController::class)->name('destroy');
});

Route::resource('majors', MajorController::class);