<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('teams')->delete();

        \DB::table('teams')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'ahmed',
               
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'malek',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'mohamed',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'abdallah',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'nancy',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'jack',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'taha',
            ),

            7 =>
            array (
                'id' => 8,
                'name' => 'joe',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'amera',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'loka',
            ),
        ));


    }
}
