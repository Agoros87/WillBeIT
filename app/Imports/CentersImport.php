<?php

namespace App\Imports;

use App\Models\Center;
use Maatwebsite\Excel\Concerns\ToModel;

class CentersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Center(attributes: [
            'name' => $row[1],
            'address' => $row[2],
            'city' => $row[3],
            'province' => $row[4],
            'postal_code' => $row[5],
            'email' => $row[6],
            'director_email' => $row[7],
            'director_name' => $row[8],
            'erasmus_coordinator' => $row[9],
            'phone' => $row[10],
            'badge' => $row[11],
            'status' => $row[12],
        ]);
    }
}
