<?php

namespace App\Imports;

use App\Models\Center;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
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

        // Buscar el centro por nombre
        $center = Center::where('name', $row[0])->first();

        // Crear un nuevo usuario con el ID del centro encontrado
        return new User([
            'center_id' => $center->id,
            'name'      => $row[1],
            'email'     => $row[2],
            'type'      => $row[3] ?? 'null',
            'password'  => $row[4],
        ]);
    }
}
