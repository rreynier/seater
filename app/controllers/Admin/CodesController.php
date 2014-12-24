<?php namespace Controller\Admin;

class CodesController extends AdminBaseController {

    public function index()
    {
        $codes = \Code::all();

        return \View::make('admin.codes.index')
            ->with('codes', $codes);
    }

    public function create()
    {
        return \View::make('admin.codes.create');
    }

    public function store()
    {
        $validator = \Validator::make(\Input::all(), array(
            'email' => 'required|email|unique:users'
        ));

        if ($validator->fails()) {
            return \Redirect::to('admin/codes/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $code = new \Code;
            $code->email = \Input::get('email');
            $code->save();

            \Session::flash('message', 'Successfully created a Code!');
            return \Redirect::to('admin/codes');
        }
    }

    public function show()
    {

    }

    public function destroy($id)
    {
        $nerd = \Code::find($id);
        $nerd->delete();

        \Session::flash('message', 'Successfully deleted the Code!');
        return \Redirect::to('admin/codes');
    }

}