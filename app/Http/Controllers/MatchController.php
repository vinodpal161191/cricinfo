<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;
use Flash;
use Kris\LaravelFormBuilder\FormBuilder;
use DB;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::with('team1', 'team2')->get()->toArray();
        return view('matches.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $teams = DB::table('teams')->pluck("name","id");
        $form = $formBuilder->create('App\Form\MatchForm', [
            'method' => 'POST',
            'url' => route('matches.store')
        ]);
        return view('matches.create', compact('form', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $matches = new Match([
          'team1' => $request->get('team1'),
          'team2' => $request->get('team2'),
          'location' => $request->get('location'),
          'match_status' => $request->get('match_status')
        ]);

        $matches->save();
        return redirect('/matches');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(FormBuilder $formBuilder,$id)
    {
        $match = Match::find($id);
        $teams = DB::table('teams')->pluck("name","id");
        $form = $formBuilder->create('App\Form\MatchForm', [
            'method' => 'PATCH',
            'url' => route('matches.update', $match),
            'model' => $match
        ]);
        
        return view('matches.edit', compact('form','match','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $match = Match::find($id);
        // dd($request->all());
        $match->team1 = $request->get('team1');
        $match->team2 = $request->get('team2');
        $match->location = $request->get('location');
        $match->match_status = $request->get('match_status');
        $match->save();
        return redirect('/matches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Match::find($id)->delete();

        return redirect(route('matches.index'))->with('success','Match entry deleted successfully!');
    }
}
