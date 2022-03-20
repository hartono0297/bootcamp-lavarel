<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    //declare tables
    public $table = 'appointment';

    // this field must ype date yyyy-mm--dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'update_at',
        'deleted_at',
    ];

    public function doctor()
    {   
        // 2 parameter (path model, field foreign key, field primary key from table hasMany/hasOne')
        return $this->belongsTo('App\Models\Operational\Doctor','doctor_id','id');
    }
    

    public function consultation()
    {   
        // 2 parameter (path model, field foreign key, field primary key from table hasMany/hasOne')
        return $this->belongsTo('App\Models\MasterData\Consultation','consultation_id','id');
    }

    public function user()
    {   
        // 2 parameter (path model, field foreign key, field primary key from table hasMany/hasOne')
        return $this->belongsTo('App\Models\User','user_id','id');
    }


    public function transaction()
    {   
        // 2 parameter (path model, field foreign key)
        return $this->hasOne('App\Models\Operational\transaction','appointment_id');
    }

  
}
