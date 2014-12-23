<?php

class SessionController extends BaseController {

    public function create()
    {
        return View::make('session.create');
    }

    public function store()
    {
        $user_data = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );


        if (Auth::attempt($user_data)) {
            return Redirect::intended('/');
        }

        return Redirect::route('session.create')
            ->withInput()
            ->with('login_errors', true);
    }

    public function destroy()
    {
        Auth::logout();

        return Redirect::to('/');
    }

}