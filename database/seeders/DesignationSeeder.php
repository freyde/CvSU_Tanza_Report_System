<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
            [
                'name' => 'Curriculum',
                'value' => 'Curriculum'
            ],
            [
                'name' => 'Extension',
                'value' => 'Extenson'
            ],
            [
                'name' => 'Human Resource',
                'value' => 'HR'
            ],
            [
                'name' => 'Office of Student Affairs',
                'value' => 'OSAs'
            ],
            [
                'name' => 'Registrar',
                'value' => 'Registrar'
            ],
            [
                'name' => 'External Business Affairs',
                'value' => 'EBA'
            ],
        ];
        foreach($designations as $designation) {
            DB::table('designation')->insert($designation);
        }
    }
}
