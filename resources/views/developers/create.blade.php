@extends('layouts.app')

{{-- Page title --}}
@section('title', 'Add New Developer')

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
                    Add New Developer
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'developers', 'role' => 'form']) !!}

                    @include ('developers.form', ['submitButtonText' => 'Add'])

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
