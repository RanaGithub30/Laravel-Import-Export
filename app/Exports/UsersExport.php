<?php

namespace App\Exports;

use App\Models\UserDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserDetails::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'phone',
            'email',
            'street_address',
            'city',
            'state',
            'country',
            'profile_img',
            'created_at',
            'updated_at'
        ];
    }
}
