<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Roles;

class UserController extends Controller
{
    public function list(){
        $users = User::all();
        $roles = Roles::all();
        return view('admin.users.users', ["users"=>$users, "roles"=>$roles]);
    }
    public function adduser(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'user_role'=>'required|string',
            'password'=>'required|string'
        ]);
        try{
            $new_user = new User;
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->user_role = $request->user_role;
            $new_user->password = $request->password;
            $new_user->save();

        return redirect('/dashboard/users')->with('success', 'User added successfully');
        } catch (\Exception $e){
            return redirect('/dashboard/users')->with('fail', 'Failed to add user'. $e->getMessage());
        }
    }

    public function updateuser(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'user_role'=>'required|string',
            'password'=>'required|string'
        ]);
        try{
            $update_user = User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'user_role' => $request->user_role,
                'password' => $request->password
            ]);

        return redirect('/dashboard/users')->with('success', 'User updated successfully');
        } catch (\Exception $e){
            return redirect('/dashboard/users')->with('fail', 'Failed to update user'. $e->getMessage());
        }
    }
    public function deleteuser($id){
        try{
            User::find($id)->delete();
            return redirect('/dashboard/users')->with('success', 'User deleted successfully');
        } catch(\Exception $e) {
            return redirect('/dashboard/users')->with('fail', 'Failed to delete user'. $e->getMessage());
        }
    }
}
