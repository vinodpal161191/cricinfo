@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Player') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('players.update', $id) }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="teamId" class="col-md-4 col-form-label text-md-right">{{ __('First teamId') }}</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="team_id" class="form-control" style="width:250px">
                                        <option value="">--- Select Team ---</option>
                                        @foreach ($teams as $key => $value)
                                        <option value="{{ $key }}" @if($player->team_id ==$key)
                                        selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First firstName') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ $player->firstName }}" required autocomplete="firstName" autofocus>

                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last lastName') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $player->lastName }}" required autocomplete="lastName" autofocus>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="identifier" class="col-md-4 col-form-label text-md-right">{{ __('Identifier') }}</label>

                            <div class="col-md-6">
                                <input id="identifier" type="text" class="form-control @error('identifier') is-invalid @enderror" name="identifier" value="{{ $player->identifier }}" required autocomplete="identifier" autofocus>

                                @error('identifier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imageUri" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                {!! Form::file('imageUri', array('class' => 'image')) !!}
                                @if($player['imageUri'])
                                    <img src="<?php echo url('image-factory').'/'.$player['imageUri']; ?>" width="150" height="150">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="playerJerseyNumber" class="col-md-4 col-form-label text-md-right">{{ __('Player Jersey Number') }}</label>

                            <div class="col-md-6">
                                <input id="playerJerseyNumber" type="text" class="form-control @error('playerJerseyNumber') is-invalid @enderror" name="playerJerseyNumber" value="{{ $player->playerJerseyNumber }}" required autocomplete="playerJerseyNumber" autofocus>

                                @error('playerJerseyNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $player->country }}" required autocomplete="country" autofocus>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="matches" class="col-md-4 col-form-label text-md-right">{{ __('Matches') }}</label>

                            <div class="col-md-6">
                                <input id="matches" type="number" min="0" class="form-control @error('matches') is-invalid @enderror" name="matches" value="{{ $player->playerHistory->matches }}" required autocomplete="matches" autofocus>

                                @error('matches')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="run" class="col-md-4 col-form-label text-md-right">{{ __('Run') }}</label>

                            <div class="col-md-6">
                                <input id="run" type="number" min="0" class="form-control @error('run') is-invalid @enderror" name="run" value="{{ $player->playerHistory->run }}" required autocomplete="run" autofocus>

                                @error('run')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
