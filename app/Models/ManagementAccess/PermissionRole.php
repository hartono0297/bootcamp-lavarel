<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    use SoftDeletes;

    //declare tables
    public $table = 'permission_role';

    // this field must ype date yyyy-mm--dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'permission_id',
        'role_id',
        'created_at',
        'update_at',
        'deleted_at',
    ];

    public function permission()
    {   
        // 2 parameter (path model, field foreign key, field primary key from table hasMany/hasOne')
        return $this->belongsTo('App\Models\ManagementAccess\Permission','permission_id','id');
    }

    public function role()
    {   
        // 2 parameter (path model, field foreign key, field primary key from table hasMany/hasOne')
        return $this->belongsTo('App\Models\ManagementAccess\Role','role_id','id');
    }
}
