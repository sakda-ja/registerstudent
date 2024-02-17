@extends('layouts.dashboard')


@section('content')


สวัสดี,{{Auth::user()->name}}

<div class="py-12">
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        ตาราง Service
                        <form action="{{route ('addServices')}}" method="post" enctype="multipart/form-data">

                                @csrf
                                <label for="exampleFormControlInput1" class="form-label">เลขบัตรประชาชน</label>
                                <input type="text" class="form-control" id="#" placeholder="" name="service_id">

                                <label for="exampleFormControlInput1" class="form-label">คำนำหน้า</label>
                                <input type="text" class="form-control" id="#" placeholder="" name="service_prefix">

                                <label for="exampleFormControlInput1" class="form-label">ชื่อ-นามสกุล</label>
                                <input type="text" class="form-control" id="#" placeholder="" name="service_namelastname">

                                <label for="exampleFormControlInput1" class="form-label">วัน/เดือน/ปี</label>
                                <input type="text" class="form-control" id="#" placeholder="" name="service_dateofbirth">

                                <label for="exampleFormControlInput1" class="form-label">เชื้อชาติ</label>
                                <input type="text" class="form-control" id="#" placeholder="" name="service_origin">


                                <label for="exampleFormControlInput1" class="form-label">สัญชาติ</label>
                                <input type="text" class="form-control" id="#" placeholder="" name="service_nationality">


                                <label for="exampleFormControlInput1" class="form-label">ศาสนา</label>
                                <input type="text" class="form-control" id="#" placeholder="" name="service_religion">




                                @error('service_id')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="service_image">ภาพประกอบ</label>
                                    <input type="file" class="form-control" name="service_image">
                                </div>

                                @error ('service_image')
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



@endsection

