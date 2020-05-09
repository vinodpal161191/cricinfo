<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Match;

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

    public function matchCount($teamId){
        echo $matchCount = Match::where('team1', '=', $teamId)
        ->orWhere('team2', '=', $teamId)
        ->count();
    }

}
