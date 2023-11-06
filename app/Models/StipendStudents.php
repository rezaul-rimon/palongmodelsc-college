<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StipendStudents extends Model
{
    use HasFactory;

    protected $table = 'stipend_students';
    protected $fillable = [
        'class_name',
        'class_section',
        'gov_stipend_male',
        'gov_stipend_female',
        'sub_stipend_male',
        'sub_stipend_female',
        'added_by',
        'status',
    ];
}
