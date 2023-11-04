<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'class_name',
        'class_section',
        'male_students',
        'female_students',
        'hindu_students',
        'buddhist_students',
        'added_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
