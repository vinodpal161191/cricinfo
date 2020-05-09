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
                <a class="nav-link" href="{{ route('matches.create') }}">{{ __('Add Match') }}</a>
            </div>
        </div>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Team 1</th>
        <th>Opponent Team</th>
        <th>Location</th>
        <th>Match Status</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($matches as $match)
      <tr>
        <td>{{$match['team1']['name']}}</td>
        <td>{{$match['team2']['name']}}</td>
        <td>{{$match['location']}}</td>
        <td>{{$match['match_status']}}</td>
        <td><a href="{{ route('matches.edit', $match['id']) }}" style="background-color: #4CAF50;border: none;
  color: white;
  padding: 8px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Edit</a></td>
        <td>
            <form action="{{ route('matches.destroy', $match['id']) }}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button class="btn btn-danger" data-confirm="Are you sure?">Delete Match</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
