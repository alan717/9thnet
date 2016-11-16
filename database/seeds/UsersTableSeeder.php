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
        $user = \App\Models\User::create([
            'name'     => '贺钧威',
            'email'    => 'horan@9thnet.com',
            'password' => bcrypt('hejunwei'),
        ]);
    }
}
