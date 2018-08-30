@extends('layouts.app')

@section('content')
    <br>
    @include('common.success')
    <a class="btn btn-primary btn-block" href="{{route('language.create')}}" role="button">Add</a>
    <br>
    <div class="card">
        <div class="card-body">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Code</th>
            <th scope="col"> Developer</th>

        </tr>
        </thead>
        <tbody>
        @foreach($languages as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->code}}</td>
            <td>{{$data->developer->pluck('email')->implode(',')}}</td>

        </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection