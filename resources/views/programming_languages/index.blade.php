@extends('layouts.app')

{{-- Page title --}}
@section('title', 'Programming Language List')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Programming Language</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Programming Language List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <a href="{{ route('programming_languages.create') }}" class="btn btn-success btn-sm pull-right"
                       title="Add New Programming Language">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th class="text-center">No of Developers</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programmingLanguages as $programmingLanguage)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $programmingLanguage->name }}</td>
                                <td class="text-center">{{ $programmingLanguage->developers_count }}</td>
                                <td>
                                    <a href="{{ url('programming_languages/' . $programmingLanguage->id . '/edit') }}"
                                       title="Edit Programming Language">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                  aria-hidden="true"></i> Edit
                                        </button>
                                    </a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['programming_languages', $programmingLanguage->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete Programming Language',
                                            'onclick'=>'return confirm("Confirm delete ' . $programmingLanguage->name . '?")'
                                    ]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pull-right"> {!! $programmingLanguages->render() !!} </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
