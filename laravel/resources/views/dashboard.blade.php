@extends('layouts.dashboard')


@section('content')




<div class="py-12">
    <div class="container">
        จำนวนผู้ใช้งานระบบ {{count ($users)}} คน {{-- Function นับจำนวนคนLaravel เรียกใช้งานได้เลย--}}
        <table class="table">
            <div class="row">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">อีเมลล์</th>
                        <th scope="col">เข้าสู่ระบบ</th>
                    </tr>
                </thead>

                <tbody>
                    @php($i=1)
                    @foreach ($users as $row)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{Carbon\Carbon::parse($row->created_at) -> diffForHumans()}}</td>
                    </tr>
                    @endforeach

                </tbody>

        </table>
        </div>
    </div>

</div>


@endsection
