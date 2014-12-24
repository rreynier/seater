@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <h1 class="page-header">Codes</h1>

            <p><a class="btn btn-primary" href="/admin/codes/create" role="button">Create</a></p>

            @if(count($codes) > 0)
            <table class="table table-striped table-bordered" data-toggle="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Code</td>
                        <td>Email</td>
                        <td>Created At</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($codes as $key => $code)
                    <tr>
                        <td>{{ $code->id }}</td>
                        <td>{{ $code->code }}</td>
                        <td>{{ $code->email }}</td>
                        <td>{{ $code->created_at }}</td>
                        <td>
                            {{ Form::open(array('url' => 'admin/codes/' . $code->id, 'class' => 'pull-left confirm-destroy-js')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-warning')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>No codes have been added.</p>
            @endif

        </div>
    </div>

@stop