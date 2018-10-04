<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', __('Code'), ['class' => 'control-label']) !!}
    {!! Form::text('code', null, ['class' => 'form-control', '']) !!}
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <div class="col-md-12">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
