@extends('layouts.dashboard')


@section('content')


สวัสดี,{{Auth::user()->name}}

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        แบบฟอร์มแก้ไข
                        <form action="{{url ('department/update/'.$finddepartment->id )}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="class_name"></label>
                                <input type="text" class="form-control" name="class_name"
                                    value="{{$finddepartment->class_name}}">
                            </div>
                            @error ('class_name')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @enderror
                            <br>
                                <input type="submit" value="อัปเดท" class="btn btn-primary">
                        </form>
                    </div>
                    {{-- แสดง Alert 1 sec แล้วหาย--}}
                    @if (session()->has('success'))
                    <div x-data="{isShow:true}" x-show="isShow" x-init="setTimeout( ()=>isShow = false, 1000 )"
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
