<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'doctor';
    protected $primaryKey = 'id_doctor';
    protected $fillable = [
        'id_especialidad',
        'nombre_doc',
        'apellido_doc',
        'created_at',
        'updated_at',
    ];
    public function especialidad(): BelongsTo
    {
        return $this->belongsTo(Especialidad::class,'id_especialidad')->first();
    }
}
