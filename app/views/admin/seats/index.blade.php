@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <h1 class="page-header">Seats</h1>

            @if(count($seats) > 0)
            <table class="table table-striped table-bordered" data-toggle="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Number</td>
                        <td>Row</td>
                        <td>Claimed At</td>
                        <td>Code</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Action</td>
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