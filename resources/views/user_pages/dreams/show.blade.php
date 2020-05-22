@extends('layouts.user.layout')

@section('content')
  <div class="container" style="text-align: center">
    <div class="block">
        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#btabs-static-home">{{$dream->date}}</a>
            </li>

        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active" id="btabs-static-home" role="tabpanel">
                <h4 class="font-w400">{{$dream->title}}</h4>
                <p>{{$dream->content}}</p>
            </div>

        </div>
        <a type="button" class="btn btn-outline-info" href="/dream/{{$dream->id}}/edit">Any changes?</a>
    </div>
  </div>

@endsection
