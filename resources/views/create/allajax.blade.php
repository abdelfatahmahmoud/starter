
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
    <body>
    <div class="alert alert-success" id="success_msg" style="display: none;">
        تم الحفظ بنجاح

    </div>

@if(Session::has('success'))


    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
{{--
  @endif


    @if(Session::has('error'))

        <div class="alert alert-danger">

            {{Session::get('error')}}
</div>

    @endif
    --}}


<div class="container">
    <table class="table">
        <thead>
        <tr >
            <th scope="col">#ID</th>
            <th scope="col">{{__('ar.Offer name')}}</th>
            <th scope="col">{{__('ar.Offer price')}}</th>
            <th scope="col">{{__('ar.Offer detials')}}</th>
            <th scope="col">{{__('ar.Offer photo')}}</th>
            <th scope="col">{{__('ar.Offer operation')}}</th>
        </tr>
        </thead>
        <tbody>

        @foreach($offers as $offer)
        <tr class="offer_row{{$offer -> id}}">
            <th scope="row">{{$offer -> id}}</th>
            <td>{{$offer -> name}}</td>
            <td>{{$offer -> price}}</td>
            <td>{{$offer -> detials}}</td>
            <td><img  src="{{asset('images/offers/'.$offer->photo)}}"></td>
            <td>
                <a  href="{{route('offers.edit',$offer -> id)}}" class="btn btn-success">{{__('ar.Offer Update')}}</a>
                <a  href="{{route('offers.delete', $offer -> id)}}" class="btn btn-danger">{{__('ar.Offer delete')}}</a>
                <a  href="" offer_id = "{{$offer -> id}}"  class="delete_ajax btn btn-info"> حذف اجاكس</a>
                <a  href="{{route('ajax.edited', $offer -> id)}}"   class=" btn btn-info"> تحديث اجاكس</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>


    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

    <script>

        $(document).on('click','.delete_ajax', function (e) {
            e.preventDefault();
            var del = $(this).attr('offer_id');

            $.ajax({

                type: 'post',

                url: "{{route('ajax.deletes')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': del
                },
                success: function (data) {

                    if (data.status == true) {
                        $('#success_msg').show();

                    }
                        $('.offer_row'+data.id).remove();

                }, error: function (reject) {

                }
            });
        });




    </script>


    </body>
</html>
