<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::join('centers', 'users.center_id', '=', 'centers.id')
            ->select(
                'centers.name as center_name',
                'users.name as user_name',
                'users.email as user_email',
                'users.password as user_password',
            )
            ->get();
    }
}
