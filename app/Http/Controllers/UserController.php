<?php

namespace App\Http\Controllers;
//import model
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //import untuk password

class UserController extends Controller
{
    //membuat all crud logic
    public function loadAllusers()
    {
        $all_users = User::all();
        return view('users', compact('all_users'));
    }

    //function untuk menampilkan halama tambah user
    public function loadAddUserForm()
    {
        return view('add-user');
    }
    //function untuk tambah data new user
    public function AddUser(Request $request)
    {
        //untuk validasi form
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required|confirmed|min:4|max:10',
        ]);
        try {
            //resigtrasi user
            $new_user = new User;
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->password = Hash::make($request->password);
            $new_user->save();

            return redirect('/users')->with('success', 'User Added Successfully');
        } catch (\Exception $e) {
            return redirect('/add/user')->with('fail', $e->getMessage());
        }
    }
    //function untuk proses edit
    public function EditUser(Request $request)
    {
        // perform form validation here
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required',
        ]);
        try {
            // update user here
            $update_user = User::where('id', $request->user_id)->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);

            return redirect('/users')->with('success', 'User Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/edit/user')->with('fail', $e->getMessage());
        }
    }
    //function untuk menampilkan halaman  edit data user
    public function loadEditForm($id)
    {
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }
    //function delete/hapus data
    public function deleteUser($id)
    {
        try {
            User::where('id', $id)->delete();
            return redirect('/users')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect('/users')->with('fail', $e->getMessage());
        }
    }
}
