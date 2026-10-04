<?php

namespace App\Http\Controllers;
use App\Models\student;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request) // -> buat functiom baru dengan nama index
    {
        $title = 'sistem sekolah - daftar siswa';
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
        ->when($search, function($query, $search){
            $query->where(function($query) use($search){
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('nis', 'like', "%{$search}%");   
            });
        })
        ->when($class, fn($query, $class) => $query->where('class', '=', $class))
        ->when($major, fn($query, $major) => $query->where('major', '=', $major))
        ->simplePaginate(10)
        ->withQueryString();

        $classes = ['10 AKL', '11 AKL', '11 TKJ 1', '11 TKJ 2', '10 BiD', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3'];
        $majors = ['AKL', 'BiD', 'TKJ'];

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'classes' => $classes,
            'majors' => $majors
        ]);
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

    public function store(storeRequest $request){

    //validate data (u know la)
    $validatedRequest = $request->validated();

    // add to database
    student::create($validatedRequest);

    //handle
    return redirect()->route('students.index');
    }

    public function update(student $student, UpdateRequest $request){
    //validate data (u know la)

    $validatedRequest = $request->validated();

    // $validatedRequest = $request->validate([
    //         'nis' => ['required', 'string', 'size:4', 'unique:students,nis,' . $student->id],
    //         'name' => ['required', 'string'],
    //         'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
    //         'major' => ['required', 'string', 'in:AKL,TKJ,BiD'],
    //         'class' => ['required', 'string']
    //     ]
    // );
    
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
