<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= new User ;
        $admin->name = "admin";
        $admin->email = "Admin@admin.com";
        $admin->password=bcrypt('Admin1234');
        $admin->save();
        $admin->attachRole('admin');
    }
}
