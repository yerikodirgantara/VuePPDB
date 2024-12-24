<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nik', 'fullName', 'nickName', 'gender', 'birthPlace', 'birthDate', 'religion', 'childOf', 'domicileAddress', 
        'kkAddress', 'isPKH_KIP', 'image', 'imageKK', 'imageBirthCert', 'imagePKH_KIP', 'status', 'classType',
        'parents_id', 'users_id'
    ];

    protected $hidden = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Parents::class, 'parents_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'students_id');
    }

    // use HasFactory;
}
