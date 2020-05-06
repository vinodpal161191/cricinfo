<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Flash;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all()->toArray();
        
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagePath = '';
        if($image = $request->file('logoUri')){
            $this->validate($request, [
                'logoUri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = storage_path('app/uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
            }
            $imagename = time().'.'.$image->getClientOriginalExtension();
        
            $image->move($destinationPath, $imagename);
            $imagePath = 'uploads/'.$imagename;
        }

        $teams = new Team([
          'name' => $request->get('name'),
          'identifier' => $request->get('identifier'),
          'logoUri' => $imagePath,
          'clubState' => $request->get('clubState')
        ]);

        $teams->save();
        return redirect('/teams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        
        return view('teams.edit', compact('team','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $team = Team::find($id);
        if($image = $request->file('logoUri')){
            $this->validate($request, [
                'logoUri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = storage_path('app/uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
            }
            $imagename = time().'.'.$image->getClientOriginalExtension();
        
        $image->move($destinationPath, $imagename);
        $team->logoUri = 'uploads/'.$imagename;
        }

        $team->name = $request->get('name');
        $team->identifier = $request->get('identifier');
        $team->clubState = $request->get('clubState');
        $team->save();
        return redirect('/teams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::find($id)->delete();

        return redirect(route('teams.index'))->with('success','Team entry deleted successfully!');
    }
}
