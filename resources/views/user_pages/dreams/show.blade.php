@extends('layouts.user.layout')

@section('content')
  <div class="container" style="text-align: center">
    {{-- style="border-style: solid; border-color: {{$dream->color->hex}} --}}
    <div class="block" style="border-style: solid; border-color: {{$dream->color->hex}}">
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
          @if(!empty($dream->attatchment[0]))
            <img src="{{asset("dream_images/". $dream->attatchment[0]->location ."")}}">
          @endif
        </div>

        <div class="row justify-content-center text-center">
                          <div class="col-md-6">

                              <div class="block">
                                <hr></hr>
                                  <div class="block-content">
                                      <label>Extra Content</labe>
                                        <br>

                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">

                            <div class="col-4">

                                        <label>The color you have assigned to the Dream is <b style="color: {{$dream->color->hex}};"> {{$dream->color->name}}</b></label>

                            </div>
                            <div class="col-4">

                                        <label>The emotion that you felt was <b>{{$dream->emotion->name}}</b></label>

                            </div>
                            <div class="col-4">

                                        <label>The mood did you felt <b>{{$dream->mood->name}}</b></label>

                            </div>
                            <div class="col-4">

                                        <label>The technique that you used was: <b>{{$dream->technique->name}}</b></label>

                            </div>
                            <div class="col-4">

                                        <label>The type of dream <b>{{$dream->type->name}}</b></label>

                            </div>

                      </div>
        <a type="button" class="btn btn-outline-info" href="/dream/{{$dream->id}}/edit" style="margin-top: 10px; margin-bottom: 10px">Any changes?</a>
    </div>

  </div>


@endsection
