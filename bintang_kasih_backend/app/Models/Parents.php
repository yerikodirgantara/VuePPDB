<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parents extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fatherName', 'fatherNIK', 'fatherAddress', 'fatherReligion', 'fatherLastEdu' ,'fatherJob', 'fatherSallary' ,
        'fatherPhone', 'motherName', 'motherNIK', 'motherAddress', 'motherReligion', 'motherLastEdu' ,'motherJob',
        'motherSallary', 'motherPhone',
    ];

    protected $hidden = [

    ];

    public function students()
    {
        return $this->hasMany(Students::class, 'parents_id', 'id');
    }

    // use HasFactory;
}
