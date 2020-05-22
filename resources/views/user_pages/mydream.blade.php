@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
              <div class="container">
                <h2 class="content-heading" style="text-align: center; color: white;">Write your daily dream!</h2>
                <form method="POST" action="{{__('home')}}">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <div class="form-material">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" size="50" style="font-size: 30px" placeholder="Title">

                            </div>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <!-- SimpleMDE Container -->
                                        <textarea class="js-simplemde" id="textarea" name="textarea" placeholder="Do you haven't enough time for write it? Just write 3 words and we will remember you later!"></textarea>
                                    </div>
                                </div>
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
        <script>jQuery(function(){ Codebase.helpers(['simplemde']); });</script>
@endsection
