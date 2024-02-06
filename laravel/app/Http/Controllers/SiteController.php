<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function test()
    {
        $company = 'แสดงผล blade';
        $datatables = ['sakda' , 'hack' , 'kruhack'];


        return view('test' ,
        [
            'company'=>$company,
            'datatables' =>$datatables
        ]);
    }



    public function dashboard()
    {
        return view('dashboard');
    }
    public function register_student()
    {
        return view('register_student');
    }

    public function search()
    {
        return view('search');
    }

}
