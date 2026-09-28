<?php

namespace App\Http\Controllers;
use App\Models\student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() // -> buat functiom baru dengan nama index
    {
        $title = 'sistem sekolah - daftar siswa';
        $students = student::all();
        // return "ini adalah halaman daftar siswa"; // -> yang memakai class function index bakalan ngereturn ini di webnya
        return view('students.index', [
            'title' => $title, 
            'students' => $students
        ]);

    }

    public function show(student $student) // -> sama seperti yang diatas, cuma tambahin attribute string $idnya
    {
        // return "menampilkan detail siswa dengan id : {$id}";
        $title = 'sistem sekolah - data siswa';

        return view('students.show', [
            'title' => $title,
            'student' => $student
        ]);

    }

    public function edit(student $student){
        // return "ini adalah halaman mengedit data siswa dari id : {$id}";
        $title = 'sistem sekolah - edit siswa';
        return view('students.edit', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function create(){
        // return "ini adalah halaman menambahkan siswa";
        $title = 'sistem sekolah - tambah siswa';
        return view('students.create', [
            'title' => $title
        ]);
    }

    public function store(Request $request){

    //validate data (u know la)
    $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major' => ['required', 'string', 'in:AKL,TKJ,BiD'],
            'class' => ['required', 'string']
        ]);

    // add to database
    student::create($validatedRequest);

    //handle
    return redirect()->route('students.index');
    }

    public function update(student $student, request $request){
    //validate data (u know la)
    $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis,' . $student->id],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major' => ['required', 'string', 'in:AKL,TKJ,BiD'],
            'class' => ['required', 'string']
        ]
    );
    
    //update data
    $student->update($validatedRequest);

    //handle data
    return redirect()->route('students.index');
    }

    public function destroy(student $student){
        $student->delete();

        return redirect()->route('students.index');
    }
}
