<?php namespace Controller\Admin;

class SeatsController extends AdminBaseController {

    public function index()
    {
        $seats = \Seat::with('user', 'code')->get();

        return \View::make('admin.seats.index')
            ->with('seats', $seats);
    }

}