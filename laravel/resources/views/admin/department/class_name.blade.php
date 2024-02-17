@extends('layouts.dashboard')


@section('content')


สวัสดี,{{Auth::user()->name}}

<div class="py-12">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                        ตารางข้อมูล
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        ระดับชั้นมัธยมศึกษาปีที่ 4
                        <form action="{{route ('addDepartment')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="class_name"></label>
                                <input type="text" class="form-control" name="class_name">
                            </div>
                                @error ('class_name')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>
                                <input type="submit" value="บันทึก" class="btn btn-primary">

                            </form>
                    </div>
                    {{-- แสดง Alert 1 sec แล้วหาย--}}
                    @if (session()->has('success'))
                        <div
                            x-data="{isShow:true}"
                            x-show="isShow"
                            x-init="setTimeout( ()=>isShow = false, 1000 )"
                            class="alert alert-success">
                                {{ session('success') }}
                        </div>
                    @endif
                    {{-- แสดง Alert 1 sec แล้วหาย--}}
                </div>
            </div>

        </div>
    </div>
</div>


{{-- DATATABLE--}}
 <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ระดับชั้น</th>
                        <th scope="col">ชื่อผู้ใช้งาน</th>
                        <th scope="col">ระยะเวลาที่เข้าสู่ระบบ</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Modeldepartment as $row)
                    <tr>
                        <th>{{$Modeldepartment -> firstItem()+$loop->index }}</th> {{-- ฟังชั่นเรียงลำดับหน้า--}}
                        <td>{{$row->class_name}}</td>
                        <td>{{$row->user->name}}</td> <!--Join Tableแบบ Eloquen จาก Department ไป user +เรียกผ่าน Fn model user + ไปที่ Table -> colum ->name -->
                        {{-- <td>{{$row->name}}</td> --}}
                        {{-- <td>{{$row->user_id}}</td> --}}
                        <td> {{-- ถ้าเป็นค่าว่างให้แสดงผู้มูลแบบ if else--}}
                            @if ($row->created_at == NULL)
                                -
                            @else
                                {{Carbon\Carbon::parse($row->created_at) -> diffForHumans()}}
                            @endif
                        </td>
                        <td> <a href="{{url ('department/edit/'.$row->id) }}" class="btn btn-warning">แก้ไข</a></td>
                        <td> <a href="{{url ('department/softdelete/'.$row->id) }}" class="btn btn-danger">ลบ</a></td>
                    </tr>
                    @endforeach
                </tbody>
    </table>
{{ $Modeldepartment->links('pagination::bootstrap-5') }}





<!-- ถังขยะ ใส่ if เพื่อตรวจสอบว่ามีขยะอยู่หรือไม่ถ้ามีให้แสดงผล ถ้าไม่มีให้ตารางหายไป-->
@if (count ($recycledepartment)>0)
        <h1>ถังขยะ</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">ระดับชั้น</th>
                    <th scope="col">ชื่อผู้ใช้งาน</th>
                    <th scope="col">ระยะเวลาที่เข้าสู่ระบบ</th>
                    <th scope="col">กู้คืน</th>
                    <th scope="col">ลบถาวร</th>

                </tr>
            </thead>

            <tbody>

                @foreach ($recycledepartment as $row)
                <tr>
                    <th>{{$recycledepartment -> firstItem()+$loop->index }}</th> {{-- ฟังชั่นเรียงลำดับหน้า--}}
                    <td>{{$row->class_name}}</td>
                    <td>{{$row->user->name}}</td> <!--Join Tableแบบ Eloquen จาก Department ไป user +เรียกผ่าน Fn model user + ไปที่ Table -> colum ->name -->
                    {{-- <td>{{$row->name}}</td> --}}
                    {{-- <td>{{$row->user_id}}</td> --}}
                    <td> {{-- ถ้าเป็นค่าว่างให้แสดงผู้มูลแบบ if else--}}
                        @if ($row->created_at == NULL)
                            -
                        @else
                            {{Carbon\Carbon::parse($row->created_at) -> diffForHumans()}}
                        @endif
                    </td>
                    <td> <a href="{{url ('department/recover/'.$row->id) }}" class="btn btn-warning">กู้คืน</a></td>
                    <td> <a href="{{url ('department/delete/'.$row->id) }}" class="btn btn-danger">ลบถาวร</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $recycledepartment->links('pagination::bootstrap-5') }}
@endif




@endsection
