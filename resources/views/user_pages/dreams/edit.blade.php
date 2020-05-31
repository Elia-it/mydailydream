@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
              <div class="container">
                <h2 class="content-heading" style="text-align: center;">Edit page</h2>
                <form method="POST" action="{{url("/dream/$dream->id")}}" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                    <div class="block" style="border-style: solid;  @if (!empty($dream->color_id)) border-color: {{$dream->color->hex}} @endif" id="box">

                        <div class="block-header block-header-default">
                            <div class="form-material">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" size="50" style="font-size: 30px" placeholder="Title" value="{{$dream->title}}">

                            </div>

                            <div class="btn-group" role="group">
                              @if (!empty($dream->color_id))
                              <label>Do you want change your color's dream? </label>
                            @else
                              <label>Choose a color for you dream! </label>
                            @endif
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
                                    <div class="col-12">
                                        <!-- SimpleMDE Container -->
                                        <textarea class="js-simplemde" id="textarea" name="content" placeholder="Do you haven't enough time for write it? Just write 3 words and we will remember you later!">{{$dream->content}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-3">

                                          <p> It @if($dream->is_in_first_person == 0)
                                            <b>wasn't</b>
                                            <input type="hidden" class="custom-control-input" id="is_in_first_person_not" name="is_in_first_person" value="0">
                                          @elseif ($dream->is_in_first_person == 1)
                                            <b>was</b>
                                            <input type="hidden" class="custom-control-input" id="is_in_first_person_yes" name="is_in_first_person" value="1">
                                          @endif
                                          in first person</p><br>

                                          </div>
                                          <div class="col-2">

                                          Did you remember better? change it!


                                        </div>
                                        <div class="col-6">
                                          <label>It was in first person?</label>
                                            <div class="custom-control custom-checkbox">

                                                <div class="custom-control custom-radio mb-5">
                                                    <input class="custom-control-input" type="radio" name="is_in_first_person" id="is_in_first_person_1" value="{{($dream->is_in_first_person)}}" checked="">
                                                    <label class="custom-control-label" for="is_in_first_person_1">



                                                      @if($dream->is_in_first_person == '0')
                                                        No, It wasn't in first person
                                                      </label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-5">
                                                      <input class="custom-control-input" type="radio" name="is_in_first_person" id="is_in_first_person_2" value="1">
                                                      <label class="custom-control-label" for="is_in_first_person_2">Yes, It was in first person</label>
                                                  </div>

                                                      @else
                                                        Yes, It was in first person
                                                      </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-5">
                                                    <input class="custom-control-input" type="radio" name="is_in_first_person" id="is_in_first_person_2" value="0">
                                                    <label class="custom-control-label" for="is_in_first_person_2">No, It wasn't in first person</label>
                                                </div>
                                                @endif
                                            </div>
                                          </div>





                              </div>
                              <div class="form-group row">
                                <div class="col-3">
                                      <select class="form-control" id="emotion" name="emotion_id">

                                        @if ($dream->emotion_id > 0)
                                          <option value="{{$dream->emotion_id}}">{{$dream->emotion->name}}</option>
                                        @else
                                          <option value="">How did you feel?</option>
                                        @endif


                                          @foreach ($emotions as $emotion)
                                            @if($emotion->id != $dream->emotion_id)
                                              <option value="{{$emotion->id}}">{{$emotion->name}}</option>
                                            @endif
                                          @endforeach

                                      </select>
                                  </div>
                                  <div class="col-3">
                                        <select class="form-control" id="type" name="type_id">

                                          @if ($dream->type_id > 0)
                                            <option value="{{$dream->type_id}}">{{$dream->type->name}}</option>
                                          @else
                                            <option value="">What kind of Dream it was?</option>
                                          @endif


                                            @foreach ($types as $type)
                                              @if($type->id != $dream->type_id)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                              @endif
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-3">
                                          <select class="form-control" id="technique" name="technique_id">


                                            @if($dream->technique_id > 0)
                                              <option value="{{$dream->technique_id}}">{{$dream->technique->name}}</option>

                                            @else
                                              <option value="">Did you use a technique?</option>
                                            @endif

                                              @foreach ($techniques as $technique)
                                                @if ($technique->id != $dream->technique_id)
                                                  <option value="{{$technique->id}}">{{$technique->name}}</option>
                                                @endif
                                              @endforeach

                                          </select>
                                      </div>

                                      <div class="col-3">
                                            <select class="form-control" id="mood" name="mood_id">

                                              @if ($dream->mood_id > 0)
                                                <option value="{{$dream->mood_id}}">{{$dream->mood->name}}</option>
                                              @else
                                                <option value="">What mood did you feel?</option>
                                              @endif

                                                @foreach ($moods as $mood)
                                                  @if($mood->id != $dream->mood_id)
                                                    <option value="{{$mood->id}}">{{$mood->name}}</option>
                                                  @endif
                                                @endforeach

                                            </select>
                                        </div>
                                        {{-- <div class="col-3">
                                          <input type="file" class="form-control-file" style="margin-top: 10px" name="file">
                                        </div> --}}
                                        @if(empty($dream->attatchment[0]))
                                        <div class="col-3" style="margin-top: 10px">
                                          <input type="file" class="form-control-file" style="margin-top: 10px" name="file">
                                        </div>
                                      @endif



                                </div>

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="submit" class="btn btn-rounded btn-outline-info min-width-125 mx:right" name="status" style="margin-bottom: 10px" value="draft">
                                <input type="submit" class="btn btn-rounded btn-outline-success min-width-125 mx:right" name="status" style="margin-bottom: 10px" value="publish">


                            </form>

                            @if(!empty($dream->attatchment[0]))
                            <div class="row text-center">
                              <div class="col-lg-4 ml-auto">
                                <label> Update your file </label>
                                <hr>
                              </div>
                              <div class="col-lg-4 mr-auto">
                                <label> Delete your file </label>
                                <hr>
                              </div>
                            </div>
                            <div class="row text-center">
                              <div class="col-lg-4 ml-auto">

                                  <form method="POST" action="{{url("/dream/file/".$dream->attatchment[0]->id."")}}" enctype="multipart/form-data">
                                      @method('PUT')
                                      @csrf

                                      <input type="file" name="file" >


                                      <input type="submit" class="btn btn-info min-width-125 js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;" name="update_file" value="update file">

                                  </form>
                                </div>
                                <div class="col-lg-4 mr-auto">
                                  <form method="POST" action="{{url("/dream/file/".$dream->attatchment[0]->id."")}}">
                                      @method('DELETE')
                                      @csrf
                                      <label>{{$dream->attatchment[0]->location}}</label>
                                      <br>
                                      <input type="submit" class="btn btn-danger min-width-125 js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;" value="Delete file">

                                  </form>
                                </div>

                            </div>
                            @endif

                        </div>

                        <div class="block" style="text-align: right" >
                          <form method="POST" action="{{url("/dream/$dream->id")}}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-rounded btn-outline-danger min-width-125 mx:right" name="status" style="margin-bottom: 10px; margin-right: 10px" value="delete">
                          </form>



                        </div>
                    </div>
                    <!-- END SimpleMDE Editor -->
                    <hr>
                    <div class="box ">
                      <div class="text-center">
                        <h3>Your file</h3>
                        <hr>
                      </div>
                      <div class="row">
                        <div class="col-3">
                          @if(!empty($dream->attatchment[0]))
                          <a href="{{asset("/dream_images/". $dream->attatchment[0]->location."")}}">
                            <img style="width: 100%" src="{{asset("/dream_images/". $dream->attatchment[0]->location."")}}">
                          </a>
                        @endif
                        </div>

                      </div>
                    </div>
                  </div>

@endsection

@section('js_after')

        <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>

        <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
        <script>jQuery(function(){ Codebase.helpers(['simplemde']); });</script>

        <script>


          window.changeColour = function(value)
          {
              document.getElementById('box').style.borderColor = value;

          }
          </script>
@endsection
