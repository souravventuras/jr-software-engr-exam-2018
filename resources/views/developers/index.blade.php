@extends('layouts.app')

{{-- Page title --}}
@section('title', 'Developer List')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Developer</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Developer List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <a href="{{ route('developers.create') }}" class="btn btn-success btn-sm pull-right"
                       title="Add New Developer">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/developers', 'class' => 'form-inline', 'role' => 'search'])  !!}

                    <div class="form-group">
                        {!! Form::label('pl', __('Programming Language'), ['class' => 'sr-only']) !!}
                        {!! Form::select('pl', $programmingLanguages, request('pl'), ['class' => 'form-control', 'placeholder' => 'Programming Language']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('l', __('Language'), ['class' => 'sr-only']) !!}
                        {!! Form::select('l', $languages, request('l'), ['class' => 'form-control', 'placeholder' => 'Language']) !!}
                    </div>
                    {!! Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-secondary btn-sm']) !!}

                    {!! Form::close() !!}
                    <br>
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Programming Languages</th>
                            <th>Languages</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($developers as $developer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $developer->email }}</td>
                                <td>{{ implode(', ', $developer->programming_language_names) }}</td>
                                <td>{{ implode(', ', $developer->language_codes) }}</td>
                                <td>
                                    <a href="{{ url('developers/' . $developer->id . '/edit') }}"
                                       title="Edit Developer">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                  aria-hidden="true"></i> Edit
                                        </button>
                                    </a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['developers', $developer->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete Developer',
                                            'onclick'=>'return confirm("Confirm delete ' . $developer->email . '?")'
                                    ]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pull-right"> {!! $developers->render() !!} </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@push('css')
    <link href="{{ asset('vendor/select2-4.0.6/css/select2.min.css') }}" rel="stylesheet" />
@endpush
@push('scripts')
    <script src="{{ asset('vendor/select2-4.0.6/js/select2.min.js') }}"></script>
    <script>
        $(function () {
            $('#pl').select2({
                placeholder: 'Programming Language',
                allowClear: true
            });

            $('#l').select2({
                placeholder: 'Language',
                allowClear: true
            });
        });
    </script>
@endpush
