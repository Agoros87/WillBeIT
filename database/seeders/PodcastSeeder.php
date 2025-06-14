<?php

namespace Database\Seeders;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Podcast::factory(100)->create();

        // Asegurarsme que funciona la actividad reciente del estudiante
        // Buscar al usuario que se llama 'student'
        $student = User::where('name', 'student')->first();

        // Si existe, crearle 5 podcasts con fecha de hace 2 semanas
        if ($student) {
            Podcast::factory(5)->create([
                'user_id' => $student->id,
                'created_at' => Carbon::now()->subWeeks(2),
                'updated_at' => Carbon::now()->subWeeks(2),
            ]);
        }

    }
}
