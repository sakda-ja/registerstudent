<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Document</title>

<style>
        /* @page{
            margin-top: 20;
        } */
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNewBold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNewItalic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNewBoldItalic.ttf') }}") format('truetype');
        }


        body{
            text-align: center;

            border: 5px solid black;
            font-family:'THSarabunNew';
        }

        h1{
            color: blue;
            font-family: 'THSarabunNew';
        }

        img {

            width: 150px;
            height: 150px;

        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 15;
            text-align: center;
        }

        p  {
            border: 1px solid powderblue;
            padding: 30px;
        }
    </style>

</head>
<body>


<img src="{{ public_path('images/kpsc.png') }}" alt="Your Image" > <br>

<H1 style="text-align: center;"> {{$title}}</H1>
<p>วัน/เดือน/ปี.................................................................................<br>
   เรียน...................................................................................... <br>
   เรื่อง...................................................................................... <br>
</p>


<table style="width:100%">
  <tr>
    <th style="width:5%">ลำดับ</th>
    <th style="width:70%" >รายการ</th>
    <th style="width:5%">จำนวน</th>
    <th style="width:15%">ราคา/หน่วย</th>
    <th style="width:15%">ราคารวม</th>
  </tr>

  <tr>
    <td>1</td>
    <td>SSD 256 GB</td>
    <td>5</td>
    <td>500,000</td>
    <td>500,000</td>
  </tr>
  <tr >
    <td>2</td>
    <td>Printer</td>
    <td>5</td>
    <td>420,000</td>
    <td>420,000</td>
  </tr>
</table>


<p>ขอแสดงความนับถือ<br>
 ................................. <br>
 ( นายศักดิ์ดา จตุพร ) <br>
</p>








</body>
</html>
