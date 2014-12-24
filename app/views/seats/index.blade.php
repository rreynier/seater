@extends('layouts.master')

@section('content')
<div class="seatSection">
    @foreach($rows as $row => $seats)
        <div class="seatRow seatRow-{{ $row }}">
            <div class="seatRowTitle">{{ $row }}</div>
            @foreach($seats as $seat)
                <div class="seat seat-{{ $seat->number }} row-{{ $row }}-seat-{{ $seat->number }}">
                    @if($seat->user)
                        <a href="javascript:;" class="reserved" title="{{ $seat->user->first_name }} {{ $seat->user->last_name }}" data-toggle="tooltip">{{ $row . $seat->number }}</a>
                    @else
                        <a href="javascript:;" class="reserveSeat">{{ $row . $seat->number }}</a>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@stop
