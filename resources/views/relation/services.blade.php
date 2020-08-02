@extends('layouts.app')
@section('content')

    <div class="container">

        <h1 class="alert alert-success text-center">
           الاطباء

        </h1>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">name</th>


        </tr>
        </thead>
        <tbody>
        @if(isset($services) && $services -> count() > 0)

            @foreach($services as $service)
        <tr>
            <th scope="row">{{$service -> id}}</th>
            <td>{{$service -> name}}</td>


        </tr>
            @endforeach
            @endif
        </tbody>

    </table>

        @if(Session::has('success'))

            <div class="alert alert-success text-center">

                {{Session::get('success')}}

            </div>

        @endif
    <form method ="POST" action="{{route('save.doctors.services')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">اختر الطبيب</label>

            <select class="form-control" name="doctor_id">
                @if(isset($doctors) && $doctors -> count() > 0)
                    @foreach($doctors as $doctor)
                <option value="{{$doctor -> id}}">{{$doctor -> name}}</option>

                    @endforeach
                @endif

            </select>

        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">اختر الخدمه</label>

            <select class="form-control" name="services_id[]" multiple>
                @if(isset($servicess) && $servicess -> count() > 0)
                    @foreach($servicess as $services)
                        <option value="{{$services -> id}}">{{$services -> name}}</option>

                    @endforeach
                @endif



            </select>

            <button type="submit" class="btn btn-primary btn-block btn-sm ">اضافه الخدمات </button>
        </div>

    </form>
    </div>
    @stop

