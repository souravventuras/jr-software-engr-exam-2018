@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Language
        <small>Language List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Language</a></li>
        <li class="active">List</li>
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
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th class="col-sm-8">Code</th>
                  <th class="col-sm-2">Action</th>
                </tr>

                @foreach($language AS $key=>$lang)
                    <tr>
                        <td>{{ $lang->id }}</td>
                        <td>{{ $lang->code }}</td>
                        <td>
                            <button type="button" onclick="event.preventDefault();
                                                     document.getElementById('del-form-{{ $lang->id }}').submit();" class="btn btn-danger">Delete</button>
                            {{ Form::open( ['route' =>['language.destroy',$lang],'id'=>'del-form-'.$lang->id,'style'=>'display:none']) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-center">
                {{ $language->links() }}
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
@endsection
