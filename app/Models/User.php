<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Hash;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'no_telp',
        'role',
        'alamat',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function createIfEmpty()
    {
        $user = self::first();
        if (!$user) {
            return self::create([
                'username' => '123',
                'password' => Hash::make('123'),
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'no_telp' => '1234567890',
                'role' => 'admin',
                'alamat' => 'Majalengka',
            ]);
        }
        return $user;
    }

}
