<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    private function getMajorsData()
    {
        return [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            [
                'id' => 3,
                'code' => 'BD',
                'name' => 'Bisnis Digital',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];
    }

    public function index()
    {
        $title = 'sistem sekolah - daftar jurusan';
        $majors = $this->getMajorsData();

        return view('Majors.index', [
            'title' => $title,
            'majors' => $majors
        ]);
    }

    public function show(string $id)
    {
        $title = 'sistem sekolah - data jurusan';
        $majors = $this->getMajorsData();

        $major = collect($majors)->firstWhere('id', (int) $id);

        if (!$major) {
            abort(404, 'Data jurusan tidak ditemukan');
        }

        return view('Majors.show', [
            'title' => $title,
            'major' => $major
        ]);
    }

    public function create()
    {
        $title = 'sistem sekolah - tambah jurusan';

        return view('Majors.create', [
            'title' => $title
        ]);
    }

    public function edit(string $id)
    {
        $title = 'sistem sekolah - edit jurusan';
        $majors = $this->getMajorsData();

        $major = collect($majors)->firstWhere('id', (int) $id);

        if (!$major) {
            abort(404, 'Data jurusan tidak ditemukan');
        }

        return view('Majors.edit', [
            'title' => $title,
            'major' => $major
        ]);
    }

    public function store(Request $request)
    {
        return "menyimpan Jurusan";
    }

    public function update(Request $request, string $id)
    {
        return "mengubah data Jurusan dengan id: {$id}";
    }

    public function destroy(string $id)
    {
        return "menghapus data Jurusan dari id: {$id}";
    }
}