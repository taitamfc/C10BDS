<?php

namespace Database\Seeders;

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
