@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <h1 class="page-header">Codes</h1>

            <p><a class="btn btn-primary" href="/admin/codes/create" role="button">Create</a></p>

            @if(count($codes) > 0)
            <table class="table table-striped table-bordered" data-toggle="table" data-search="true" data-sort-name="id" data-sort-order="desc">
                <thead>
                    <tr>
                        <th data-field="id" data-sortable="true">ID</th>
                        <th data-field="code" data-sortable="true">Code</th>
                        <th data-field="email" data-sortable="true">Email</th>
                        <th data-field="created_at" data-sortable="true">Created At</th>
                        <th>Claimed</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($codes as $key => $code)
                    <tr>
                        <td>{{ $code->id }}</td>
                        <td>{{ $code->code }}</td>
                        <td>{{ $code->email }}</td>
                        <td>{{ $code->created_at }}</td>
                        <td class="{{ $code->isClaimed() ? "success" : "warning" }}">{{ $code->isClaimed() ? "yes" : "no" }}</td>
                        <td>
                            @if(! $code->isClaimed())
                                {{ Form::open(array('url' => 'admin/codes/' . $code->id, 'class' => 'pull-left confirm-destroy-js')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-warning')) }}
                                {{ Form::close() }}
                            @endif
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
