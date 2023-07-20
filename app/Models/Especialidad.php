<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Especialidad extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const ENDOCRINOLOGIA = 1;
    const GASTROENTEROLOGIA = 2;
    const MEDICINA_GENERAL = 3;
    const GINECOLOGIA = 4;

    protected $table = 'especialidad';
    protected $primaryKey = 'id';
    protected $fillable = [
        'descripcion',
        'created_at',
        'updated_at',
    ];
}
