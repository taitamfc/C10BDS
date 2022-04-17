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
        $User = new User();
        $User->name = 'Admin';
        $User->day_of_birth = '1990-05-05';
        $User->phone    = '0123456789';
        $User->address  = 'Test';
        $User->email    = 'admin@gmail.com';
        $User->password = bcrypt('123456');
        $User->start_day = '1990-05-05';
        $User->user_group_id    = 1;
        $User->branch_id        = 1;
        $User->note             = '';
        $User->save();
    }
}
