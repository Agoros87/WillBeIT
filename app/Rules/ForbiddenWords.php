<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class ForbiddenWords implements Rule
{
    protected array $forbidden = [
        'tonto', 'idiota', 'feo',
        'imbécil', 'estúpido', 'asqueroso',
        'maldito', 'perra', 'puta', 'mierda',
        'gilipollas', 'bastardo', 'zorra',
        'pendejo', 'cabron', 'cabrón'
        // Agrega más según necesites
    ];

    public function passes($attribute, $value): bool
    {
        foreach ($this->forbidden as $word) {
            if (stripos($value, $word) !== false) {
                return false;
            }
        }
        return true;
    }

    public function message(): string
    {
        return 'Tu comentario contiene lenguaje inapropiado.';
    }
}
