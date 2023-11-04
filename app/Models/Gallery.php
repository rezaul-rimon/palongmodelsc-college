<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';
    protected $fillable = ['gallery_title', 'image_paths', 'added_by', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
