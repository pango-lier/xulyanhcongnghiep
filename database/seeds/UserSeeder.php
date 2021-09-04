<?php

use Illuminate\Database\Seeder;
use App\AdminUser;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::updateOrCreate([
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('1'),
            'name'=>'is-admin',
            'roles'=>0,
        ]);
        OpenTab
    }
}
