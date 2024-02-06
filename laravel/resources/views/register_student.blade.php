@extends('layouts.dashboard')

@section('content')



    <div class="container">

    <div class="card">
        <div class="card-body">
            <h5>1.ข้อมูลผู้สมัคร</h5>
                <label for="exampleFormControlInput1" class="form-label">เลขประจำตัวประชาชนของผู้สมัคร</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">

                <label for="exampleFormControlInput1" class="form-label">คำนำหน้า "เด็กชาย,เด็กหญิง,นาย,นางสาว" </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">

                <label for="exampleFormControlInput1" class="form-label">ชื่อ - นามสกุล</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">

                <label for="exampleFormControlInput1" class="form-label">วัน/เดือน/ปีเกิด</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">

                <label for="exampleFormControlInput1" class="form-label">เชื้อชาติ</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">

                <label for="exampleFormControlInput1" class="form-label">สัญชาติ</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>เลือก</option>
                    <option value="1">ไทย</option>
                    <option value="2">ไม่ระบุสัญชาติ</option>
                  </select>

                  <label for="exampleFormControlInput1" class="form-label">ศาสนา</label>
                  <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="1">พุทธ</option>
                      <option value="2">มุสลิม</option>
                      <option value="2">คริส</option>
                      <option value="2">อิสลาม</option>
                      <option value="2">อื่นๆ</option>
                    </select>

        </div>
      </div>




</div>

@endsection
