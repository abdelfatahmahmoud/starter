<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>?????????????/</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<h1 class="text-center m-5">Add new Offers</h1>

<div class="container">
    <form method="POST" action="" enctype="multipart/form-data" id="formsend">
        {{--<input name = "_token" value="{{csrf_token()}}">--}}
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">صوره المنتج</label>
            <input type="file" class="form-control" name="photo">

            <small id="photo_error" class="form-text text-danger"></small>

        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">اسم المنتج</label>
            <input type="text" class="form-control" name="name">

            <small id="name_error" class="form-text text-danger"></small>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">السعر</label>
            <input type="text" class="form-control" name="price">

            <small id="price_error" class="form-text text-danger"></small>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">الوصف الخاص بالمنتج</label>
            <input type="text" class="form-control" name="detials">

            <small id="detials_error" class="form-text text-danger"></small>

        </div>


        <button id="saved" class="btn btn-primary btn-block btn-sm ">اضافه المنتج</button>
        <div class="alert alert-success" id="success_msg" style="display: none;">
            تم الحفظ بنجاح

        </div>

    </form>
    </div>


<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

    <script>

        $(document).on('click','#saved', function (e) {
           e.preventDefault();

          $('#photo_error').text('');
            $('#name_error').text('');
            $('#price_error').text('');
            $('#detials_error').text('');

           var formdata = new FormData($('#formsend')[0]) ;

            $.ajax({

                type: 'post',
                enctype:'multipart/form-data',
                url:"{{route('ajax.stores')}}",
                 data:formdata,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {

                    if(data.status == true){
                        $('#success_msg').show();

                    }



                }, error: function (reject) {

                     var response = $.parseJSON(reject.responseText);
                     $.each(response.errors,  function (key, val) {

                         $('#' + key + "_error").text(val[0]);

                     });
                }
            });

        })




    </script>

</body>
</html>



