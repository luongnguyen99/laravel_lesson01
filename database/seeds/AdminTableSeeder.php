<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if (DB::table('admins')->count() == 0) {
            DB::table('admins')->insert([
                [
                    'id' => '1',
                    'name' => '1',
                    'university' => 'FPT',
                    'class_id' => 1,
                    'is_active' => 1
                ],
                [
                    'id' => '2',
                    'name' => '2',
                    'university' => 'FPT1',
                    'class_id' => 2,
                    'is_active' => 1
                ],
                [
                    'id' => '3',
                    'name' => '3',
                    'university' => 'FPT2',
                    'class_id' => 3,
                    'is_active' => 1
                ],
            ]);
        };
    }
}
