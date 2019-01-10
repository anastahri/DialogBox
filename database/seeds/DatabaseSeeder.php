<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$format = 'Y-m-d H:i:s';
    	DB::table('users')->insert([
            'name' => 'Tahri Anas',
            'email' => 'tahrianas@yahoo.fr',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'created_at' => date($format),
            'updated_at' => date($format)
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'label' => 'Administrator',
            'created_at' => date($format),
            'updated_at' => date($format)
        ]);

        $user_id = DB::table('users')->where('username', 'admin')->value('id');

        $role_id = DB::table('roles')->where('name', 'admin')->value('id');

        DB::table('role_user')->insert([
            'role_id' => $role_id,
            'user_id' => $user_id
        ]);
    }
}
