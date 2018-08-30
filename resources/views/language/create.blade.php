@extends('layouts.app')

@section('content')
    <br>
    @include('common.errors')
    <div class="card">
        <div class="card-body">
    <form method="post" action="{{route('language.store')}}">
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="code" id="inputEmail3" placeholder="Code">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </div>
    </form>
        </div>
    </div>
@endsection