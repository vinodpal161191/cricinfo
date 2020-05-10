@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Team') }}</div>

                <div class="card-body">
                    {!! form_start($form) !!}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                {!! form_row($form->name, $options = ['attr' => ['class' => 'form-control'], 'label' => false]); !!}

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
                                {!! form_row($form->identifier, $options = ['attr' => ['class' => 'form-control'], 'label' => false]); !!}

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
                                <!-- {!! Form::file('logoUri', array('class' => 'image')) !!} -->
                                {!! form_row($form->logoUri, $options = ['attr' => ['class' => 'form-control'], 'label' => false]) !!}
                            </div>
                            @error('logoUri')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="clubState" class="col-md-4 col-form-label text-md-right">{{ __('Club State') }}</label>

                            <div class="col-md-6">
                                {!! form_row($form->clubState, $options = ['attr' => ['class' => 'form-control'], 'label' => false]); !!}

                                @error('clubState')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! form_until($form, 'clear') !!}
                                {!! form_end($form, false) !!}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
