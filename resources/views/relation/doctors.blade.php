@extends('layouts.app')
@section('content')

    <div class="container">

        <h1 class="alert alert-success">
           الاطباء

        </h1>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">type</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($doctors) && $doctors -> count() > 0)

            @foreach($doctors as $doctor)
        <tr>
            <th scope="row">{{$doctor -> id}}</th>
            <td>{{$doctor -> name}}</td>
            <td>{{$doctor -> type}}</td>
        </tr>

        </tbody>
    </table>
    @endforeach
@endif
    @stop

