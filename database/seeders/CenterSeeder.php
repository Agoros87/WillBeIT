<?php

namespace Database\Seeders;

use App\Models\Center;
use Illuminate\Database\Seeder;

class CenterSeeder extends Seeder
{
    public function run(): void
    {
        Center::factory(1)->create([
            'name' => 'IES Ingeniero de la Cierva',
            'province' => 'Murcia',
            'address' => 'C. de la Iglesia, 30012 San Benito - Patiño, Murcia',
            'phone' => '968 26 69 22',
            'center_url' => 'https://www.iescierva.net/',
            'logo' => 'img/ies-cierva-logo.jpg',
            'image' => 'img/ies-cierva-image.jpg',
            'email' => '30010978@murciaeduca.es'
        ]);

        Center::factory(4)->create();
    }
}
