@extends('layouts.app')

@section('content')
    <br>
    @include('common.success')
    <a class="btn btn-primary btn-block" href="{{route('developer.create')}}" role="button">Add</a>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Programming Language</th>
            <th scope="col">Language</th>
        </tr>
        </thead>
        <tbody>
        @foreach($developers as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->email}}</td>
            <td>{{$data->programmingLanguage->pluck('name')->implode(',')}}</td>
            <td>{{$data->language->pluck('code')->implode(',')}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection