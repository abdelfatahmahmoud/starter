@extends('layouts.app')
@section('content')

    <div class="container">

        <h1 class="alert alert-success text-center">
           الاطباء

        </h1>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">type</th>
            <th scope="col">gendar</th>
            <th scope="col">operation</th>

        </tr>
        </thead>
        <tbody>
        @if(isset($doctors) && $doctors -> count() > 0)

            @foreach($doctors as $doctor)
        <tr>
            <th scope="row">{{$doctor -> id}}</th>
            <td>{{$doctor -> name}}</td>
            <td>{{$doctor -> type}}</td>
            <td>{{$doctor -> gendar}}</td>
            <td><a class="btn btn-success" href="{{route('getdepartment.doctor',$doctor -> id)}}">عرض الخدمات</a> </td>
        </tr>
            @endforeach
            @endif
        </tbody>

    </table>


    </div>
    @stop

