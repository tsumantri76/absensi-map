<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
        	[
        		'nama_role' => 'Administrator',
        		'keterangan' => 'Administrator',
        	],
        	[
        		'nama_role' => 'Pegawai',
        		'keterangan' => 'Pegawai',
        	],
        	[
        		'nama_role' => 'Atasan',
        		'keterangan' => 'Atasan',
        	]
        );
    }
}
