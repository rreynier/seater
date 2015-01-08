@extends('layouts.master')

@section('content')

<a href="http://clutchcon.com" class="leadBanner">
    <img src="/assets/images/clutchConLogo.png" alt="Clutch Gaming Arena" >
</a>

<div class="seatHeader">
    <h1>Welcome to the seat reservation system for Clutch Con 2015!</h1>

    <p>Open seats are shown below in <span class="blueExample">blue</span>
    squares while seats which have been reserved will show as
    <span class="redExample">red</span> squares. Click an open seat and fill out the
    required information to reserve your spot today!</p>

    <p>Once you purchase your ticket online, wait for your second email "shipping"
    confirmation before accessing the seat reservation system. The "code" needed
    to select a seat is the "order number" listed in your email ticket confirmation
    with the number "1" at the end. If you have two or more tickets, add a "2" after
    the code for your second ticket and "3" after the third, etc.</p>

    <p>If you haven't picked up your tickets yet,
    <a href="http://mkt.com/clutch-gaming-arena/csgo-tournament">Click Here</a>.</p>

    <h2>Find your game!</h2>
    <p>To help you generally sit next to people playing your favorite game, the attached Clutch Con map provides suggested seating areas and examples of popular games in that genre. Of course these are just for general reference and you're welcome to sit wherever you like!</p>
    <img class="gameLocations" src="/assets/images/gameLocations.jpg" />

</div>

<h2>Pick Your Seat!</h2>
<h3 class="stage">Main Stage</h3>

<div class="seatSection">
    @foreach($rows as $row => $seats)
        <div class="seatRow seatRow-{{ $row }}">
            <div class="seatRowTitle">{{ $row }}</div>
            @foreach($seats as $seat)
                <div class="seat seat-{{ $seat->id }}">
                    @if($seat->user)
                        <a href="javascript:;" class="reserved" title="{{ $seat->user->getPrivateName() }}" data-toggle="tooltip">{{ $row . $seat->number }}</a>
                    @else
                        <a href="#reserveModal" class="reserveSeat" data-toggle="modal" data-seatid="{{ $seat->id }}" data-row="{{ $row }}" data-seat="{{ $seat->number }}">{{ $row . $seat->number }}</a>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<div class="modal fade" id="reserveModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Reserve Seat <span class="seatLabel"></span></h4>
            </div>
            <form id="reserveForm" method="post" action="javascript:;">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="phone">Phone</label>
                        <input type="tel" name="phone" class="form-control" placeholder="(555) 345-6789" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="code">Reservation Code</label>
                        <input type="text" name="code" class="form-control" placeholder="123CDEFG" required>
                        <span id="code-error" class="help-block"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="seat_id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Reserve Seat <span class="seatLabel"></span></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Seat Reservation Confirmation</h4>
            </div>
            <form id="reserveForm" method="post" action="javasript:;">
                <div class="modal-body">
                    <p>Seat <strong><span class="seatLabel"></span></strong> has been successfully reserved for <strong><span class="personLabel"></span></strong>.</p>
                    <p>If you have other reservation codes to claim, you may click "Done" to return back to the seat selection. Otherwise, you may leave this page at any time.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
