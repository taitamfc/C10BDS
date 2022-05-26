<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    protected $request;
    public function __construct($request){
        $this->request = $request;
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row)
        {
            if($key == 0) continue;

            $user = new User();
            $user->name             = $row[1];
            $user->gender           = 'male';
            $user->address          = 'QUảng trị';
            $user->email            = $row[2].'@gmail.com';
            $user->phone            = $row[2];
            $user->password         = Hash::make(123456);
            $user->user_group_id    = $this->request->user_group_id;
            $user->branch_id        = $this->request->branch_id;
            $user->province_id      = 1;
            $user->district_id      = 1;
            $user->ward_id          = 1;
            $user->note             = $row[3];
            $user->save();
        }
    }
}
