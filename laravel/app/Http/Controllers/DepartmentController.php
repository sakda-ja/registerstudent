<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    //เรียกข้อมูลจาก DB
    public function class_name()
    {
        $Modeldepartment = Department::paginate(5); //ดึงข้อมูลแบบ Eloquent
        $recycledepartment = Department::onlyTrashed()->paginate(3); //ดึงข้อมูลแบบ Eloquent ที่อยู่ในถังขยะที่ผู้ใช้งานลบ
        return view('admin.department.class_name' ,compact('Modeldepartment' , 'recycledepartment') ); //return view table และ tableถังขยะ


        /*รูปแบบการเรียกฐานข้อมูล เพื่อ join ตารางต่างๆ*/
        // $Modeldepartment = DB::table('departments')->get(); //Query builder
        // $Modeldepartment = Department::all(); //Eloquent


        //join Table users and Department
        // $Modeldepartment = DB::table('departments')
        // ->join('users' , 'departments.user_id' , 'users.id')
        // ->select('departments.*' , 'users.name' )
        // ->paginate(5);

    }



    //เพิ่มข้อมูล
    public function store(Request $request)
    {

        // dd($request->class_name);
        //ตรวจสอบการกรอกข้อมูล
        $request->validate(
            [
                'class_name' => 'required|unique:departments|max:10 '
            ],
            [
                'class_name.required' => "กรุณาป้อนข้อมูล",
                'class_name.max' => "ห้ามป้อนเกิน 10 ตัวอักษร",
                'class_name.unique' => "ข้อมูลซ้ำ กรุณาตรวจสอบอีกครั้ง"
            ]
        );

        //[]บันทึกข้อมูลแบบ Eloquent
        // $insertclass_name = new Department;
        // $insertclass_name-> class_name = $request->class_name; //ตัวแปร -> ชื่อคอลัมตาราง = ชื่อ text fiedจากฟอร์ม
        // $insertclass_name->user_id = Auth::user()->id;
        // $insertclass_name->save();
        // return redirect()->back()->with('success' , "บันทึกข้อมูลเรียบร้อย");


          /**บันทึกข้อมูลแบบ Query builder
           - หากเลือกบันทึกข้อมูลแบบนี้จะไม่ได้ created_at มาบันทึกด้วย
            - หากเลือกบันทึกข้อมูลแบบนี้จะไม่ได้ updated_at มาบันทึกด้วย
          */
        $insertclass_name = array();
        $insertclass_name["class_name"] = $request->class_name; //ตัวแปร + คอลัมตาราง + text input
        $insertclass_name["user_id"] = Auth::user()->id; //
            DB::table('departments')->insert($insertclass_name); //บันทึกข้อมูลลงในตารางชื่อ departments
            return redirect()->back()->with('success' , "บันทึกข้อมูลเรียบร้อย");

    }



//ดึงมาแสดงผลเพื่อแก้ไข
    public function edit ($id)
    {
        // dd($id);
        $finddepartment =  Department::find($id);
        return view('admin.department.edit' , compact('finddepartment'));
        // dd($finddepartment->class_name);
    }



//เมื่อแก้ไขสั่งให้อัปเดท
    public function update (Request $request , $id)
    {
        //dd($id , $request->class_name);

        // ดักตรวจข้อมูล
        $request->validate(
            [
                'class_name' => 'required|unique:departments|max:255 '
            ],
            [
                'class_name.required' => "กรุณาป้อนข้อมูล",
                'class_name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'class_name.unique' => "ข้อมูลซ้ำ กรุณาตรวจสอบอีกครั้ง"
            ]
        );


        //ค้นหาข้อมูลแบบ Eloquent
        $updatedepartment = Department::find($id)->update([
            'class_name' => $request->class_name,
            'user_id' =>Auth::user()->id  //เก็บ Log คนแก้ไขด้วย
        ]);
         return redirect()->route('class_name')->with('success' , "อัปเดทข้อมูลสำเร็จ");

    }



    //softdelete ถังขยะ
    public function softdelete ($id)
    {
        //dd($id);
        $avatardelete = Department::find($id)->delete();//ค้นหาและลบลงถังขยะ
            return redirect()->back()->with('success' , "ลบข้อมูลลงถังขยะสำเร็จ");

    }

 //กู้ข้อมูล
    public function recover($id)
    {
        $recoverdata = Department::withTrashed()->find($id)->restore(); //ค้นหาและลบถาวร
             return redirect()->back()->with('success' , "กู้ข้อมูลข้อมูลสำเร็จ");
            // dd($id);
    }

//ลบถาวร
    public function delete($id)
    {
        $deletefull = Department::onlyTrashed()->find($id)->forceDelete(); //ค้นหาและลบทิ้งถาวร
        return redirect()->back()->with('success' , "ลบข้อมูลถาวรเรียบร้อย");
        //dd($id);
    }







}
