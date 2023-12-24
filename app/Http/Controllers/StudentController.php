<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users',
        ]);
        $student = new User();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->class_id = trim($request->class_id);
        $student->status = $request->status;
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();
        return redirect('admin/student/list')->with('status', 'Student Created Successfully!!');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if (!empty($data['getRecord'])) {
            $data['getClass'] = ClassModel::getClass();
            return view('admin.student.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'email' => 'required |email|unique:users,email,' . $id,
        ]);
        $student = User::getSingle($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->class_id = trim($request->class_id);
        $student->status = $request->status;
        $student->password = Hash::make($request->password);
        $student->save();
        return redirect('admin/student/list')->with('status', 'Student Created Updated!!');
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);

        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect('admin/student/list')->with('status', 'Student Deleted Updated!!');
        } else {
            abort(404);
        }
    }
}
