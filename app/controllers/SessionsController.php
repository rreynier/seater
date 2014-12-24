<?php

class SessionsController extends BaseController {

    public function create()
    {
        return View::make('sessions.create');
    }

    public function store()
    {
        $user_data = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        $user = User::where('email', Input::get('email'))->first();

        if (Auth::attempt($user_data) && $user->role === 'admin') {
            return Redirect::intended('/');
        }

        return Redirect::route('sessions.create')
            ->withInput()
            ->with('login_errors', true);
    }

    public function destroy()
    {
        Auth::logout();

        return Redirect::to('/');
    }

}