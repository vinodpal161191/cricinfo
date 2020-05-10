<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use Flash;
use Menu;
use Kris\LaravelFormBuilder\FormBuilder;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Menu::get('breadcrumbs')->raw('<span>Teams</span>')->active();
        $teams = Team::orderBy('id', 'DESC')->paginate(10);
        
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Form\TeamForm', [
            'method' => 'POST',
            'url' => route('teams.store')
        ]);
        return view('teams.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $imagePath = '';
        if($image = $request->file('logoUri')){
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
    public function edit(FormBuilder $formBuilder, $id)
    {
        $team = Team::find($id);
        $form = $formBuilder->create('App\Form\TeamForm', [
            'method' => 'PATCH',
            'url' => route('teams.update', $team),
            'model' => $team
        ]);
        
        return view('teams.edit', compact('team','id','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {

        $team = Team::find($id);
        if($image = $request->file('logoUri')){
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
