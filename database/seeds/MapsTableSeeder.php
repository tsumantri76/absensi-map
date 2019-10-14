<?php

use Illuminate\Database\Seeder;

class MapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	[
        		'latitude' => '-6.2702753',
        		'longitude' => '107.1420931',
        		'nama_tempat' => 'WCM'
        	],
        ]);
    }
}
