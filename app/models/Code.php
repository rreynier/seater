<?php

class Code extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'codes';

    public function seat()
    {
        return $this->hasOne('Seat');
    }

    public function isClaimed()
    {
        return $this->seat ? true : false;
    }


}