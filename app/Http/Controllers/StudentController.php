<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() // -> buat functiom baru dengan nama index
    {
        $title = 'sistem sekolah - daftar siswa';
        $students = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'b',
                'class' => 'somewhere?',
                'major' => 'disign'      
            ],

            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'a',
                'class' => 'wheresome',
                'major' => 'ciber'  
            ],
            ];
        // return "ini adalah halaman daftar siswa"; // -> yang memakai class function index bakalan ngereturn ini di webnya
        return view('students.index', [
            'title' => $title, 'students' => $students
        ]);

    }

    public function show(string $id) // -> sama seperti yang diatas, cuma tambahin attribute string $idnya
    {
        // return "menampilkan detail siswa dengan id : {$id}";
        $title = 'sistem sekolah - data siswa';
        return view('students.show', [
            'title' => $title
        ]);

    }

    public function edit(string $id){
        // return "ini adalah halaman mengedit data siswa dari id : {$id}";
        $title = 'sistem sekolah - edit siswa';
        return view('students.edit', [
            'title' => $title
        ]);
    }

    public function create(){
        // return "ini adalah halaman menambahkan siswa";
        $title = 'sistem sekolah - tambah siswa';
        return view('students.create', [
            'title' => $title
        ]);
    }

    public function store(){
        return "menambahkan data siswa baru";
    }

    public function update(string $id){
        return "siswa dengan id : {$id} sudah diupdate";
    }

    public function destroy(string $id){
        return "menghapus siswa dengan id : {$id}";
    }
}
