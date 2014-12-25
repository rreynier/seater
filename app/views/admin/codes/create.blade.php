@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            {{ HTML::ul($errors->all()) }}

            {{ Form::open(array('url' => 'admin/codes')) }}

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('code', 'Code') }}
                    {{ Form::text('code', Input::old('code'), array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}

        </div>
    </div>

@stop