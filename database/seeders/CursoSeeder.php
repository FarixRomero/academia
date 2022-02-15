<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cursos')->insert(
            [
                'name' => '2021-'.Str::random(5),
                'code' => '2021-'.Str::random(5),
                'nivel' => 1,
                'is_active'=>true,
            ]
        );
        DB::table('curso_users')->insert(
            [
                'curso_id' => 1,
                'user_id' => 1,
                'fecha_inicio' => "2012-12-23",
                'is_active'=>true,
            ]
        );
    }
}
