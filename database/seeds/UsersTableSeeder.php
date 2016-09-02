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
        \App\Models\User::create([
            'name' => '第九网络组超级管理员',
            'email' => '9thnet@9thnet.com',
            'password' => bcrypt('the9network'),
        ]);
    }
}
