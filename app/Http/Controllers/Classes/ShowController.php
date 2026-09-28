<?php

namespace App\Http\Controllers\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(string $id)
    {
        $title = 'sistem sekolah - data kelas';
        $classes = [
            [
                'id' => 1,
                'name' => 'XII AKL 1',
                'grade' => 'XII',
                'major' => 'AKL',
                'homeroom_teacher' => 'Budi Santoso'
            ],
            [
                'id' => 2,
                'name' => 'XII TKJ 1',
                'grade' => 'XII',
                'major' => 'TKJ',
                'homeroom_teacher' => 'Siti Aminah'
            ]
        ];

        $class = collect($classes)->firstWhere('id', (int) $id);

        if (!$class) {
            abort(404, 'Data kelas tidak ditemukan');
        }

        return view('Classes.show', [
            'title' => $title,
            'class' => $class
        ]);
    }
}