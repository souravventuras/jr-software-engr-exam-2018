@extends('layouts.app')

{{-- Page title --}}
@section('title', 'Edit ' . $language->code)

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
                    Edit Language {{ $language->code }}
                </div>
                <div class="panel-body">
                    {!! Form::model($language, [
                        'method' => 'PATCH',
                        'url' => ['languages', $language->id],
                        'role' => 'form'
                    ]) !!}

                    @include ('languages.form', ['submitButtonText' => 'Update'])

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
