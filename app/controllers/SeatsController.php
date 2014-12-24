<?php

class SeatsController extends BaseController {

	public function index()
	{
        $seats = Seat::with('user', 'code')->get();
        $rows = $this->organizeSeats($seats);

        return View::make('seats.index')->with('rows', $rows);;
	}

    public function reserveSeat() {
        // Find the seat we are trying to reserve
        $seat = Seat::findOrFail(Input::get('seat_id'));

        // Check if seat is already reserved
        if($seat->code) {
            return json_encode(array('error' => 'seat_already_reserved'));
        }

        // General input validation
        $validator = Validator::make(Input::all(), array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ));

        if ($validator->fails()) {
            return json_encode($validator->messages());
        }

        // Get code record based on user input
        $code = Code::where('code', Input::get('code'))->first();

        // Check if code is valid
        if(! $code) {
            return json_encode(array('error' => 'invalid_code'));
        }

        // Check if is claimed
        if($code->isClaimed()) {
            return json_encode(array('error' => 'code_already_claimed'));
        }

        $user = User::where('email', Input::get('email'))->first();

        // Check if user already exists, and if not create it.
        if(! $user) {
            $user = User::create([
                'first_name' => Input::get('first_name'),
                'last_name' => Input::get('last_name'),
                'email' => Input::get('email'),
                'phone' => Input::get('phone'),
                'role' => 'user'
            ]);
        }

        // Persist the reservation of the seat
        $seat->user_id = $user->id;
        $seat->code_id = $code->id;
        $seat->claimed_at = Carbon\Carbon::now()->toDateTimeString();
        $seat->save();

        return json_encode(array('success' => true));

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
