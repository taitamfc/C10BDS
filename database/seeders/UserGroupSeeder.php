<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 1';
        $userGroup->description = '5 thành viên';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 2';
        $userGroup->description = '7 thành viên';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 3';
        $userGroup->description = '15 thành viên';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 4';
        $userGroup->description = '13 thành viên';
        $userGroup->save();
    }
}
