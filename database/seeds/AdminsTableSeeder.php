<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Admin::create([
            'name' => '第九网络组超级管理员',
            'email' => '9thnet@9thnet.com',
            'password' => bcrypt('the9network'),
        ]);
        $admin->permissions()->create([
            'name' => 'superAdmin',
            'description' => '超级管理员',
        ]);
        $admin->permissions()->create([
            'name' => 'postEditor',
            'description' => '文章管理员',
        ]);
        $admin->permissions()->create([
            'name' => 'userManager',
            'description' => '成员管理员',
        ]);
    }
}
