@extends('layouts.dashboard')


@section('content')


สวัสดี,{{Auth::user()->name}}

<div class="py-12">
    <div class="container">
        <div class="row">


                        ตาราง Service



{{-- DATATABLE--}}
 <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                         <th scope="col">ID Card</th>
                         <th scope="col">คำนำหน้า</th>
                         <th scope="col">ชื่อ นามสกุล</th>

                          <th scope="col">รูป</th>
                        <th scope="col">ระยะเวลาเข้าสู่ระบบ</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ModelService as $row)
                        <tr>
                            <th>{{$ModelService -> firstItem()+$loop->index }}</th> {{-- ฟังชั่นเรียงลำดับหน้า--}}
                            <td>{{$row->service_id}}</td>
                             <td>{{$row->service_prefix}}</td>
                             <td>{{$row->service_namelastname}}</td>
                             {{-- <td>{{$row->service_dateofbirth}}</td> --}}
                             {{-- <td>{{$row->service_origin}}</td> --}}
                             {{-- <td>{{$row->service_nationality}}</td> --}}
                             {{-- <td>{{$row->service_religion}}</td> --}}
                            <td> <a href="{{ asset($row->service_image) }}" target="_blank"  ><img src="{{asset($row->service_image)}}" alt="" width="70px" height="70px" target="_blank"> </a> </td>

                            <td> {{-- ถ้าเป็นค่าว่างให้แสดงผู้มูลแบบ if else--}}
                                @if ($row->created_at == NULL)
                                    -
                                @else
                                    {{Carbon\Carbon::parse($row->created_at) -> diffForHumans()}}
                                @endif
                            </td>
                            <td> <a href="{{url ('department/edit/'.$row->id) }}" class="btn btn-warning">แก้ไข</a></td>
                            <td> <a href="{{url ('service/delete/'.$row->id) }}" class="btn btn-danger">ลบ</a></td>
                            <td> <a href="{{url ('service/generate-pdf/'.$row->id) }}" class="btn btn-primary"> <ion-icon name="print-outline"></ion-icon> พิมพ์ </a> </td> <!--สำคัญมากทำให้สั่งพิมพ์รายบุคคล -->


                        </tr>
                    @endforeach
                </tbody>
    </table>
{{ $ModelService->links('pagination::bootstrap-5') }}














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


@endsection

