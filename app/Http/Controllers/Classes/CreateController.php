<?php

namespace App\Http\Controllers\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $title = 'sistem sekolah - tambah kelas';

        $majors = [
            ['id' => 1, 'name' => 'Akuntansi dan Keuangan Lembaga (AKL)'],
            ['id' => 2, 'name' => 'Teknik Komputer dan Jaringan (TKJ)'],
            ['id' => 3, 'name' => 'Bisnis Digital (BD)']
        ];

        $teachers = [
            ['id' => 1, 'name' => 'Budi Santoso'],
            ['id' => 2, 'name' => 'Siti Aminah']
        ];

        return view('Classes.create', [
            'title' => $title,
            'majors' => $majors,
            'teachers' => $teachers
        ]);
    }
}