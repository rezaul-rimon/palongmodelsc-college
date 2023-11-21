<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class QuickLink extends Model
{
    use HasFactory;
    protected $table = 'quick_links';

    protected $fillable = [
        'site_name',
        'site_link',
        'site_logo',
        'added_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
