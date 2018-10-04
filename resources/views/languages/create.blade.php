@extends('layouts.app')

{{-- Page title --}}
@section('title', 'Add New Language')

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
                    Add New Language
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'languages', 'role' => 'form']) !!}

                    @include ('languages.form', ['submitButtonText' => 'Add'])

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
