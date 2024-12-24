<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fullName',
        'shortName',
        'gender',
        'birthPlace',
        'birthDate',
        'phone',
        'address',
        'lastEdu',
        'classType'
    ];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'teachers_id', 'id');
    }

    // use HasFactory;
}
