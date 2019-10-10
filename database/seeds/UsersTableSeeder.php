<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	[
	            'name' => 'Tatang S',
	            'username' => 'ts76',
	            'email' => 'tsumantri76@gmail.com',
	            'password' => bcrypt('ayamgoreng'),
	            'api_token' => bcrypt('tsumantri76@gmail.com'),
	            'role_id' => 1,
	            'pegawai_id' => 1,
        	],
        	[
	            'name' => 'Odi Akhyan Shodiq',
	            'username' => 'akhyan',
	            'email' => 'odi.akhyan@outlook.com',
	            'password' => bcrypt('ayamgoreng'),
	            'api_token' => bcrypt('odi.akhyan@outlook.com'),
	            'role_id' => 2,
	            'pegawai_id' => 2,
        	]
        );
    }
}
