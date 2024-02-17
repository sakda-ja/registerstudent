
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{  public_path('bootstrap3/css/custom-bootstrap.min.css') }}" >

    <title>Ex2</title>

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


        /* สีตัวหนังสือ*/
        h1{
            color: blue;
            font-family: 'THSarabunNew';
        }


    </style>

</head>
<body>





    <table class="table">
        <tr>
          <th style="width:5%">ID</th>
          <th style="width:70%" >Serive ID</th>
          <th style="width:5%">คำนำหน้า</th>

        </tr>

        @foreach  ($pdfdatabases as $h )
                    <tr>
                        <td>{{$h -> id}}</td>
                        <td>{{$h -> service_id}}</td>
                        <td>{{$h -> service_prefix}}</td>
                        <td>{{$h->service_namelastname}}</td>
                        <td>{{$h->service_dateofbirth}}</td>
                        <td>{{$h->service_origin}}</td>
                        <td>{{$h->service_nationality}}</td>
                        <td>{{$h->service_religion}}</td>
                       




                    </tr>
        @endforeach







      </table>









</body>
</html>
