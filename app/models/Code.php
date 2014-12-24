<?php

class Code extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'codes';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
        $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
        $character_length = strlen($characters);

        $code = '';
        for ($i = 0; $i < 8; $i++) {
            $code .= $characters[rand(0, $character_length - 1)];
        }
            $model->code = $code;
        });
    }

    public function seat()
    {
        return $this->hasOne('Seat');
    }

    public function isClaimed()
    {
        return $this->seat ? true : false;
    }


}