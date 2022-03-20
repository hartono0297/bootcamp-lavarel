<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    //declare tables
    public $table = 'transaction';

    // this field must ype date yyyy-mm--dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'appointment_id',
        'fee_doctor',
        'fee_specialist',
        'fee_hospital',
        'sub_total',
        'vat',
        'total',
        'created_at',
        'update_at',
        'deleted_at',
    ];

    public function appointment()
    {   
        // 2 parameter (path model, field foreign key, field primary key from table hasMany/hasOne')
        return $this->belongsTo('App\Models\Operational\Appointment','appointment_id','id');
    }
}
