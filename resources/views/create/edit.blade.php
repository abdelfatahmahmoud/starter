
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
    <body> <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>




                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>



        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="title m-b-md">
                    <div class="text-center">اضافه منتجات جديده </div>
                </div>

                @if(Session::has('success'))

                    <div class="alert alert-success text-center">

                        {{Session::get('success')}}

                    </div>

                    @endif

                <form method="post" action="" id="formdataa" enctype="multipart/form-data">
                    {{--<input name = "_token" value="{{csrf_token()}}">--}}
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">صوره المنتج</label>
                        <input type="file" class="form-control" name="photo" value="{{$offer -> photo}}">
                        @error('photo')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="text" style="display: none;" class="form-control" name="offer_id" value="{{$offer -> id}}">

                    <div class="form-group">


                        <label for="exampleInputEmail1">اسم المنتج</label>
                        <input type="text" class="form-control" name="name" value="{{$offer -> name}}">
                        @error('name')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">السعر</label>
                        <input type="text" class="form-control" name="price" value="{{$offer -> price}}">
                        @error('price')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">الوصف الخاص بالمنتج</label>
                        <input type="text" class="form-control" name="detials" value="{{$offer -> detials}}">
                        @error('detials')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>


                    <button type="submit"  id="update" class="btn btn-primary btn-block btn-sm ">اضافه المنتج</button>
                </form>
                <div class="alert alert-success" id="success_msg" style="display: none;">
                    تم الحفظ بنجاح

                </div>
            </div>

        </div>


    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

    <script>

        $(document).on('click','#update', function (e) {
            e.preventDefault();
            var formdata = new FormData($('#formdataa')[0]) ;

            $.ajax({

                type: 'post',
                enctype:'multipart/form-data',
                url:"{{route('ajax.updates')}}",
                data:formdata,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {

                    if(data.status == true){
                        $('#success_msg').show();

                    }



                }, error: function (reject) {

                }
            });

        })




    </script>



    </body>
</html>
