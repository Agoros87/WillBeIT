<?php

namespace App\Imports;

use App\Http\Requests\ImportUserRequest;
use App\Models\Center;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Log;
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
            'surname'     => $row[2],
            'email'       => $row[3],
            'type'        => $row[4] ?? null,
            'password'    => (string)$row[5]
        ];


        $validator = Validator::make($data, (new ImportUserRequest())->rules(), (new ImportUserRequest())->messages());

        if ($validator->fails()) {
            return null;
        }

        $center = Center::where('name', $data['center_name'])->first();

        $user = new User([
            'center_id' => $center->id,
            'name'      => $data['name'],
            'surname'   => $data['surname'],
            'email'     => $data['email'],
            'type'      => $data['type'],
            'password'  => Hash::make($data['password']),
            'status'    => 'approved',
            'email_verified_at' => now(),
        ]);
        $user->assignRole('student');
        $user->save();
    }
}
