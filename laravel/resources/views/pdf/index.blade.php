

@extends('layouts.pdf')


@section('content')

    <h1>PDF INDEX</h1>

    <a href="{{route ('pdfex1') }}" class="btn btn-success">ตัวอย่างรายงานแบบที่ 1</a>
    <a href="{{route ('pdfex2') }}" class="btn btn-success">ตัวอย่างรายงานแบบที่ 2</a>
    <a href="{{route ('pdfex3') }}" class="btn btn-success">ตัวอย่างรายงานแบบที่ 3</a> <!-- foreach PDF-->

@endsection


