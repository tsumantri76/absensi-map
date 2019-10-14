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
        DB::table('roles')->insert([
        	[
        		'nama_role' => 'administrator',
        		'keterangan' => 'Administrator',
        	],
        	[
        		'nama_role' => 'aegawai',
        		'keterangan' => 'Pegawai',
        	],
        	[
        		'nama_role' => 'supervisor',
        		'keterangan' => 'Supervisor',
        	]
        ]);
    }
}
