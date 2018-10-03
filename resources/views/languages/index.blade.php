@extends('layouts.app')

{{-- Page title --}}
@section('title', 'Language List')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Language</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Language List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <a href="{{ route('languages.create') }}" class="btn btn-success btn-sm pull-right"
                       title="Add New Language">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>No of Developers</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $language->code }}</td>
                                <td class="text-center">{{ $language->developers_count }}</td>
                                <td>
                                    <a href="{{ url('languages/' . $language->id . '/edit') }}" title="Edit Language">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                  aria-hidden="true"></i> Edit
                                        </button>
                                    </a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['languages', $language->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete Language',
                                            'onclick'=>'return confirm("Confirm delete ' . $language->code . '?")'
                                    ]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pull-right"> {!! $languages->render() !!} </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
