@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
              <div class="container">
                <h2 class="content-heading" style="text-align: center;">Edit page</h2>
                <form method="POST" action="{{url("/dream/$dream->id")}}">
                  @method('PUT')
                  @csrf
                    <div class="block">
                        <div class="block-header block-header-default">
                            <div class="form-material">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" size="50" style="font-size: 30px" placeholder="Title" value="{{$dream->title}}">

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
                                        <textarea class="js-simplemde" id="textarea" name="content" placeholder="Do you haven't enough time for write it? Just write 3 words and we will remember you later!">{{$dream->content}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-6">
                                      <div class="custom-control custom-checkbox">

                                          <p> It @if($dream->is_in_first_person == 0)
                                            <b>wasn't</b>
                                            <input type="hidden" class="custom-control-input" id="is_in_first_person_not" name="is_in_first_person" value="0">
                                          @elseif ($dream->is_in_first_person == 1)
                                            <b>was</b>
                                            <input type="hidden" class="custom-control-input" id="is_in_first_person_yes" name="is_in_first_person" value="1">
                                          @endif
                                          in first person</p><br>
                                          Did you remember better? change it!
                                          <br>

                                          <label>It was in first person?</label>

                                          <div class="col-12">

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



                              </div>

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="submit" class="btn btn-rounded btn-outline-info min-width-125 mx:right" name="status" style="margin-bottom: 10px" value="draft">
                                <input type="submit" class="btn btn-rounded btn-outline-success min-width-125 mx:right" name="status" style="margin-bottom: 10px" value="publish">


                            </form>

                        </div>

                        <div class="block" style="text-align: right">
                          <form method="POST" action="{{url("/dream/$dream->id")}}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-rounded btn-outline-danger min-width-125 mx:right" name="status" style="margin-bottom: 10px; margin-right: 10px" value="delete">
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
