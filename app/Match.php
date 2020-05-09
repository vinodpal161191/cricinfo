<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team1', 'team2', 'location', 'match_status',
    ];

    public function team1()
    {
        return $this->belongsTo('App\Team', 'team1', 'id');
    }

    public function team2()
    {
        return $this->belongsTo('App\Team', 'team2', 'id');
    }
}
