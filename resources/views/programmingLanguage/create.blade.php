@extends('layouts.app')

@section('content')
    <br>
    @include('common.errors')
    <form method="post" action="{{route('programminglanguage.store')}}">
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Programming Language Name">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary float-right d-block">Submit</button>
            </div>
        </div>
    </form>
@endsection