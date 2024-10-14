<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Roles;

use App\Models\Permissions;

use App\Models\PermissionRole;

class RoleController extends Controller
{
    public function list(){
        $roles = Roles::all();
        $getPermissions = Permissions::getRecord();
        $rolePermissions = PermissionRole::all()->groupBy('role_id');

        return view('admin.roles.roles', ["roles" => $roles,"getPermissions" => $getPermissions,"rolePermissions" => $rolePermissions]);
    }


    public function add(Request $request){
        $request->validate([
            'role_name' => 'required|string|max:255',
            'permission_id' => 'array',
        ]);
        $new_role = new Roles;
        $new_role->role_name = $request->input('role_name');
        $new_role->save();

        $permission_ids = $request->input('permission_id', []);

        PermissionRole::addandupdateRecord($permission_ids, $new_role->role_id);

        return redirect('/dashboard/roles')->with('success', 'Role created successfully');
    }

    public function updaterole(Request $request){
        $request->validate([
            'role_name' => 'required|string|max:255',
            'permission_id' => 'array',
        ]);

        $role_id = $request->route('role_id');
        $update_role = Roles::where('role_id', $role_id)->update([
            'role_name' => $request->role_name
        ]);
        $permission_ids = $request->input('permission_id', []);
        PermissionRole::addandupdateRecord($permission_ids, $role_id);
        return redirect()->route('listrolesandpermissions')->with('success', 'Role edited successfully');
    }


    public function deleterole($role_id){
            PermissionRole::where('role_id', $role_id)->delete();
            Roles::find($role_id)->delete();
            return redirect('/dashboard/roles')->with('success', 'Role deleted successfully');
    }
}
