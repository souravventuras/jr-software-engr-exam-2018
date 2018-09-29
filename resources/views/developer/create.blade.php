@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Developers
        <small>Add new developer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('developer.index') }}">Developer</a></li>
        <li class="active">add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Developers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(['route' => 'developer.store']) !!}
                    <div class="form-group">
                        {!! Form::label('email','Email Address'); !!}
                        {!! Form::email('email',null, ['class'=>'form-control']); !!}
                        @if ($errors->has('email'))
                            <strong class="help-block text-danger text-italic" style="color:firebrick">
                                {!!$errors->first('email')!!}
                            </strong>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('programming_language_id','Programming Language'); !!}
                        {!! Form::select('programming_language_id[]', $programming_language,null,['class'=>'form-control','multiple'=>'multiple']); !!}
                        @if ($errors->has('programming_language_id'))
                            <strong class="help-block text-danger text-italic" style="color:firebrick">
                                {!!$errors->first('programming_language_id')!!}
                            </strong>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('language_id','Language'); !!}
                        {!! Form::select('language_id[]', $language,null,['class'=>'form-control','multiple'=>'multiple']); !!}
                        @if ($errors->has('language_id'))
                            <strong class="help-block text-danger text-italic" style="color:firebrick">
                                {!!$errors->first('language_id')!!}
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
