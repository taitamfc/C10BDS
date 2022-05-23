<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Customer::select("id", "name", "address","phone")->get();
    }

    public function headings(): array
    {
        return ["id", "name", "address","phone"];
    }
}
