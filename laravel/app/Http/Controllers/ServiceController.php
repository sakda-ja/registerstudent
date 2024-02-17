<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ServiceController extends Controller
{



    public function index()

    {
        $ModelService = Service::paginate(5);//ดึงข้อมูลแบบ Eloquent
        return view('admin.service.index' ,compact('ModelService'));
    }



    public function forms()

    {

        return view('admin.service.form');
    }


    //เพิ่มข้อมูล
    public function store(Request $request)
    {


        //ตรวจสอบการกรอกข้อมูล
        $request->validate(
            [
                'service_id' => 'required|unique:services|max:255 ',
                'service_image' => 'required|mimes:jpg,jpeg,png,pdf,PDF'

            ],
            [
                'service_id.required' => "กรุณาป้อนข้อมูล number_id",
                'service_id.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'service_id.unique' => "ข้อมูลซ้ำ กรุณาตรวจสอบอีกครั้ง",
                'service_image.required' => "กรุณาอัปโหลดรูป"
            ]
        );

//เข้ารหัสรูปภาพ
// dd($request->service_name ,$request->service_image);

        //-----------------------เข้ารหัส----------------------
        $service_image = $request->file('service_image'); //เข้ารหัส
        $name_gen = hexdec(uniqid()); //เปลี่ยนชื่อรูปภาพสุ่มแปลงเป็นตัวเลขที่ไม่ซ้ำ
        $img_ext = strtolower($service_image->getClientOriginalExtension()); //หั่นเอาเฉพาะนามสกุลมาเก็บ**เป็นตัวพิมพ์เล็ก
        $img_name = $name_gen .   '.'    .$img_ext; //รวมชื่อภาพที่สุ่มได้เป็นตัวเลข+นามสกุลไฟล์เช่น 10101010.jpg

        //--------------------อัปโหลดลงฐานข้อมูล---------------
        $upload_location = 'image/services/'; //ที่เก็บ
        $full_path = $upload_location.$img_name; //เริ่มเก็บประมวลผลที่เซิร์ฟเวอร์

        Service::insert([
            'service_id' => $request->service_id,
            'service_prefix' =>$request->service_prefix,
            'service_namelastname' =>$request->service_namelastname,
            'service_dateofbirth' =>$request->service_dateofbirth,
            'service_origin' =>$request->service_origin,
            'service_nationality' =>$request->service_nationality,
            'service_religion' =>$request->service_religion,
            'service_image' =>$full_path,
            'created_at' =>Carbon::now()
        ]);
            $service_image->move($upload_location,$img_name);
            //return redirect()->back()->with('success' , "บันทึกข้อมูลเรียบร้อย");
            return redirect()->route('menuservices')->with('success' , "อัปเดทข้อมูลสำเร็จ");


    }



    //ลบถาวร
    public function delete($id)
    {

    // ลบภาพในโฟลเดอร์
      $img = Service::find($id)->service_image; //ไปค้นจาก Models/Service.php เพื่อหา PATH ไปลบใน Folder
      @unlink($img); //สั่งลบ


       //ลบข้อมูลชื่อภาพจากฐานข้อมูล
       $delete=Service::find($id)->delete();
       return redirect()->back()->with('success',"ลบข้อมูลเรียบร้อย");


    }




    public function pdf()
    {
      $pdfdatabases =  Service::all(); //เรียกฐานข้อมูลมา forech

      //สั่งเจน PDF
        $pdf =PDF::loadView(
        //เข้าถึง path  pdf/ex3.blade.php
            'admin.service.pdf',
            [
                'pdfdatabases' => $pdfdatabases  //กำหนด key => ตัวแปร
            ]
        );


        return @$pdf->stream(); //สั่งประมวลผลและเปิด pdf จากฐานข้อมูล
        //return @$pdf->download();  //สั่งประมวลผลและดาวน์โหลด pdf
    }




    public function generatePdf($id)
{
    $pdfid = Service::find($id);

    // สร้าง PDF สำหรับบุคคลที่เลือก
    $pdf = PDF::loadView('admin.service.pdf', ['pdfdatabases' => [$pdfid]]);

    return $pdf->stream();
}

}
