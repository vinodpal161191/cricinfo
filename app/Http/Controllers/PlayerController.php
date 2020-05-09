<?php

namespace App\Http\Controllers;

use App\Player;
use App\PlayerHistory;
use App\Team;
use Illuminate\Http\Request;
use Flash;
use DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::with('team')->get()->toArray();
        // dd($players);
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = DB::table('teams')->pluck("name","id");
        return view('players.create', compact('teams'));
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
        if($image = $request->file('imageUri')){
            $this->validate($request, [
                'imageUri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = storage_path('app/uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
            }
            $imagename = time().'.'.$image->getClientOriginalExtension();
        
        $image->move($destinationPath, $imagename);
        $imagePath = 'uploads/'.$imagename;
        }

        $players = new Player([
          'team_id' => $request->get('team_id'),
          'identifier' => $request->get('identifier'),
          'firstName' => $request->get('firstName'),
          'lastName' => $request->get('lastName'),
          'imageUri' => $imagePath,
          'playerJerseyNumber' => $request->get('playerJerseyNumber'),
          'country' => $request->get('country')
        ]);

        $players->save();
        // dd($players);
        $this->saveRelated($request, $players);
        return redirect('/players');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::with('playerHistory')->find($id);
        $teams = DB::table('teams')->pluck("name","id");
        
        return view('players.edit', compact('player','id','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $player = Player::find($id);
        if($image = $request->file('imageUri')){
            $this->validate($request, [
                'imageUri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = storage_path('app/uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
            }
            $imagename = time().'.'.$image->getClientOriginalExtension();
        
            $image->move($destinationPath, $imagename);
            $player->imageUri = 'uploads/'.$imagename;
        }

        $player->team_id = $request->get('team_id');
        $player->identifier = $request->get('identifier');
        $player->firstName = $request->get('firstName');
        $player->lastName = $request->get('lastName');
        $player->playerJerseyNumber = $request->get('playerJerseyNumber');
        $player->country = $request->get('country');
        $player->save();
        $this->saveRelated($request, $player);
        return redirect('/players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Player::find($id)->delete();

        return redirect(route('players.index'))->with('success','Player entry deleted successfully!');
    }

    public function saveRelated($request, $players)
    {
        $playerHistory = PlayerHistory::where('player_id', $players->id)->get();
        if($playerHistory->count()>0){
            PlayerHistory::where('player_id', $players->id)
            ->update([
                'matches' => $request->get('matches'),
                'run'  => $request->get('run'),
                'highest_score'  => $request->get('highest_score'),
                'fifties'  => $request->get('fifties'),
                'hundreds'  => $request->get('hundreds'),
            ]);
        }else{
            $playerHistoryModel = new PlayerHistory();
            $playerHistoryModel->player_id = $players->id;
            $playerHistoryModel->matches = $request->get('matches');
            $playerHistoryModel->run = $request->get('run');
            $playerHistoryModel->highest_score = $request->get('highest_score');
            $playerHistoryModel->fifties = $request->get('fifties');
            $playerHistoryModel->hundreds = $request->get('hundreds');
            $playerHistoryModel->save();
        }
        
    }
}
