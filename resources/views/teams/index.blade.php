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
                <a class="nav-link" href="{{ route('teams.create') }}">{{ __('Add Teams') }}</a>
            </div>
        </div>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Identifier</th>
        <th>Logo</th>
        <th>Club State</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($teams as $team)
      <tr>
        <td><a href="{{ route('players.index', ['team_id' => $team['id']]) }}">{{$team['name']}}</a></td>
        <td>{{$team['identifier']}}</td>
        <td>@if($team['logoUri'])
                <a href="{{ route('players.index', ['team_id' => $team['id']]) }}"><img src="<?php echo url('image-factory').'/'.$team['logoUri']; ?>" width="150" height="150"></a>
            @endif
        </td>
        <td>{{$team['clubState']}}</td>
        <td><a href="{{ route('teams.edit', $team['id']) }}" style="background-color: #4CAF50;border: none;
  color: white;
  padding: 8px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Edit</a></td>
        <td>
            <form action="{{ route('teams.destroy', $team['id']) }}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button class="btn btn-danger" data-confirm="Are you sure?">Delete Team</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $teams->links() !!}
  </div>
@endsection
