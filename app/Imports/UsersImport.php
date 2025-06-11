<?php

namespace App\Imports;

use App\Http\Requests\ImportUserRequest;
use App\Models\Center;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Validator;

class UsersImport implements ToModel
{
    public function model(array $row)
    {
        if (empty(array_filter($row))) {
            return null;
        }

        $data = [
            'center_name' => $row[0],
            'name'        => $row[1],
            'email'       => $row[2],
            'type'        => $row[3] ?? null,
            'password'    => $row[4],
            'status'      => 'approved',
            'email_verified_at' => now(),
        ];


        $validator = Validator::make($data, (new ImportUserRequest())->rules(), (new ImportUserRequest())->messages());

        if ($validator->fails()) {
            return null;
        }

        $center = Center::where('name', $data['center_name'])->first();

        return new User([
            'center_id' => $center?->id,
            'name'      => $data['name'],
            'email'     => $data['email'],
            'type'      => $data['type'],
            'password'  => Hash::make($data['password']),
        ]);
    }
}
