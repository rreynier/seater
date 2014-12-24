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
                            claimed by {{ $seat->user->first_name }} {{ $seat->user->last_name }}
                        @else
                            unclaimed |
                            <a href="#">claim with code</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@stop