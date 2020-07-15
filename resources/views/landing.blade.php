@extends('layouts.simple')

@section('content')
    <!-- Hero -->
  <div class="bg-image" style="background-image: url('media/photos/photo2@2x.jpg')">
        <div class="hero bg-primary-dark-op">

            <div class="hero-inner">
                <div class="content content-full text-center">
                    <div class="pt-100 pb-150">
                        <h1 class="font-w700 display-4 mt-20 invisible" data-toggle="appear" data-timeout="50">
                            Welcome to <span class="font-w300 text-pulse">MyDailyDreams!</span>
                        </h1>
                        <h2 class="h3 font-w400 text-muted mb-50 invisible" data-toggle="appear" data-class="animated fadeInDown" data-timeout="300">
                            Here you can write your dreams!
                        </h2>
                        <div class="invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300">
                            <a class="btn btn-rounded btn-outline-info min-width-125 mb-10" href="/login"> Login
                            </a>
                            <a class="btn btn-rounded btn-outline-success min-width-125 mb-10" href="/register"> Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
@endsection
