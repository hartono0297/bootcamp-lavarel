<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    //declare tables
    public $table = 'role';

    // this field must ype date yyyy-mm--dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'title',
        'created_at',
        'update_at',
        'deleted_at',
    ];

    public function permission_role()
    {   
        // 2 parameter (path model, field foreign key)
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole','role_id');
    }

    public function role_user()
    {   
        // 2 parameter (path model, field foreign key)
        return $this->hasMany('App\Models\ManagementAccess\RoleUser','role_id');
    }
}
