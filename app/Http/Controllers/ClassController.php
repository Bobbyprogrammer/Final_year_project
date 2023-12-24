<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function studentlist()
    {
        $data['getRecord'] = classModel::getRecord();
        return view('admin.class.studentlist', $data);
    }

    public function add()
    {
        return view('admin.class.add');
    }
    public function insert(Request $request)
    {
        $save = new ClassModel();
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('admin/class/list')->with('status', 'Class successfully Created');
    }

    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);
        return view('admin.class.edit', $data);
    }

    public function update($id, Request $request)
    {
        //$data['getRecord']=ClassModel::getSingle($id);
        $data = ClassModel::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        // $save->created_by=Auth::user()->id;
        $data->save();
        return redirect('admin/class/list')->with('status', 'Class successfully Updated');
    }

    public function delete($id)
    {
       $save=ClassModel::getSingle($id);
       $save->is_delete=1;
       $save->save();
        return redirect('admin/class/list')->with('status', 'Class successfully Deleted');
    }
}
