@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">

@endsection

@section('content')


@php

@endphp

              <div class="container">

                @if(Session::has('no_file'))
                  <div class="alert alert-danger">

                      <i class="fa fa-check-square"></i>&nbsp; &nbsp;{{Session::get('no_file')}}

                  </div>
                @endif

                @if(Session::has('delete_success'))
                  <div class="alert alert-success">

                      <i class="fa fa-check-square"></i>&nbsp; &nbsp;{{Session::get('delete_success')}}

                  </div>
                @endif




                <h2 class="content-heading" style="text-align: center;">Edit page</h2>
                <form method="POST" action="{{url("/dream/$dream->id")}}" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                    <div class="block" @if(!empty($dream->color_id)) style="border-left: solid; border-left-color: {{$dream->color->hex}}" @endif id="box">

                        <div class="block-header block-header-default">
                            <div class="form-material">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" size="50" style="font-size: 20px" placeholder="Title" value="{{$dream->title}}">

                            </div>

                            <div class="btn-group" role="group">
                              @if (!empty($dream->color_id))
                              <label>Do you want change your color's dream? </label>
                            @else
                              <label>Choose a color for you dream! </label>
                            @endif
                            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-paint-brush"></i>
                            </button>
                            <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown" style="">
                                <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                                <h6 class="dropdown-header">Dream Themes</h6>
                                <div class="row no-gutters ">
                                    <div class="col-12">
                                      {{-- <label class="css-control css-control-primary css-radio">

                                          <input type="radio" class="css-control-input" name="radio-group2" checked="" onClick="changeColour('none')"  >
                                          <span class="css-control-indicator"></span> default
                                      </label> --}}
                                      <label class="css-control css-switch">
                                            <input type="radio" class="css-control-input" name="color_id" onClick="borderStyle('none')" value="" >
                                            <span class="css-control-indicator"></span> none
                                        </label>
                                      </div>

                                      @foreach ($colors as $color)
                                        <div class="col-12">


                                          <label class="css-control css-switch">
                                                <input type="radio" class="css-control-input" name="color_id" onClick="borderStyle('{{$color->hex}}')" value="{{$color->id}}" >
                                                <span class="css-control-indicator"></span> {{$color->name}}
                                            </label>
                                            </div>
                                            @endforeach



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
                                <div class="form-group row text-center">
                                    <div class="col-10">
                                        <!-- SimpleMDE Container -->
                                        <textarea class="js-simplemde" id="textarea" name="content" placeholder="Do you haven't enough time for write it? Just write 3 words and we will remember you later!">{{$dream->content}}</textarea>
                                    </div>



                                    <div class="col-md-2">

                                          <label for="flatpickr">When did you dream it?</label>
                                          <div class="col-md-12 mx:auto text-center">
                                            <input type="text" class="js-flatpickr form-control bg-white" id="flatpickr" name="date" placeholder="{{$dream->date}}" value="{{$dream->date}}">
                                          </div>
                                          <br>

                                          <label>Tags</label>
                                          <div class="col-md-sm-12 text-left mx:auto">
                                          <select class="js-select2 form-control" id="tag" name="tag[]" style="width:100%;border-top:1px grey solid; border-bottom:1px grey solid; overflow:auto;" data-placeholder="Choose yours tag..." multiple>
                                              <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                              @foreach ($tags as $tag)
                                                <option value="{{$tag->id}}" @foreach ($dream->tags as $tag_check) @if($tag_check->pivot->tag_id == $tag->id) selected="selected" @endif @endforeach >{{$tag->name}}</option>
                                              @endforeach

                                          </select>
                                        </div>
                                          {{-- <div class="col-md-12 text-left mx:auto" style="height:220px;width:120px;border-top:1px grey solid; border-bottom:1px grey solid; overflow:auto;">
                                          @foreach ($tags as $tag)


                                              <div class="custom-control custom-checkbox mb-5">
                                                  <input class="custom-control-input" type="checkbox" name="tag[]" id="tag_{{$tag->id}}" @foreach ($dream->tags as $tag_check) @if($tag_check->pivot->tag_id == $tag->id) checked="" @endif @endforeach value="{{$tag->id}}">
                                                  <label class="custom-control-label" for="tag_{{$tag->id}}">#{{$tag->name}}</label>
                                              </div>


                                          @endforeach
                                          </div> --}}
                                    </div>




                                </div>
                                <div class="col 12 text-center">
                                  <label>Extra content</label>
                                  <hr>
                                </div>


                                <div class="form-group row">
                                  <div class="col-md-4 text-center">
                                    <p> It @if($dream->isFirstPerson())
                                      <b>was</b> in first person</p>
                                        @else
                                      <b>wasn't</b>  in first person</p>
                                    @endif

                                  </div>
                                  @if ($dream->emotion_id > 0)
                                    <div class="col-md-4 text-center">
                                      <p>Your emotion: <b>{{$dream->emotion->name}}</b> &#{{$dream->emotion->emoticon}}
                                    </div>
                                  @endif
                                  @if ($dream->type_id > 0)
                                    <div class="col-md-4 text-center">
                                      <p>The kind of Dream: <b>{{$dream->type->name}}</b>
                                    </div>
                                  @endif
                                  <div class="col-12">
                                    &nbsp;
                                  </div>
                                  {{-- <div class="col-md-4 text-center">
                                    &nbsp;
                                  </div> --}}
                                  @if ($dream->technique_id > 0)
                                    <div class="col-md-4 text-center">
                                      <p>The technique of the Dream: <b>{{$dream->technique->name}}</b>
                                    </div>
                                  @endif
                                  @if ($dream->mood_id > 0)
                                    <div class="col-md-4 text-center">
                                      <p>The mood of the Dream: <b>{{$dream->mood->name}}</b>
                                    </div>
                                  @endif

                                </div>

                                <div class="col-12 text-center">
                                  <label> Edit content </label>
                                  <hr>
                                </div>




                                {{-- <div class="form-group row">
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
                                          </div> --}}






                              <div class="form-group row text-center">
                                <div class="col-3">
                                  <label>Emotion</label>
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
                                    <label>Type</label>
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
                                      <label>Technique</label>
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
                                        <label>Mood</label>
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
                                      </div>

                                      <div class="row">
                                        <div class="col-7">
                                          &nbsp;
                                          @if($dream->is_in_first_person == 0)

                                            <input type="hidden" class="custom-control-input" id="is_in_first_person_not" name="is_in_first_person" value="{{$dream->is_in_first_person}}">

                                            <div class="custom-control custom-checkbox mb-5">
                                                <input class="custom-control-input" type="checkbox" name="is_in_first_person" id="yes_it_was" value="1">
                                                <label class="custom-control-label" for="yes_it_was">Yes, it was in first person</label>
                                            </div>



                                          @elseif ($dream->is_in_first_person == 1)

                                            <input type="hidden" class="custom-control-input" id="is_in_first_person_yes" name="is_in_first_person" value="{{$dream->is_in_first_person}}">

                                            <div class="custom-control custom-checkbox mb-5">
                                                <input class="custom-control-input" type="checkbox" name="is_in_first_person" id="no_it_wasnt" value="0">
                                                <label class="custom-control-label" for="no_it_wasnt">No, it wasn't in first person</label>
                                            </div>



                                          @endif
                                        </div>


                                        <div class="col-md-5 mx-auto" style="margin-top: 10px">
                                          {{-- <input type="file" class="form-control-file" style="margin-top: 10px" name="add_file[]" multiple=""> --}}
                                          <label class="col-12">Add your files</label>
                                          <div class="custom-file">
                                              <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                              <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                              <input type="file" class="custom-file-input" id="file" name="file[]" data-toggle="custom-file-input" multiple onchange="uploadFiles()">
                                              <label class="custom-file-label" for="file">Choose files</label>
                                              <input type="hidden" id="fileUp" name="fileUp">
                                          </div>
                                        </div>




                                      {{-- <div class="form-group row">
                                          <label class="col-12">Bootstrap's Custom File Input (Multiple)</label>
                                          <div class="col-8">
                                              <div class="custom-file">
                                                  <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                  <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                                  <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="example-file-multiple-input-custom" data-toggle="custom-file-input" multiple>
                                                  <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files</label>
                                              </div>
                                          </div>
                                      </div> --}}

                                </div>

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="submit" class="btn btn-rounded btn-outline-info min-width-125 mx:right" name="status" style="margin-bottom: 10px" value="draft">
                                <input type="submit" class="btn btn-rounded btn-outline-success min-width-125 mx:right" name="status" style="margin-bottom: 10px" value="publish">


                            </form>

                            {{-- @if(!empty($dream->attatchment[0]))
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
                            @endif --}}

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
                    </div>

                    <div class="form-group row text-center">

                      @if(!empty($dream->attatchment[0]))
                        <div class="row">

                          @foreach ($dream->attatchment as $file)
                            <div class="col-md-4 text-center">
                              <a href="{{asset($file->location)}}">
                                <img style="width: 70%; margin-bottom: 10px" src="{{asset($file->location)}}">

                                {{-- <embed type="image/jpg" src="{{asset($file->location)}}" width="800px" height="2100px" /> --}}
                              </a>

                              <div class="col-12 mx:auto">
                                <form method="post" action="{{url("/dream/file/$file->id")}}" enctype="multipart/form-data">

                                  @csrf
                                  @method('PUT')
                                  <input type="file" class="form-control-file" style="margin-top: 10px" name="update_file">
                                  <input type="submit" class="btn btn-info min-width-125 js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;" name="update" value="update">

                                </form>
                              </div>
                              &nbsp;
                              <div class="col-12 mx:auto">

                                <form method="post" action="{{url("dream/file/$file->id")}}">
                                  @csrf
                                  @method('DELETE')

                                  <input type="submit" class="btn btn-danger min-width-125 js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;" value="Delete">

                                </form>
                            </div>

                            </div>
                          @endforeach




                        </div>


                      @else
                        <h4>There aren't files</h4>
                      @endif

                    </div>


                      {{-- @if(!empty($dream->attatchment[0]))
                        <div class="row">
                        @foreach ($dream->attatchment as $file)
                        <div class="col-4">
                          <div class="box">
                            <a href="{{asset("/dream_images/".$file->location."")}}">
                              <img style="width: 100%; margin-bottom: 10px" src="{{asset("/dream_images/".$file->location."")}}">
                            </a> --}}
                            {{-- <div class="row">
                            <div class="col-6"> --}}
                            {{-- <form method="post" action="{{url("/dream/file/$file->id")}}" enctype="multipart/form-data">

                              @csrf
                              @method('PUT')
                              <input type="file" class="form-control-file" style="margin-top: 10px" name="update_file">
                              <input type="submit" class="btn btn-info min-width-125 js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;" name="update" value="update">

                            </form>
                          </div>
                        </div> --}}


                            &nbsp; &nbsp;

                            {{-- <div class="col-6"> --}}
                            {{-- <form method="post" action="{{url("dream/file/$file->id")}}">
                              @csrf
                              @method('DELETE')

                              <input type="submit" class="btn btn-danger min-width-125 js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;" value="Delete">

                            </form>
                            </div> --}}
                          {{-- </div> --}}
                          {{-- </div>

                          </div> --}}

                        {{-- </div>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        @endforeach
                      @else
                      <div class="text-center">
                        <label> You haven't file inside the Dream</label>
                      </div>
                      @endif --}}


                    {{-- </div> --}}
                  </div>

{{-- <div class="form-group row">

                          <div class="col-lg-8">
                              <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                  <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                  @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}" @foreach ($dream->tags as $tag_check) @if($tag_check->pivot->tag_id == $tag->id) selected="selected" @endif @endforeach >{{$tag->name}}</option>
                                  @endforeach
                                  {{-- <option value="1">HTML</option>
                                  <option value="2">CSS</option>
                                  <option value="3">JavaScript</option>
                                  <option value="4">PHP</option>
                                  <option value="5">MySQL</option>
                                  <option value="6">Ruby</option>
                                  <option value="7">Angular</option>
                                  <option value="8">React</option>
                                  <option value="9">Vue.js</option> --}}
                              {{-- </select>

                          </div>
                      </div> --}}


@endsection

@section('js_after')

        <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>

        <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
        <script>jQuery(function(){ Codebase.helpers(['simplemde']); });</script>

        <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>

        <script>


          // window.changeColour = function(value)
          // {
          //     document.getElementById('box').style.borderColor = value;
          //
          // }

          function borderStyle(value) {
            if(value != 'none'){
              document.getElementById("box").style.borderLeft = "solid";
              document.getElementById("box").style.borderLeftColor = value;
            }else{
              document.getElementById("box").style.borderLeft = "none";
            }
          }

          </script>
          <script>jQuery(function(){ Codebase.helpers(['simplemde', 'select2', 'flatpickr']); });</script>

          <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>

          <script>

          function uploadFiles(){
            var leng = document.getElementById('file').files.length;
            var token = $('input[name=_token]');

            var data = new FormData();

            for(var i = 0; i < leng; i++){
              data.append('file[]', document.getElementById('file').files[i]);
            }
            data.append('fileUp', document.getElementById('fileUp').value);


            var result = [];
            var res = [];
            $.ajax({
                 url: "{{ route('check.and.upload') }}",
                 type: "POST",
                 data: data,
                 contentType: false,
                 processData:false,
                 headers: {
                     'X-CSRF-TOKEN': token.val()
                 },
                 success: function(data)
                 {
                     result = data.path;


                     $('[name=fileUp').val(JSON.stringify(result));
                     // $('#fileUp').val(result);
                     console.log(document.getElementById('fileUp').value);
                     alert(data.message);


                 }

            });
          }
          </script>









@endsection
