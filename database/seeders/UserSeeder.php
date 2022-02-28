<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                                       
                                       'name'   =>'esraa',
                                       'email'    => 'info@domain.com',
                                       'password' => bcrypt('12345678'),
                                       'type'     => 'admin',
                                      
                                   ]);
    }
}
