<?php namespace Controller\Admin;

class AdminBaseController extends \Controller {

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
