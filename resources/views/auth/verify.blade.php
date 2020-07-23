@extends('layouts.user.layout')

@section('css_before')

  <style>
    body{
      overflow-y: hidden;
    }
  </style>

@endsection

@section('content')
<div class="container">
  <div class="block block-rounded block-bordered">
    <div class="block-header block-header-default">
        <h3 class="block-title text-center">{{ __('Verify Your Email Address') }}</h3>
    </div>
    <div class="block-content">


                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>

        </div>
    </div>
  </div>


@endsection
