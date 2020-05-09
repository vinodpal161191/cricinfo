@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Team') }}</div>

                <div class="card-body">
                    {!! form_start($form) !!}
                    {!! Form::label('team1', 'Team 1') !!}
                    {!! Form::select('team1', $teams, null, ['class' => 'form-control']) !!}
                    {!! Form::label('team2', 'Opponent Team') !!}
                    {!! Form::select('team2', $teams, null, ['class' => 'form-control']) !!}
                    {!! form_row($form->location) !!}
                    {!! form_row($form->match_status) !!}
                    <br>
                    {!! form_until($form, 'clear') !!}
                    {!! form_end($form, false) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
