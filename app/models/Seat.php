<?php

class Seat extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seats';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function code()
    {
        return $this->belongsTo('Code');
    }

}