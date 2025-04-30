<?php

namespace App\Exports;

use App\Models\Center;
use Maatwebsite\Excel\Concerns\FromCollection;

class CentersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Center::select(
            'name',
            'address',
            'city',
            'province',
            'postal_code',
            'email',
            'director_email',
            'director_name',
            'erasmus_coordinator',
            'phone',
            'badge',
            'status',
        )->get();

    }
    public function headings(): array
    {
        return ['Name', 'Address', 'City', 'Province', 'Postal Code', 'Email', 'Director Email', 'Director Name', 'Erasmus Coordinator', 'Phone', 'Badge', 'Status'];
    }
}
