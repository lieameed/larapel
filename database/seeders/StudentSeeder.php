<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $students = [
        //     ['nis' => '1003', 'name' => 'aji', 'gender' => 'Laki=laki', 'class' => '12 TKJ 2', 'major' => 'AKL'],
        //     ['nis' => '1203', 'name' => 'liemed', 'gender' => 'Laki=laki', 'class' => 'X TKJ 2', 'major' => 'AKL'],
        //     ['nis' => '1002', 'name' => 'liemed', 'gender' => 'Laki=laki', 'class' => 'X TKJ 2', 'major' => 'AKL']
        // ];

        // student::upsert($students, ['nis'], ['name', 'gender', 'class', 'major']);

        student::factory()->count(100)->create();
    }
}
