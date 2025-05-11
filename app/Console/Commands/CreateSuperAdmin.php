<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Center;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class CreateSuperAdmin extends Command
{
    protected $signature = 'superadmin:create';

    protected $description = 'Crea un nuevo usuario Super administrador';

    public function handle()
    {
        $name = $this->ask('Nombre del administrador');
        $email = $this->ask('Email del administrador');
        $password = $this->secret('Contraseña');
        $confirmPassword = $this->secret('Confirmar contraseña');

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $confirmPassword,
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $this->error('Errores de validación:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        try {
            $center = Center::firstOrCreate(
                ['name' => 'Superadmin']
            );


            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
                'center_id' => $center->id,
            ]);


            $superAdminRole = Role::firstOrCreate(['name' => 'superadmin']);
            $user->assignRole($superAdminRole);

            $this->info("Usuario Super administrador creado exitosamente (ID: {$user->id})");

            return 0;
        } catch (\Exception $e) {
            $this->error('Error al crear el usuario: ' . $e->getMessage());
            return 1;
        }
    }
}
