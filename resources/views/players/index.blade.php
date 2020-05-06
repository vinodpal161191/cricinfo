@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="col-md-6 offset-md-4">
                <a class="nav-link" href="{{ route('players.create') }}">{{ __('Add Player') }}</a>
            </div>
        </div>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Identifier</th>
        <th>Picture</th>
        <th>Jersey Number</th>
        <th>Country</th>
        <th>Team</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($players as $player)
      <tr>
        <td>{{$player['firstName']}} {{$player['lastName']}}</td>
        <td>{{$player['identifier']}}</td>
        <td>@if($player['imageUri'])
                <img src="<?php echo url('image-factory').'/'.$player['imageUri']; ?>" width="150" height="150">
            @endif
        </td>
        <td>{{$player['playerJerseyNumber']}}</td>
        <td>{{$player['country']}}</td>
        <td>{{$player['team']['name']}}</td>
        <td><a href="{{ route('players.edit', $player['id']) }}" style="background-color: #4CAF50;border: none;
  color: white;
  padding: 8px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Edit</a></td>
        <td>
            <form action="{{ route('players.destroy', $player['id']) }}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button class="btn btn-danger" data-confirm="Are you sure?">Delete Player</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
