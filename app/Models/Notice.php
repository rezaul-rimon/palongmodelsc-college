<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $table = 'notices';
    protected $fillable = [
        'notice_type',
        'notice_summary',
        'notice_file',
        'added_by',
    ];
}
