<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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


        $groups     = ['Branch'];
        $actions    = ['viewAny','view','create','update','delete','restore','forceDelete'];
        foreach( $groups as $group ){
            foreach( $actions as $action ){
                DB::table('roles')->insert([
                    'group_name' => $group,
                    'name' => $group.'_'.$action,
                ]);
            }
        }


        
    }
}
