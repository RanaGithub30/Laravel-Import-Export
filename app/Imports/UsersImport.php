<?php

namespace App\Imports;

use App\Models\UserDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UserDetails([
                "name" => $row['name'],
                "phone" => $row['phone'],
                "email" => $row['email'],
                "street_address" => $row['street_address'],
                "city" => $row['city'],
                "state" => $row['state'],
                "country" => $row['country'],
                "profile_img" => $row['profile_img'],
        ]);
    }
}
