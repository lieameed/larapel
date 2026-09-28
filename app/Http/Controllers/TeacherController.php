<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private function getTeachersData()
    {
        return [
            [
                'Teacher_id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-laki',
                'subject' => 'Akuntansi Dasar',
                'phone_number' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'Teacher_id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone_number' => '081234560002',
                'status' => 'Aktif',
            ]
        ];
    }

    public function index()
    {
        $title = 'sistem sekolah - daftar guru';
        $teachers = $this->getTeachersData();

        return view('Teacher.index', [
            'title' => $title,
            'teachers' => $teachers
        ]);
    }

    public function show(string $id)
    {
        $title = 'sistem sekolah - data guru';
        $teachers = $this->getTeachersData();

        $teacher = collect($teachers)->firstWhere('id', (int) $id);

        if (!$teacher) {
            abort(404, 'Data guru tidak ditemukan');
        }

        return view('Teacher.show', [
            'title' => $title,
            'teacher' => $teacher
        ]);
    }

    public function edit(string $id)
    {
        $title = 'sistem sekolah - edit guru';
        $teachers = $this->getTeachersData();

        $teacher = collect($teachers)->firstWhere('id', (int) $id);

        if (!$teacher) {
            abort(404, 'Data guru tidak ditemukan');
        }

        return view('Teacher.edit', [
            'title' => $title,
            'teacher' => $teacher
        ]);
    }

    public function create()
    {
        $title = 'sistem sekolah - tambah guru';

        return view('Teacher.create', [
            'title' => $title
        ]);
    }

    public function store()
    {
        return "menambahkan data guru baru";
    }

    public function update(string $id)
    {
        return "guru dengan id : {$id} sudah diupdate";
    }

    public function destroy(string $id)
    {
       return "menghapus guru dengan id : {$id}";
    }
}