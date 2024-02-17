<?php

namespace App\Http\Controllers;

use App\Models\register;  //นำเข้ามา ใช้งานที่ ex3 คือการเรียก mapping ฐานข้อมูลเรียกมาวนลูป @forech
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    //
    public function index ()
    {
        return view ('pdf.index');
    }



    public function ex1()
    {
        $title = "รายงานประจำปี 2567";
        $pdf =PDF::loadView(
            'pdf.ex1',
            [
                'title' => $title
            ]
        ); //Load file ex1.blade.php
        return @$pdf->stream();
        //return @$pdf->download();
    }




    public function ex2()
    {
        $title = "รายงานประจำปี 2567";
        $pdf =PDF::loadView(
            'pdf.ex2',
            [
                'title' => $title
            ]
        ); //Load file ex1.blade.php
        return @$pdf->stream();
        //return @$pdf->download();
    }






    public function ex3()
    {
      $registers =  register::all(); //เรียกฐานข้อมูลมา forech

      //สั่งเจน PDF
        $pdf =PDF::loadView(
        //เข้าถึง path  pdf/ex3.blade.php
            'pdf.ex3',
            [
                'registers' => $registers  //กำหนด key => ตัวแปร
            ]
        );


        return @$pdf->stream(); //สั่งประมวลผลและเปิด pdf จากฐานข้อมูล
        //return @$pdf->download();  //สั่งประมวลผลและดาวน์โหลด pdf
    }




}
