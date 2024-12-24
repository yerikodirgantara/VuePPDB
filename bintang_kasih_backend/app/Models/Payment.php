<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'isChurch_Member', 'imageChurchMember', 'regisWave', 'classType',
        'paymentSPI', 'paymentSPP', 'paymentTotal', 'imagePayment',
        'paymentStatus', 'students_id',
    ];

    protected $hidden = [];

    public function student_payment()
    {
        return $this->belongsTo(Students::class, 'students_id');
    }
}
