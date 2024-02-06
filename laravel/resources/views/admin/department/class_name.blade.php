@extends('layouts.dashboard')


@section('content')




<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        ระดับชั้นมัธยมศึกษาปีที่ 1

                    </div>
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


@endsection
