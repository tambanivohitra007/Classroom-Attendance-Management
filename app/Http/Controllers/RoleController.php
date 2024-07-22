<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Roles;

class RoleController extends Controller
{
    public function list(){
        $roles = Roles::all();
        return view('admin.roles.roles', ["roles"=>$roles]);
    }

    public function add(Request $request){
        $request->validate([
            'role_name' => 'required|string|max:255',
        ]);
        $new_role = new Roles;
        $new_role->role_name = $request->input('role_name');
        $new_role->save();

        return redirect('/dashboard/roles')->with('success', 'Role created successfully');
    }

    public function updaterole(Request $request){
        $request->validate([
            'role_name' => 'required|string|max:255',
        ]);
        $update_role = Roles::where('role_id', $request->role_id)->update([
            'role_name' => $request->role_name
        ]);
        return redirect('/dashboard/roles')->with('success', 'Role edited successfully');
    }

    public function deleterole($role_id){
            $role = Roles::find($role_id)->delete();
            return redirect('/dashboard/roles')->with('success', 'Role deleted successfully');
    }
}
