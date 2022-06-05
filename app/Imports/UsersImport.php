<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Jobs\ProcessImportUser;


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
            if($key == 0 ){
                continue ;
            }
            dispatch( new ProcessImportUser($row,$this->request->user_group_id,$this->request->branch_id) );
        }
    }
}
