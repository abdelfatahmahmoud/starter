@extends('layouts.app')
@section('content')


@if(Session::has('success'))


    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>

    @endif


    @if(Session::has('error'))

        <div class="alert alert-danger">

            {{Session::get('error')}}
        </div>

    @endif

<div class="container">
    <table class="table">
        <thead>
        <tr>
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
        <tr>
            <th scope="row">{{$offer -> id}}</th>
            <td>{{$offer -> name}}</td>
            <td>{{$offer -> price}}</td>
            <td>{{$offer -> detials}}</td>
            <td><img src="{{asset('images/offers'.$offer->photo)}}"></td>
            <td>
                <a  href="{{route('offers.edit',$offer -> id)}}" class="btn btn-success">{{__('ar.Offer Update')}}</a>
                <a  href="{{route('offers.delete', $offer -> id)}}" class="btn btn-danger">{{__('ar.Offer delete')}}</a>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

 <div class="d-flex justify-content-center">

     {!! $offers -> links() !!}
 </div>
</div>



@stop
