<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'event_name',
        'event_description',
        'event_date',
        'event_photo',
        'added_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
