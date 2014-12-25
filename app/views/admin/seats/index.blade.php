@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <h1 class="page-header">Seats</h1>

            @if(count($seats) > 0)
            <table class="table table-striped table-bordered" data-toggle="table" data-search="true">
                <thead>
                    <tr>
                        <th data-field="id" data-sortable="true">ID</th>
                        <th data-field="number" data-sortable="true">Number</th>
                        <th data-field="row" data-sortable="true">Row</th>
                        <th data-field="claimed_at" data-sortable="true">Claimed At</th>
                        <th data-field="code" data-sortable="true">Code</th>
                        <th data-field="first_name" data-sortable="true">First Name</th>
                        <th data-field="last_name" data-sortable="true">Last Name</th>
                        <th data-field="email" data-sortable="true">Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($seats as $key => $seat)
                    <tr class="{{ $seat->code ? 'success' : 'warning' }}">
                        <td>{{ $seat->id }}</td>
                        <td>{{ $seat->number }}</td>
                        <td>{{ $seat->row }}</td>
                        <td>{{ $seat->code ? $seat->claimed_at : 'n/a' }}</td>
                        <td>{{ $seat->code ? $seat->code->code : 'n/a' }}</td>
                        <td>{{ $seat->user ? $seat->user->first_name : 'n/a' }}</td>
                        <td>{{ $seat->user ? $seat->user->last_name : 'n/a' }}</td>
                        <td>{{ $seat->user ? $seat->user->email : 'n/a' }}</td>
                        <td>{{ $seat->user ? $seat->user->phone : 'n/a' }}</td>
                        <td>
                            @if($seat->code)
                                {{ Form::open(array('url' => 'admin/seats/unreserve/' . $seat->id, 'class' => 'pull-left confirm-destroy-js')) }}
                                    {{ Form::submit('Unreserve', array('class' => 'btn btn-xs btn-warning')) }}
                                {{ Form::close() }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>No seats have been added.</p>
            @endif

        </div>
    </div>

@stop
