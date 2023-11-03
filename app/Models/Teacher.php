<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $fillable = [
        'teacher_name',
        'teacher_designation',
        'teacher_description',
        'taken_subject',
        'teacher_photo',
        'added_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
