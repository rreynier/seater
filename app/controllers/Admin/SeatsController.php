<?php namespace Controller\Admin;

class SeatsController extends AdminBaseController {

    public function index()
    {
        $seats = \Seat::with('user', 'code')->get();

        return \View::make('admin.seats.index')
            ->with('seats', $seats);
    }

    public function unreserveSeat($id)
    {
        $seat = \Seat::find($id);
        $seat->user_id = null;
        $seat->code_id = null;
        $seat->claimed_at = null;
        $seat->save();

        \Session::flash('message', 'Successfully unreserved!');
        return \Redirect::to('admin/seats');
    }

}