<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();

        return view('admin.admin.list', $data);
    }
    public function add()
    {
        return view('admin.admin.add');
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users',
        ]);

        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();
        return redirect('admin/admin/list')->with('status', 'Admin Created Successfully!!');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users,email' . $id,
        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
        $user->password = Hash::make($request->password);
        }
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();
        return redirect('admin/admin/list')->with('status', 'Admin Updated Successfully!!');
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/admin/list')->with('status', 'Admin deleted Successfully');
    }
}
