@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
              <div class="container">


                <h2 class="content-heading" style="text-align: center;">Write your daily dream!</h2>
                <form method="POST" action="{{route('dream.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-12">
                    <div class="block"  id="box">
                        <div class="block-header block-header-default">
                            <div class="form-material">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" size="50" style="font-size: 20px" placeholder="Title">

                            </div>
                            <div class="btn-group" role="group">
                              <label>Select a color for your Dream! </label>
                            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-paint-brush"></i>
                            </button>
                            <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown" style="">
                                <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                                <h6 class="dropdown-header">Dream Themes</h6>
                                <div class="row no-gutters">
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
                                    <div class="col-md-10">

                                        <!-- SimpleMDE Container -->
                                        <textarea class="js-simplemde" id="textarea" name="content" placeholder="Do you haven't enough time for write it? Just write 3 words and we will remember you later!"></textarea>




                                    </div>

                                      <div class="col-md-2">

                                            <label for="flatpickr">When did you dream it?</label>
                                            <div class="col-md-12 mx:auto text-center">
                                              <input type="text" class="js-flatpickr form-control bg-white" id="flatpickr" name="date" placeholder="Y-m-d" value="{{date('Y-m-d')}}">
                                            </div>
                                            <br>

                                            <label>Tags</label>
                                            <div class="col-md-sm-12 text-left mx:auto">
                                              <select class="js-select2 form-control" id="tag" name="tag[]" style="width:100%" data-placeholder="Choose yours tag..." multiple>
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                                @foreach ($tags as $tag)
                                                  <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach

                                            </select>
                                          </div>
                                      </div>




                                </div>

                                <div class="row text-center">
                                  <div class="col-md-5">
                                    <div class="box">
                                      <label>How did you feel?</label>
                                      <div class="col-12">
                                      @foreach ($emotions as $emotion)
                                        {{-- <input type="radio" class="css-control-input" name="emotion_id" value="{{$emotion->id}}" >{{$emotion->emoticon}} --}}
                                          <div class="custom-control custom-radio custom-control-inline mb-5">
                                              <input class="custom-control-input" type="radio" name="emotion_id" id="emotion_{{$emotion->id}}" value="{{$emotion->id}}">
                                              <label class="custom-control-label" data-toggle="tooltip" data-placement="bottom" title="{{$emotion->name}}" for="emotion_{{$emotion->id}}">&#{{$emotion->emoticon}};

                                              </label>
                                          </div>

                                      @endforeach

                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-5 mr-auto">
                                    <div class="box">
                                      <label>Did you use a technique?</label>
                                      <div class="col-6 mx-auto">

                                            <select class="form-control" id="technique" name="technique_id" style="align-items: center" >
                                                <option value="">...</option>

                                                @foreach ($techniques as $technique)
                                                  <option value="{{$technique->id}}">{{$technique->name}}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                  </div>
                                </div>


                                <br><br>



                                <div class="form-group row text-center">
                                  <div class="col-md-4 mx-auto">
                                    <div class="box">
                                      <label>What kind of Dream it was?</label>
                                      <div class="col-8 mx-auto">
                                        <select class="form-control" id="type" name="type_id">
                                            <option value="">...</option>

                                            @foreach ($types as $type)
                                              <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach

                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-4 mx-auto">
                                    <div class="box">
                                      <label>What mood did you feel?</label>
                                      <div class="col-8 mx-auto">
                                        <select class="form-control" id="mood" name="mood_id">
                                            <option value="">...</option>

                                            @foreach ($moods as $mood)
                                              <option value="{{$mood->id}}">{{$mood->name}}</option>
                                            @endforeach

                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-4 mx-auto">
                                    <label>Files</label>
                                        <div class="custom-file">
                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                            <input type="file" class="custom-file-input" id="file" name="file[]" data-toggle="custom-file-input" multiple>
                                            <label class="custom-file-label" for="file">Choose files</label>
                                        </div>
                                      </div>
                                  </div>

                                  {{-- <label class="css-control css-switch">
                                        <input type="radio" class="css-control-input" name="color_id" onClick="borderStyle('{{$color->hex}}')" value="{{$color->id}}" >
                                        <span class="css-control-indicator"></span> {{$color->name}}
                                    </label>
                                    </div> --}}




                                      {{-- <div class="col-12">
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="example-inline-radio1" value="option1" checked="">
                                                    <label class="custom-control-label" for="example-inline-radio1">&#{{$emotions[0]->emoticon}};</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="example-inline-radio2" value="option2">
                                                    <label class="custom-control-label" for="example-inline-radio2">Option 2</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="example-inline-radio3" value="option3">
                                                    <label class="custom-control-label" for="example-inline-radio3">Option 3</label>
                                                </div>
                                            </div> --}}


                                    {{-- <select class="form-control" id="emotion" name="emotion_id"> --}}




                                    {{-- </select> --}}


                                <br>
                                <div class="row">
                                  {{-- <div class="col-3">

                                        <select class="form-control" id="emotion" name="emotion_id">
                                            <option value="">How did you feel?</option>
                                            @foreach ($emotions as $emotion)
                                              <option value="{{$emotion->id}}">{{$emotion->name}}</option>
                                            @endforeach

                                        </select>
                                    </div> --}}


                                  <div class="col-md-5 mr-auto">
                                      <div class="custom-control custom-checkbox">
                                          <input type="hidden" class="custom-control-input" id="is_in_first_person_hidden" name="is_in_first_person" value="0">
                                          <input type="checkbox" class="custom-control-input" id="is_in_first_person" name="is_in_first_person" value="1">
                                          <label class="custom-control-label" for="is_in_first_person">It was in first person?</label>
                                      </div>
                                    </div>
                                  </div>



                                <div class="row">
                                    <div class="col-md-5 mr-auto">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" class="custom-control-input" id="status_hidden" name="status" value="draft">
                                            <input type="checkbox" class="custom-control-input" id="status" name="status" value="publish">
                                            <label class="custom-control-label" for="status">Is it a publish? </label>
                                        </div>
                                    </div>

                                  </div>


                              {{-- <div class="row">
                                <label for="example-file-multiple-input">Add your file</label>
                                <input type="file" class="form-control-file" style="margin-top: 10px" name="file[]" multiple="">
                              </div>
                              <div class="row"> --}}
                              {{-- <div class="col-4">
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled" style="margin-top: 10px" id="example-file-multiple-input-custom" name="file[]" data-toggle="custom-file-input" multiple="">
                                        <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files</label>
                                    </div>
                                </div> --}}
                              <br>



                            <div class="row text-center">
                              <div class="col-12">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="submit" class="btn btn-rounded btn-outline-info min-width-150 mx:auto" name="submit" style="margin-bottom: 10px" value="Save">
                              </div>
                            </div>

                        </div>
                        {{-- END BOX --}}
                    </div>
                    <!-- END SimpleMDE Editor -->





                    </form>
                  </div>
                  </div>


                  <div class="form-group row">
                                            <label class="col-12" for="example-select2-multiple">Multiple Values</label>
                                            <div class="col-lg-8">
                                                <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                                    @foreach ($tags as $tag)
                                                      <option value="{{$tag->id}}">{{$tag->name}}</option>
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
                                                 </select>

                                            </div>
                                        </div>







@endsection

@section('js_after')

        <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>

        <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
        <script>jQuery(function(){ Codebase.helpers(['simplemde']); });</script>




      <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>

        <script>


          // window.changeColour = function(value)
          // {
          //     document.getElementById('box').style.borderLeft = solid value;
          //
          // }

          function borderStyle(value) {
            if(value != 'none'){

                //document.getElementsByClassName("css-control-indicator").style.background = value;

              document.getElementById("box").style.borderLeft = "solid";
              document.getElementById("box").style.borderLeftColor = value;
            }else{
              document.getElementById("box").style.borderLeft = "none";
            }
          }

          </script>
          <script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
          <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>
          <script>jQuery(function(){ Codebase.helpers(['select2']); });</script>

@endsection
