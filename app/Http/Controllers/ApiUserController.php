<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    // Fetch all users
    public function loadAllUsers()
    {
        try {
            $all_users = User::all();
            return response()->json([
                'success' => true,
                'data' => $all_users
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to load users',
                'error' => $e->getMessage() // Only show in development
            ], 500);
        }
    }

    // Add a new user
    public function addUser(Request $request)
{
    // Validasi input
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email|max:255',
        'phone_number' => 'required|regex:/^[0-9]{10,15}$/',
        'password' => 'required|confirmed|min:6|max:20',
    ]);

    try {
        // Menambahkan user baru
        $new_user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        // Mengembalikan response sukses dengan data user baru
        return response()->json([
            'success' => true,
            'message' => 'User added successfully',
            'data' => $new_user // Menampilkan data user yang baru saja ditambahkan
        ], 201);
    } catch (\Exception $e) {
        // Menangani error dan mengembalikan response gagal
        return response()->json([
            'success' => false,
            'message' => 'Failed to add user',
            'error' => $e->getMessage() // Menampilkan error di mode pengembangan
        ], 500);
    }
}


    // Edit user data
    public function editUser(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|regex:/^[0-9]{10,15}$/',
        ]);

        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            $user->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update user',
                'error' => $e->getMessage() // Only show in development
            ], 500);
        }
    }

    // Get user details for editing
    public function loadUser($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to load user',
                'error' => $e->getMessage() 
            ], 500);
        }
    }

    // Delete user
    public function deleteUser($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete user',
                'error' => $e->getMessage() // Only show in development
            ], 500);
        }
    }
}
