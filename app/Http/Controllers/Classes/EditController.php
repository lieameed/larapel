<?php

namespace App\Http\Controllers\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(string $id)
    {
        $title = 'sistem sekolah - edit kelas';

        $classes = [
            [
                'id' => 1,
                'name' => 'XII AKL 1',
                'grade' => 'XII',
                'major_id' => 1,
                'teacher_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'XII TKJ 1',
                'grade' => 'XII',
                'major_id' => 2,
                'teacher_id' => 2
            ]
        ];

        $majors = [
            ['id' => 1, 'name' => 'Akuntansi dan Keuangan Lembaga (AKL)'],
            ['id' => 2, 'name' => 'Teknik Komputer dan Jaringan (TKJ)']
        ];

        $teachers = [
            ['id' => 1, 'name' => 'Budi Santoso'],
            ['id' => 2, 'name' => 'Siti Aminah']
        ];

        $class = collect($classes)->firstWhere('id', (int) $id);

        if (!$class) {
            abort(404, 'Data kelas tidak ditemukan');
        }

        return view('Classes.edit', [
            'title' => $title,
            'class' => $class,
            'majors' => $majors,
            'teachers' => $teachers
        ]);
    }
}