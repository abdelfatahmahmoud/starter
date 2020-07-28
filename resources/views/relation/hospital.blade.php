@extends('layouts.app')
@section('content')

    <div class="container">

        <h1 class="alert alert-success text-center">
            المستشفيات

        </h1>
    </div>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">addres</th>
            <th scope="col">الاجراءات</th>
        </tr>
        </thead>
        <tbody>

    @if(isset($hospitall) && $hospitall -> count() > 0)

    @foreach($hospitall as $hospitals)

        <tr>
            <th scope="row">{{$hospitals -> id}}</th>
            <td>{{$hospitals -> name}}</td>
            <td>{{$hospitals -> address}}</td>
            <td><a href="{{route('doctor.hospital',$hospitals -> id)}}" class="btn btn-success">عرض الاطباء</a> </td>
        </tr>

        </tbody>

        @endforeach

        @endif
    </table>
</div>
    @stop

