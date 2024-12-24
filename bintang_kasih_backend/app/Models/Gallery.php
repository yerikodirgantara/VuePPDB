<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'teachers_id',
        'image',
    ];

    protected $hidden = [];

    public function teachers()
    {
        return $this->belongsTo(Teachers::class, 'teachers_id', 'id');
    }

    // use HasFactory;
}
