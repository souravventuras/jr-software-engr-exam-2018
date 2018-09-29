@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Developers
        <small>All developers with pagination</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('developer.index') }}">Developer</a></li>
        <li class="active">Search</li>
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
                <div class="col-sm-12">
                    <form class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" name="programming" id="programming" value="{{ isset($form_data['programming'])?$form_data['programming']:'' }}" placeholder="Programming language">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="language"  id="language" placeholder="Language" value="{{ isset($form_data['language'])?$form_data['language']:'' }}">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                    <a class="btn btn-default" href="{{ route('SearchDeveloper') }}">Clear Search</a>
                    </form>
                </div>
                <div class="col-sm-12">
                    <table class="table table-bordered">
                      <tr>
                        <th style="width: 10px">#</th>
                        <th class="col-sm-4">Email</th>
                        <th class="col-sm-4">Programming Language</th>
                        <th class="col-sm-2">Language</th>
                        <th class="col-sm-2">Action</th>
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
