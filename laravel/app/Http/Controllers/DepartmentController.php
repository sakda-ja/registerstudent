<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    //

    public function class_name()
    {
        return view('admin.department.class_name');
    }

    public function store(Request $request)
    {

        // dd($request->class_name);
        $request->validate(
            [
                'class_name' => 'required|unique:departments|max:10 '
            ],
            [
                'class_name.required' => "กรุณาป้อนข้อมูล",
                'class_name.max' => "ห้ามป้อนเกิน 10 ตัวอักษร"
            ]
        );

        //[]บันทึกข้อมูล
        $insertclass_name = new Department;
        $insertclass_name-> class_name = $request->class_name; //ตัวแปร -> ชื่อคอลัมตาราง = ชื่อ text fiedจากฟอร์ม
        $insertclass_name->user_id = Auth::user()->id;
        $insertclass_name->save();
        return redirect()->back()->with('success' , "บันทึกข้อมูลเรียบร้อย");
    }
}
