<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Flash;
use DB;
use Menu;

class PointsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Menu::get('breadcrumbs')->raw('<span>Points Table</span>')->active();
        $teams = Team::all()->toArray();
        $teams = DB::table('teams')
                ->leftJoin('matches', function($join){ 
                    $join->on('teams.id', '=', 'matches.team1');
                    // ->on('teams.id', '=', 'matches.team1')
                    $join->on('matches.match_status', '=', DB::raw("1"));
                    $join->orOn('teams.id', '=', 'matches.team2');
                    $join->on('matches.match_status', '=', DB::raw("2"));
                })
                ->groupBy('teams.id')
                ->orderBy('wins', 'DESC')
                ->select('teams.id','teams.name','teams.logoUri', DB::raw('count(matches.match_status) as wins'))
                ->get();
                // dd($teams);
        $teamModel = new Team();
        
        return view('points.index', compact('teams', 'teamModel'));
    }

}
