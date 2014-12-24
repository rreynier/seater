<?php

class SeatsController extends BaseController {

	public function index()
	{
        $seats = Seat::with('user', 'code')->get();
        $rows = $this->organizeSeats($seats);

        return View::make('seats.index')->with('rows', $rows);;
	}

    private function organizeSeats($seats) {
        $rows = array();

        foreach($seats as $seat) {
            if(!isset($rows[$seat->row])) $rows[$seat->row] = array();
            $rows[$seat->row][$seat->number] = $seat;
        }

        return $rows;
    }

}
