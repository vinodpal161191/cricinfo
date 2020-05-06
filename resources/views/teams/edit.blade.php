@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Team') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('teams.update', $id) }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$team->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="identifier" class="col-md-4 col-form-label text-md-right">{{ __('Identifier') }}</label>

                            <div class="col-md-6">
                                <input id="identifier" type="text" class="form-control @error('identifier') is-invalid @enderror" name="identifier" value="{{ $team->identifier }}" required autocomplete="identifier" autofocus>

                                @error('identifier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logoUri" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                {!! Form::file('logoUri', array('class' => 'image')) !!}
                                @if($team['logoUri'])
                                    <img src="<?php echo url('image-factory').'/'.$team['logoUri']; ?>" width="150" height="150">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clubState" class="col-md-4 col-form-label text-md-right">{{ __('Club State') }}</label>

                            <div class="col-md-6">
                                <input id="clubState" type="text" class="form-control @error('clubState') is-invalid @enderror" name="clubState" value="{{ $team->clubState }}" required autocomplete="clubState" autofocus>

                                @error('clubState')
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
