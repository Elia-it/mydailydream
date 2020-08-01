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

                <div class="col-md-12" style="margin: 0 auto; text-align: left">

                    <!-- SimpleMDE Container -->
                    {{-- <div id="editor_container" style="display: none">
                    <textarea id="editable"></textarea>
                    </div>
                    <div id="html_container" ></div> --}}
                    {{-- <textarea class="js-simplemde" id="textarea" name="content">@if(!empty($dream->content)) {{$dream->content}} @else No content @endif</textarea> --}}
                    <textarea id="textarea" style="display: none;">{{$dream->content}}</textarea>

                </div>


            </div>

        </div>

        <div class="row justify-content-center" style="text-align: center">
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
                                        <label>The emotion that you felt was: <b>{{$dream->emotion->name}}</b>  &#{{$dream->emotion->emoticon}}; </label>
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
                                    @php

                                    $tags_array = $dream->tags->toArray();
                                    // $tags_array = $dream->tags->toArray();
                                    //
                                    //
                                    $last_tag_to_convert = end($tags_array);
                                    $last_tag = (Object) $last_tag_to_convert;

                                  @endphp

                                  @foreach ($dream->tags as $tag)

                                    @if($tag->name === $last_tag->name)
                                      <b>{{$tag->name}}</b>
                                    @else
                                      <b>{{$tag->name}},</b>
                                    @endif


                                  @endforeach
                                </label>
                                </div>
                              @endif

                            <br>
                      </div>






                      @if(!empty($dream->attachment[0]))
                      <div class="row">
                        <div class="col-12 text-center">
                          <label>Attachments</label>
                          <hr style="width:40%">
                        </div>
                      </div>
                      {{-- @if(!empty($dream->attachment[0])) --}}
                      <div class="row items-push js-gallery img-fluid-100 js-gallery-enabled">
                        <div class="row items-push js-gallery img-fluid-100 crop">



                        @foreach ($dream->attachment as $file)
                          <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                              <a class="img-link img-link-zoom-in img-lightbox" href="{{asset($file->location)}}">
                                  <img class="img-fluid" src="{{asset($file->location)}}" style="width: 68%;" alt="">
                              </a>
                          </div>
                          {{-- <div class="col-sm-6 col-xl-3">

                              <a class="img-link img-link-zoom-in img-lightbox" href="{{asset($file->location)}}">
                                  <img class="img-fluid" src="{{asset($file->location)}}" alt="">
                              </a>
                          </div> --}}
                        @endforeach
                      </div>
                          {{-- <div class="col-sm-6 col-xl-3">

                              <a class="img-link img-link-zoom-in img-lightbox" href="{{asset("dream_images/". $dream->attatchment[0]->location ."")}}">
                                  <img class="img-fluid" src="{{asset("dream_images/". $dream->attatchment[0]->location ."")}}" alt="">
                              </a>
                          </div> --}}

                    </div>
                    @endif
                        {{-- <div class="row">
                          @foreach ($dream->attachment as $attachment)
                          <div class="col-4">
                            <a href="{{asset($attachment->location)}}">
                              <img src="{{asset($attachment->location)}}" style="width: 60%; margin-bottom: 25px">
                            </a>
                            </div>


                          @endforeach
                        </div>
                        {{$dream->attachment}} --}}

                        <br>
                      </div>



        <a type="button" class="btn btn-outline-info" href="/dream/{{$dream->id}}/edit" style="margin-top: 10px; margin-bottom: 10px">Any changes?</a>


@endsection

@section('js_after')
  <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>

  <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
  <script>jQuery(function(){ Codebase.helpers(['simplemde']); });</script>

  <script>

    // id = "editable";
    // // md = "Outside the editor I am **HTML**.   \nAnd inside the editor you see me in **markdown**.   \nMake some edits and again click the button to see the changes as HTML. Wow!";
    // md = "";
    // var simplemde = $('#textarea');
    // simplemde.options.previwRender();
    // html = simplemde.options.previewRender(md);
    // $('#html_container').wrapInner(html);

    // new SimpleMDE({
  	// 	element: document.getElementById("demo3"),
  	// 	status: false,
    //
  	// });


    $(document).ready(function() {

      var simple = new SimpleMDE({
        toolbar: false,
      });
      simple.togglePreview();
      // simple.setDisabled(true);
      //
      // console.log(x);
      //
      // id = "demo3";
      // text_value = x;
      // var simplemde = new SimpleMDE({
      //   element: $("textarea#" + id)[0],
      //   initialValue: text_value,
      //   disabled: false,
      // });
      // simplemde.setDisabled(true);
      // html = simplemde.options.previewRender(text_value);
      // $('#show').wrapInner(html);

    // $("button").click(function() {
    //   if (state) {
    //     $("div#editor_container").css('display', 'none');
    //     // Show markdown rendered by CodeMirror
    //     $('#html_container').wrapInner(simplemde.options.previewRender(simplemde.value()));
    //   }
    //   state = !state;
    // });
    });


  </script>



@endsection
