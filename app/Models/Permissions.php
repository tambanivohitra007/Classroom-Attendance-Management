<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'permission_id';
    protected $fillable = ['permission_name', 'slug', 'groupby'];
    use HasFactory;

    static public function getRecord(){
        $getPermissions = Permissions::groupBy('groupby')->get();
        $results = array();
        foreach($getPermissions as $value){
            $getPermissionsGroup = Permissions::getPermissionGroup($value->groupby);
            $data = array();
            $data['permission_id'] = $value->permission_id;
            $data['permission_name'] = $value->permission_name;
            $group = array();
            foreach($getPermissionsGroup as $groupvalue){
                $groupdata = array();
                $groupdata['permission_id'] = $groupvalue->permission_id;
                $groupdata['permission_name'] = $groupvalue->permission_name;
                $group[] = $groupdata;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;
    }

    static public function getPermissionGroup($groupby){
        return Permissions::where('groupby', '=', $groupby)->get();
    }
}
