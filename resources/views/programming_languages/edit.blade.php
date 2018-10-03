@extends('layouts.app')

{{-- Page title --}}
@section('title', 'Edit Programming Language ' . $programmingLanguage->name)

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
                    Edit Programming Language {{ $programmingLanguage->name }}
                </div>
                <div class="panel-body">
                    {!! Form::model($programmingLanguage, [
                        'method' => 'PATCH',
                        'url' => ['programming_languages', $programmingLanguage->id],
                        'role' => 'form'
                    ]) !!}

                    @include ('programming_languages.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection
