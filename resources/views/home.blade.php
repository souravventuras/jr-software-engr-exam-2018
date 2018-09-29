@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Developers
        <small>All developers with pagination</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Developer</a></li>
        <li class="active">List</li>
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
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th class="col-sm-2">Email</th>
                  <th class="col-sm-6">Programming Language</th>
                  <th class="col-sm-2">Language</th>
                  <th style="width: 40px">Action</th>
                </tr>

                @foreach($developers AS $key=>$dev)
                    <tr>
                        <td>{{ $dev->id }}</td>
                        <td>{{ $dev->email }}</td>
                        <td>{{ implode(",",array_column($dev->programming->toArray(),'name'))  }}</td>
                        <td>{{ implode(",",array_column($dev->language->toArray(),'code'))  }}</td>
                        <td>
                            <a type="button" href="{{ route('developer.edit',$dev->id)  }}" class="btn btn-primary">Edit</a>
                            <button type="button" onclick="event.preventDefault();
                                                     document.getElementById('del-form-{{ $dev->id }}').submit();" class="btn btn-danger">Delete</button>
                            {{ Form::open( ['route' =>['developer.destroy',$dev],'id'=>'del-form-'.$dev->id,'style'=>'display:none']) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                            {!! Form::close() !!}


                            <a type="button" href="{{ route('developer.show', ['developer' => $dev->id])  }}" class="btn btn-info">Info</a>
                        </td>
                    </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-center">
                {{ $developers->links() }}
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
@endsection
