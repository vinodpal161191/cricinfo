<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'identifier', 'firstName', 'lastName', 'imageUri', 'playerJerseyNumber', 'country',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
