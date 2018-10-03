<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', __('Email'), ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', '']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('programming_language_ids') ? 'has-error' : ''}}">
    {!! Form::label('programming_language_ids', __('Programming Languages'), ['class' => 'control-label']) !!}
    {!! Form::select('programming_language_ids[]', $programmingLanguages, null, ['class' => 'form-control', 'id' => 'programming_language_ids', 'multiple', 'required']) !!}
    {!! $errors->first('programming_language_ids', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('language_ids') ? 'has-error' : ''}}">
    {!! Form::label('language_ids', __('Languages'), ['class' => 'control-label']) !!}
    {!! Form::select('language_ids[]', $languages, null, ['class' => 'form-control', 'id' => 'language_ids', 'multiple', 'required']) !!}
    {!! $errors->first('language_ids', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <div class="col-md-12">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@push('css')
    <link href="{{ asset('vendor/select2-4.0.6/css/select2.min.css') }}" rel="stylesheet" />
@endpush
@push('scripts')
    <script src="{{ asset('vendor/select2-4.0.6/js/select2.min.js') }}"></script>
    <script>
        $(function () {
            $('#programming_language_ids').select2({
                placeholder: 'Select Programming Language',
                allowClear: true
            });

            $('#language_ids').select2({
                placeholder: 'Select Language',
                allowClear: true
            });
        });
    </script>
@endpush
