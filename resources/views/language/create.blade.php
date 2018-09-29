@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Language
        <small>Add new Language</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('language.index') }}">Language</a></li>
        <li class="active">add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Language</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(['route' => 'language.store']) !!}
                    <div class="form-group">
                        {!! Form::label('code','Language Code'); !!}
                        {!! Form::text('code',null, ['class'=>'form-control']); !!}
                        @if ($errors->has('code'))
                            <strong class="help-block text-danger text-italic" style="color:firebrick">
                                {!!$errors->first('code')!!}
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
