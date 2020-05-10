@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md-6 offset-md-4">
                <h2>{{ __('Points Table') }}</h2>
            </div>
        </div>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Team 1</th>
        <th>No. of Matches</th>
        <th>Won</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody>
      @foreach($teams as $team)
      <tr>
        <td>@if($team->logoUri)
                <a href="{{ route('players.index', ['team_id' => $team->id]) }}"><img src="<?php echo url('image-factory').'/'.$team->logoUri; ?>" width="30" height="30"></a>
            @endif
            <a href="{{ route('players.index', ['team_id' => $team->id]) }}">{{$team->name}}</a></td>
        <td>{{$teamModel->matchCount($team->id)}}</td>
        <td>{{$team->wins}}</td>
        <td>{{$team->wins*2}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
