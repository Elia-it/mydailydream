@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
              <div class="container">
                <h2 class="content-heading" style="text-align: center;">Write your daily dream!</h2>
                <form method="POST" action="{{route('dream.store')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="block" style="border-style: solid" id="box">
                        <div class="block-header block-header-default">
                            <div class="form-material">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" size="50" style="font-size: 30px" placeholder="Title">

                            </div>
                            <div class="btn-group" role="group">
                            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown" style="">
                                <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                                <h6 class="dropdown-header">Color Themes</h6>
                                <div class="row no-gutters text-center mb-5">
                                    <div class="col-2">
                                            <label class="css-control css-control-primary css-radio">

                                                <input type="radio" class="css-control-input" name="radio-group2" checked="" onClick="changeColour('blue')"  >
                                                <span class="css-control-indicator"></span> blue
                                            </label>
                                            <label class="css-control css-control-primary css-radio">
                                                <input type="radio" class="css-control-input" name="radio-group2" value="black" onClick="changeColour('black')">
                                                <span class="css-control-indicator"></span> black
                                            </label>
                                            <label class="css-control css-control-primary css-radio">
                                                <input type="radio" class="css-control-input" name="radio-group2" value="purple" onClick="changeColour('white')">
                                                <span class="css-control-indicator"></span> purple
                                            </label>
                                            <label class="css-control css-control-primary css-radio">
                                                <input type="radio" class="css-control-input" name="radio-group2" value="Orange">
                                                <span class="css-control-indicator"></span> Orange
                                            </label>
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
                                        <textarea class="js-simplemde" id="textarea" name="content" placeholder="Do you haven't enough time for write it? Just write 3 words and we will remember you later!"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
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
                                    <div class="col-3">
                                      <input type="file" class="form-control-file" name="file">
                                    </div>
                              </div>

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="submit" class="btn btn-rounded btn-outline-info min-width-125 mx:right" name="submit" style="margin-bottom: 10px" value="Save">


                            </form>
                        </div>
                    </div>
                    <!-- END SimpleMDE Editor -->
                  </div>


@endsection

@section('js_after')

        <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>

        <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
        <script>jQuery(function(){ Codebase.helpers(['summernote','simplemde']); });</script>

        <script>


          window.changeColour = function(value)
          {

              document.getElementById('box').style.borderColor = value;
          }
          </script>

@endsection
