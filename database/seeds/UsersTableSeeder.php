<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'level' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        // $user = User::create([
        //     'karyawan_id' => 198802012010051002,
        //     'name' => 'Ramadhanur',
        //     'level' => 'guru',
        //     'email' => 'ramdhan@gmail.com',
        //     'password' => bcrypt('guru')
        // ]);
    }
}
