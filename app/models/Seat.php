<?php

class Seat extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seats';

    protected $fillable = array('row', 'number');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function code()
    {
        return $this->belongsTo('Code');
    }

}