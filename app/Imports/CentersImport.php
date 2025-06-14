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

        if (empty(array_filter($row))) {
            return null;
        }

        return new Center([
            'name' => $row[0],
            'address' => $row[1],
            'city' => $row[2],
            'province' => $row[3],
            'postal_code' => $row[4],
            'email' => $row[5],
            'director_email' => $row[6],
            'director_name' => $row[7],
            'erasmus_coordinator' => $row[8],
            'phone' => $row[9],
            'status' => $row[10],
        ]);
    }
}
