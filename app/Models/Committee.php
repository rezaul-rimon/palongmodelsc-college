<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Committee extends Model
{
    use HasFactory;

    protected $table = 'committees';
    protected $fillable = [
        'committee_name',
        'committee_designation',
        'committee_photo',
        'added_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
