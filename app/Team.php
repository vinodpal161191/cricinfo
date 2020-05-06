<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'identifier', 'logoUri', 'clubState',
    ];

    public function players()
    {
        return $this->hasMany('App\Player');
    }
}
