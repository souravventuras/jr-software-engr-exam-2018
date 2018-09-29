@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Developers
        <small>Details of developer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('developer.index') }}">Developer</a></li>
        <li class="active">{{ $developer->email }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Developers({{ $developer->email }})</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul>
                    <li>Email : {{ $developer->email }}</li>
                    <li>Programming Language : {{ implode(",",array_column($developer->programming->toArray(),'name'))  }}</li>
                    <li>Language : {{ implode(",",array_column($developer->language->toArray(),'code'))  }}</li>
                </ul>
                <a type="button" href="{{ route('developer.edit',$developer->id)  }}" class="btn btn-primary">Edit</a>

                  <button type="button" onclick="event.preventDefault();
                                            document.getElementById('del-form-{{ $developer->id }}').submit();" class="btn btn-danger">Delete</button>
                    {{ Form::open( ['route' =>['developer.destroy',$developer],'id'=>'del-form-'.$developer->id,'style'=>'display:none']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
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
