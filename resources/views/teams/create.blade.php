@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Team') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="identifier" type="text" class="form-control @error('identifier') is-invalid @enderror" name="identifier" value="{{ old('identifier') }}" required autocomplete="identifier" autofocus>

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
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clubState" class="col-md-4 col-form-label text-md-right">{{ __('Club State') }}</label>

                            <div class="col-md-6">
                                <input id="clubState" type="text" class="form-control @error('clubState') is-invalid @enderror" name="clubState" value="{{ old('clubState') }}" required autocomplete="clubState" autofocus>

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
                                    {{ __('Save') }}
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
