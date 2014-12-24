<?php namespace Controller\Admin;

class AdminBaseController extends \Controller {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'admin.layouts.master';

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = \View::make($this->layout);
        }
    }

}
