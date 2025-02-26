<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index() {
        $users = User::paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function create() {
        return view('admin.user.create');
    }


    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $request->role ?? 'user',
        ]);

        return redirect()->route('user.index')->with('success','User created successfully');


    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:user,admin',
        ]);
    
        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];
    
        // Nếu có mật khẩu mới thì mã hóa
        if (!empty($validated['password'])) {
            $updateData['password'] = bcrypt($validated['password']);
        }
    
        $user->update($updateData);
    
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }
    

    public function destroy(User $user) {
        $user->delete();

        return redirect() -> route('user.index') -> with('success', 'User deleted successfully.');
    }
    
}
