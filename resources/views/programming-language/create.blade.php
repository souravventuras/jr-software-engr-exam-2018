@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Programming Language
        <small>Add new Language</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('programming-language.index') }}">Programming Language</a></li>
        <li class="active">add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Programming language</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(['route' => 'programming-language.store']) !!}
                    <div class="form-group">
                        {!! Form::label('name','Language Name'); !!}
                        {!! Form::text('name',null, ['class'=>'form-control']); !!}
                        @if ($errors->has('name'))
                            <strong class="help-block text-danger text-italic" style="color:firebrick">
                                {!!$errors->first('name')!!}
                            </strong>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
@endsection
