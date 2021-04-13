<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    const USER = 'пользователь';
    const DOCTOR = 'врач';
    const ADMIN = 'администратор';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function children() : hasMany
    {
        return $this->hasMany(Child::class);
    }

    public function posts() : hasMany
    {
        return $this->hasMany(Post::class);
    }

    public function doctor() : hasOne
    {
        return $this->hasOne(Doctor::class);
    }

    public function consultations() : hasMany
    {
        return $this->hasMany(Consultation::class);
    }

    public static function allRoles(): array
    {
        return [
            self::USER,
            self::ADMIN,
            self::DOCTOR,
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ADMIN;
    }

    public function isDoctor(): bool
    {
        return $this->role === self::DOCTOR;
    }

}
