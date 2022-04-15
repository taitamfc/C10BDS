<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branch = new Branch();
        $branch->name = 'Chi nhánh 1';
        $branch->address = 'Thanh Hóa';
        $branch->phone = '0977983360';
        $branch->save();


        $branch = new Branch();
        $branch->name = 'Chi nhánh 2';
        $branch->address = 'Nghệ An';
        $branch->phone = '01648511610';
        $branch->save();


        $branch = new Branch();
        $branch->name = 'Chi nhánh 3';
        $branch->address = 'Hà Tĩnh';
        $branch->phone = '0979061738';
        $branch->save();


        $branch = new Branch();
        $branch->name = 'Chi nhánh 4';
        $branch->address = 'Quảng Bình';
        $branch->phone = '0854383246';
        $branch->save();
    }
}
