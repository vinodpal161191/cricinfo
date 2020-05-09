<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerHistory extends Model
{

	protected $table = 'players_history';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'matches', 'run', 'highest_score', 'fifties', 'hundreds',
    ];

    public function player()
    {
        return $this->belongsTo('App\Player');
    }
}
