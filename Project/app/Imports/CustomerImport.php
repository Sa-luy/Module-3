<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Customer([
            'name'              => $row['3'],
            'email'             => $row['6'],
            'password'            => Hash::make(12345678),
            'provider_name'     => $row['1'],
            'provider_id'       => $row['2'],
            'phone'             => $row['4'],
            'address'           => $row['5'],
            'avatar'            => $row['11'],
        ]);
    }
}
