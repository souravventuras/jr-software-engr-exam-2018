@extends('layouts.app')

@section('content')
    <br>
    @include('common.success')
    <a class="btn btn-primary btn-block" href="{{route('programminglanguage.create')}}" role="button">Add</a>
    <br>
    <div class="card">
        <div class="card-body">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Programming Name</th>
            <th scope="col">Developer</th>
        </tr>
        </thead>
        <tbody>
        @foreach($programming_languages as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->developer->pluck('email')->implode(',')}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection