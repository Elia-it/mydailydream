@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
              <div class="container">
                <h2 class="content-heading" style="text-align: center;">Write your daily dream!</h2>
                <form method="POST" action="{{route('dream.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="block" style="border-left: solid" id="box">
                        <div class="block-header block-header-default">
                            <div class="form-material">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" size="50" style="font-size: 20px" placeholder="Title">

                            </div>
                            <div class="btn-group" role="group">
                              <label>Select a color for your Dream! </label>
                            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown" style="">
                                <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                                <h6 class="dropdown-header">Color Themes</h6>
                                <div class="row no-gutters text-center">
                                    <div class="col-2">
                                      {{-- <label class="css-control css-control-primary css-radio">

                                          <input type="radio" class="css-control-input" name="radio-group2" checked="" onClick="changeColour('none')"  >
                                          <span class="css-control-indicator"></span> default
                                      </label> --}}
                                      <label class="css-control css-control-primary css-radio">
                                            <input type="radio" class="css-control-input" name="color_id" onClick="changeColour('none')" value="" >
                                            <span class="css-control-indicator"></span> none
                                        </label>
                                      @foreach ($colors as $color)



                                          <label class="css-control css-control-primary css-radio">
                                                <input type="radio" class="css-control-input" name="color_id" onClick="changeColour('{{$color->hex}}')" value="{{$color->id}}" >
                                                <span class="css-control-indicator"></span> {{$color->name}}
                                            </label>
                                            @endforeach


                                        </div>
                                    {{-- <div class="col-2 mb-5">
                                        <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">

                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-elegance colorChange" data-toggle="theme" data-theme="{{mix('/css/themes/elegance.css')}}" href="javascript:void(0)" value="black" onlick="myBlack()">

                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div> --}}
                                    {{-- <div class="col-2 mb-5">
                                        <a class="text-pulse colorChange" data-toggle="theme" data-theme="{{mix('/css/themes/pulse.css')}}" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-flat colorChange" data-toggle="theme" data-theme="{{mix('/css/themes/flat.css')}}" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-corporate colorChange" data-toggle="theme" data-theme="{{mix('/css/themes/corporate.css')}}" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-earth colorChange" data-toggle="theme" data-theme="{{mix('/css/themes/earth.css')}}" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div> --}}
                                </div>

                            </div>

                        </div>
                        </div>

                        <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-10">

                                        <!-- SimpleMDE Container -->
                                        <textarea class="js-simplemde" id="textarea" name="content" placeholder="Do you haven't enough time for write it? Just write 3 words and we will remember you later!"></textarea>




                                    </div>
                                    <div class="col-2">
                                            <label class="col-12">Tags</label>
                                            <div class="col-12">
                                              @foreach ($tags as $tag)
                                                <div class="custom-control custom-radio mb-5">
                                                    <input class="custom-control-input" type="radio" name="tag" id="tag_{{$tag->id}}" value="{{$tag->id}}" >
                                                    <label class="custom-control-label" for="tag_{{$tag->id}}" >{{$tag->name}}</label>
                                                </div>
                                              @endforeach


                                            </div>
                                        </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-3">

                                        <select class="form-control" id="emotion" name="emotion_id">
                                            <option value="">How did you feel?</option>
                                            @foreach ($emotions as $emotion)
                                              <option value="{{$emotion->id}}">{{$emotion->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-3">
                                          <select class="form-control" id="type" name="type_id">
                                              <option value="">What kind of Dream it was?</option>

                                              @foreach ($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                              @endforeach

                                          </select>
                                      </div>

                                      <div class="col-3">
                                            <select class="form-control" id="technique" name="technique_id">
                                                <option value="">Did you use a technique?</option>

                                                @foreach ($techniques as $technique)
                                                  <option value="{{$technique->id}}">{{$technique->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-3">
                                              <select class="form-control" id="mood" name="mood_id">
                                                  <option value="">What mood did you feel?</option>

                                                  @foreach ($moods as $mood)
                                                    <option value="{{$mood->id}}">{{$mood->name}}</option>
                                                  @endforeach

                                              </select>
                                              <br>
                                          </div>


                                  <div class="col-3">
                                      <div class="custom-control custom-checkbox">
                                          <input type="hidden" class="custom-control-input" id="is_in_first_person_hidden" name="is_in_first_person" value="0">
                                          <input type="checkbox" class="custom-control-input" id="is_in_first_person" name="is_in_first_person" value="1">
                                          <label class="custom-control-label" for="is_in_first_person">It was in first person?</label>
                                      </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" class="custom-control-input" id="status_hidden" name="status" value="draft">
                                            <input type="checkbox" class="custom-control-input" id="status" name="status" value="publish">
                                            <label class="custom-control-label" for="status">Is it a publish? </label>
                                        </div>
                                    </div>


                              </div>

                              <div class="row">
                                <label for="example-file-multiple-input">Add your file</label>
                                <input type="file" class="form-control-file" style="margin-top: 10px" name="file">
                              </div>
                              <br>

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="submit" class="btn btn-rounded btn-outline-info min-width-125 mx:right" name="submit" style="margin-bottom: 10px" value="Save">


                        </div>
                    </div>
                    <!-- END SimpleMDE Editor -->





                    </form>
                  </div>
                  </div>
@foreach ($emotions as $emotion)

@endforeach

@endsection

@section('js_after')

        <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>

        <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
        <script>jQuery(function(){ Codebase.helpers(['simplemde']); });</script>

        <script>


          window.changeColour = function(value)
          {
              document.getElementById('box').style.borderLeftColor = value;

          }
          </script>

@endsection
