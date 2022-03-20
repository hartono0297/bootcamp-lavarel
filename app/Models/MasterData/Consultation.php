<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use SoftDeletes;

    //declare tables
    public $table = 'consultation';

    // this field must ype date yyyy-mm--dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'name',
        'created_at',
        'update_at',
        'deleted_at',
    ];

    public function appointment()
    {   
        // 2 parameter (path model, field foreign key)
        return $this->hasMany('App\Models\Operational\Appointment','consultation_id');
    }
}
