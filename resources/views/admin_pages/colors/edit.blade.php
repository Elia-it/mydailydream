@extends('layouts.admin.backend')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endsection


@section('content')

  <div class="block mx-auto" style="width: 80%">
                            <!-- Material Login -->
                            <div class="block block-themed">
                                <div class="block-header" id="block_header">
                                    <h3 class="block-title">Edit Color</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                  <form action="{{route('admin.color.update', $color->id)}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                         <div class="col-12">
                                             <div class="form-material floating">
                                                 <input type="text" class="form-control" id="color_name" name="color_name" value="{{$color->name}}">
                                                 <label for="color_name">{{__('Color Name')}}</label>
                                             </div>
                                         </div>
                                     </div>
                                    <div class="form-group row">
                                            <label class="col-12" for="example-colorpicker2">HEX</label>
                                            <div class="col-lg-8">
                                                <div class="js-colorpicker input-group" data-format="hex">
                                                    <input type="text" class="form-control" id="hex" name="hex" value="{{$color->hex}}" onchange="changeColor()">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text colorpicker-input-addon">
                                                            <i></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-info">
                                                    <i class="fa fa-arrow-right mr-5"></i>Edit Color
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Material Login -->

                          </div>
                          </div>
@endsection

@section('js_after')
  <script src="{{asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
  <script>jQuery(function(){ Codebase.helpers(['colorpicker']); });</script>

  <script>
    function changeColor(){
      var x = document.getElementById('hex').value;
      document.getElementById('block_header').style.background = x;

    }
  </script>
@endsection
