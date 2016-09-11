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
            'name' => '第九网络组超级管理员',
            'email' => '9thnet@9thnet.com',
            'password' => bcrypt('the9network'),
        ]);
        $user->permissions()->create([
            'name' => 'superAdmin',
            'description' => '超级管理员',
        ]);
        $user = \App\Models\User::create([
            'name' => '贺钧威',
            'email' => 'hejunwei@9thnet.com',
            'password' => bcrypt('hejunwei'),
        ]);
        $user->permissions()->create([
            'name' => 'postEditor',
            'description' => '文章管理员',
        ]);
    }
}
