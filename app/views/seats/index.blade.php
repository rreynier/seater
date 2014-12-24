@extends('layouts.master')

@section('content')
    @foreach($rows as $row => $seats)
        <div class="row-{{ $row }}">
            <h2>Row {{ $row }}</h2>
            <ul>
                @foreach($seats as $seat)
                    <li class="seat-{{ $seat->number }} row-{{ $row }}-seat-{{ $seat->number }}">
                        {{ $seat->number }}
                        @if($seat->user)
                            claimed
                        @else
                            unclaimed
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@stop