<?php

namespace App\Http\Controllers\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $title = 'sistem sekolah - daftar kelas';
        $classes = [
            [
                'id' => 1,
                'name' => 'XII AKL 1',
                'grade' => 'XII',
                'major_id' => 'AKL',
                'teacher_id' => 'Budi Santoso'
            ],
            [
                'id' => 2,
                'name' => 'XII TKJ 1',
                'grade' => 'XII',
                'major_id' => 'TKJ',
                'teacher_id' => 'Siti Aminah'
            ]
        ];

        return view('classes.index', [
            'title' => $title,
            'classes' => $classes
        ]);
    }
}