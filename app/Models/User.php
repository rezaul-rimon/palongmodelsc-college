<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\{Notice, Teacher, Committee, Event, Gallery, Students};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'permission',
        'role',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function notices(){
        return $this->hasMany(Notice::class, 'added_by', 'id');
    }

    public function teachers(){
        return $this->hasMany(Teacher::class, 'added_by', 'id');
    }

    public function committees(){
        return $this->hasMany(Committee::class, 'added_by', 'id');
    }

    public function events(){
        return $this->hasMany(Event::class, 'added_by', 'id');
    }

    public function gallery(){
        return $this->hasMany(Gallery::class, 'added_by', 'id');
    }

    public function students(){
        return $this->hasMany(Students::class, 'added_by', 'id');
    }

    public function stipend_students(){
        return $this->hasMany(Students::class, 'added_by', 'id');
    }
}
