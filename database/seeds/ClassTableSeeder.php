<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('classes')->count() == 0) {
            DB::table('classes')->insert([
                [
                    'id' => 1,
                    'name' => 'PT11111',
                    'teacher_name' => 'NV A',
                    'major' => 'CNTT',
                    'max_student' => 50,
                ],
                [
                    'id' => 2,
                    'name' => 'PT11111',
                    'teacher_name' => 'NV C',
                    'major' => 'CNTT',
                    'max_student' => 40,
                ],
                [
                    'id' => 3,
                    'name' => 'PT11111',
                    'teacher_name' => 'NV B',
                    'major' => 'CNTT',
                    'max_student' => 30,
                ],
                [
                    'id' => 4,
                    'name' => 'PT11111',
                    'teacher_name' => 'NV D',
                    'major' => 'CNTT',
                    'max_student' => 50,
                ],
                [
                    'id' => 5,
                    'name' => 'PT11111',
                    'teacher_name' => 'NV E',
                    'major' => 'CNTT',
                    'max_student' => 10,
                ],
            ]);
        }
    }
}
