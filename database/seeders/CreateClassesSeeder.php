<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;

class CreateClasses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classes::insert([
            [
                'name' => "I"
            ],
            [
                'name' => "II"
            ],
            [
                'name' => "III"
            ],
            [
                'name' => "IV"
            ],
            [
                'name' => "V"
            ],
            [
                'name' => "VI"
            ],
            [
                'name' => "VII"
            ],
            [
                'name' => "VIII"
            ],
            [
                'name' => "IX"
            ],
            [
                'name' => "X"
            ]
        ]);
    }
}
