<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
    protected $primaryKey = 'id';
    protected $fillable = ['role_id', 'permission_id'];
    use HasFactory;

    static public function addandupdateRecord($permission_ids, $role_id){
        PermissionRole::where('role_id', '=', $role_id)->delete();
        foreach($permission_ids as $permission_id){
            $permissionrole = new PermissionRole;
            $permissionrole->permission_id = $permission_id;
            $permissionrole->role_id = $role_id;
            $permissionrole->save();
        }
    }

    static public function getPermissionRole($role_id){
        return PermissionRole::where('role_id', '=', $role_id)->get();
    }
}
