{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.user.layout')

@section('content')
  <div class="container">
    {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}
    <div class="col-6 mx-auto">
      <div class="block block-themed">
        <div class="block-header">
            <h3 class="block-title text-center">Reset Password</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        {{-- <div class="block-content block-content-full text-center bg-pulse-lighter">
            <img class="img-avatar img-avatar96 img-avatar-thumb" src="assets/media/avatars/avatar8.jpg" alt="">
        </div> --}}
        <div class="block-content">
          <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <div class="col-12">
                        <div class="form-material floating">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                          <label for="email">{{__('E-Mail Address')}}</label>
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form-material floating">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                          <label for="password">{{__('Password')}}</label>
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form-material floating">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Reset Password') }}
                      </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>

  </div>
@endsection
