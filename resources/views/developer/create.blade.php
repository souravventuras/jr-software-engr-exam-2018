@extends('layouts.app')

@section('content')
    <br>
    @include('common.errors')
    <form method="post" action="{{route('developer.store')}}">
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" id="inputEmail3" placeholder="Email">
            </div>
        </div>


        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Programming Language</label>
            <div class="col-sm-9">
            @foreach($programming_languages as $programming_language)
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" value="{{$programming_language->id}}" name="programmingLanguage[]" class="custom-control-input" id="customCheck11{{$programming_language->id}}">
                    <label class="custom-control-label" for="customCheck11{{$programming_language->id}}">{{$programming_language->name}}</label>
                </div>
            @endforeach
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Language</label>
            <div class="col-sm-9">
            @foreach($languages as $language)
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="language[]" value="{{$language->id}}" class="custom-control-input" id="customCheck101{{$language->id}}">
                    <label class="custom-control-label" for="customCheck101{{$language->id}}">{{$language->code}}</label>
                </div>
            @endforeach
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </div>
    </form>
@endsection