<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = new Role();
        $roles->name = 'Giám đốc';
        $roles->save();

        
        $roles = new Role();
        $roles->name = 'Nhân viên';
        $roles->save();


    }
}
