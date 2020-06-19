@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
  <div class="container" style="text-align: center">
    {{-- style="border-style: solid; border-color: {{$dream->color->hex}} --}}
    <div class="block" style="@if(!empty($dream->color_id))border-style: solid; border-color: {{$dream->color->hex}} @endif">
        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#btabs-static-home">{{$dream->date}}</a>
            </li>

        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active" id="btabs-static-home" role="tabpanel">
                <h4 class="font-w400">
                  @if(!empty($dream->title))
                      {{$dream->title}}
                  @else
                    <p>No title</p>
                  @endif
                  <div class="col-6 mx-auto">
                    <hr>
                  </div>
                </h4>

                <div class="col-md-12">

                    <!-- SimpleMDE Container -->
                    <textarea class="js-simplemde" id="textarea" name="content">@if(!empty($dream->content)) {{$dream->content}} @else No content @endif</textarea>
                </div>


            </div>

        </div>

        <div class="row justify-content-center text-center">
                          <div class="col-md-6">

                              <div class="block">
                                <hr></hr>
                                  <div class="block-content">
                                      <label>Extra Content</labe>
                                        <hr>

                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">

                                <div class="col-md-4">
                                  <p> It @if($dream->isFirstPerson())
                                    <b>was</b> in first person</p>
                                      @else
                                    <b>wasn't</b>  in first person</p>


                                  @endif

                                </div>
                                @if(!empty($dream->color_id))
                                  <div class="col-4">
                                        <label>The color you have assigned to the Dream is <b style="color: {{$dream->color->hex}};"> {{$dream->color->name}}</b></label>
                                      </div>
                                @endif

                              @if(!empty($dream->emotion))
                                <div class="col-4">
                                        <label>The emotion that you felt was: <b>{{$dream->emotion->name}}</b></label>
                                </div>
                              @endif

                              @if(!empty($dream->mood_id))
                                <div class="col-4">
                                        <label>The mood did you felt: <b>{{$dream->mood->name}}</b></label>
                                </div>
                              @endif

                              @if(!empty($dream->technique_id))
                                <div class="col-4">
                                        <label>The technique that you used was: <b>{{$dream->technique->name}}</b></label>
                                </div>
                              @endif


                              @if(!empty($dream->type_id))
                                <div class="col-4">
                                        <label>The type of dream: <b>{{$dream->type->name}}</b></label>
                                </div>
                              @endif
                              @if(!empty($dream->tags[0]))
                                <div class="col-4">
                                  <label>Tag of dream:

                                  @foreach ($dream->tags as $tag)
                                    {{-- Check if last --}}
                                      <b>{{$tag->name}}, </b>

                                  @endforeach
                                </label>
                                </div>
                              @endif

                            <br>
                      </div>

                      @if(!empty($dream->attatchment))
                      <div class="row">
                        <div class="col-12 text-center">
                          <label>Files</label>
                          <hr style="width:40%">
                        </div>
                      </div>
                        <div class="row">
                          @foreach ($dream->attatchment as $attatchment)
                          <div class="col-4">
                            <a href="{{asset("dream_images/".$attatchment->location."")}}">
                              <img src="{{asset("dream_images/".$attatchment->location."")}}" style="width: 100%; margin-bottom: 25px">
                            </a>
                            </div>


                          @endforeach
                        </div>

                        <br>
                      </div>
                    @endif


        <a type="button" class="btn btn-outline-info" href="/dream/{{$dream->id}}/edit" style="margin-top: 10px; margin-bottom: 10px">Any changes?</a>


  </div>


@endsection

@section('js_after')
  <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>

  <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
  <script>jQuery(function(){ Codebase.helpers(['simplemde']); });</script>

@endsection
