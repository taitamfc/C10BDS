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
        $user = new User();
        $user->name = 'Mai Chiếm An';
        $user->email = 'an@gmail.com';
        $user->password = '123456';
        $user->day_of_birth = '2003/06/27';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '2';
        $user->branch_id  = '2';
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '335';
        $user->ward_id  = '6083';
        $user->gender = 'Nam';
        $user->save();
        
        $user = new User();
        $user->name = 'Đặng Thùy Ngân';
        $user->email = 'ngan@gmail.com';
        $user->password = '123456';
        $user->day_of_birth = '2002/05/22';
        $user->phone = '0977983360';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '2';
        $user->branch_id  = '2';
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '343';
        $user->ward_id  = '6199';
        $user->gender = 'Nữ';
        $user->save();

        $user = new User();
        $user->name = 'Võ Văn Tuấn';
        $user->email = 'tuan@gmail.com';
        $user->password = '123456';
        $user->day_of_birth = '2002/04/24';
        $user->phone = '0777333274';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '3';
        $user->branch_id  = '3';
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '342';
        $user->ward_id  = '6183';
        $user->gender = 'Nam';
        $user->save();

        $user = new User();
        $user->name = 'Lê Biên Thùy';
        $user->email = 'thuy@gmail.com';
        $user->password = '123456';
        $user->day_of_birth = '1995/11/15';
        $user->phone = '01648511610';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '4';
        $user->branch_id  = '4';
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '343';
        $user->ward_id  = '6192';
        $user->gender = 'Nam';
        $user->save();

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
