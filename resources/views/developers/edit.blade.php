@extends('layouts.app')

{{-- Page title --}}
@section('title', 'Developer ' . $developer->email)

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
                    Edit Developer {{ $developer->email }}
                </div>
                <div class="panel-body">
                    {!! Form::model($developer, [
                        'method' => 'PATCH',
                        'url' => ['developers', $developer->id],
                        'role' => 'form'
                    ]) !!}

                    @include ('developers.form', ['submitButtonText' => 'Update'])

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
