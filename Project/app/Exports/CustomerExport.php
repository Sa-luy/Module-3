<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }
    public function headings(): array {
        return [
            'ID',
            'Name',
            'Email',
            'Nhà Cung cấp',    
            "Id Nhà cung cấp",
            "số điện thoại",
            "địa chỉ",
            "Avatar",
            
        ];
    }
 
    public function map($cusrtomer): array {
        return [
            $cusrtomer->id,
            $cusrtomer->name,
            $cusrtomer->email,
            $cusrtomer->provider_name,
            $cusrtomer->provider_id,
            $cusrtomer->phone,
            $cusrtomer->address,
            $cusrtomer->avatar,
        ];
    }
}
