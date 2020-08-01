@extends('layouts.user.layout')


@section('css_before')


  <link rel="stylesheet" href="{{asset('js/plugins/magnific-popup/magnific-popup.css')}}">

  <style media="screen">


    .crop {
    height: 300px;
    width: auto;
    overflow: hidden;
    }

  </style>

@endsection


@section('content')



<div class="container">



  <h2 class="content-heading text-center">Welcome to your Home!</h2>

  <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">

                            @if ($dreams->isEmpty())
                              Write your first dream!
                            @else
                              Latest fifteen activities!
                            @endif

                            </h3>
                            <div class="block-options">
                              <a type="button" class="btn btn-alt-success mr-5 mb-5" href="/dream/create">
                                    <i class="fa fa-plus mr-5"></i>
                                    Write your dream!
                                  </a>
                                {{-- <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button> --}}
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <ul class="list list-timeline list-timeline-modern pull-t">
                                <!-- Twitter Notification -->

                                  @foreach ($dreams as $dream)


                                  <li>
                                      <div class="list-timeline-time">{{$dream->date}}</div>
                                      @if($dream->status == 'publish')
                                        <i class="list-timeline-icon fa fa-check bg-success" title="complete"></i>

                                    @else

                                        <i class="list-timeline-icon fa fa-close bg-danger" title="draft"></i>

                                    @endif
                                      <div class="list-timeline-content">
                                          <a class="link-effect" href="{{route('dream.show', $dream->id)}}"><p class="font-w700">@if(!empty($dream->title)){{$dream->title}} @else <i>No Title</i> @endif</p></a>
                                            <p>@if(!empty($dream->content)){{Str::limit($dream->content, 90)}} @else <i>No Content</i> @endif</p>
                                          {{-- <p>Inizia a scrivere per poi continuare dopo...</p> --}}
                                          @if(!empty($dream->attachment[0]))
                                          <div class="row items-push js-gallery img-fluid-100 js-gallery-enabled">
                                            <div class="row items-push js-gallery img-fluid-100 crop">



                                            @foreach ($dream->attachment as $file)
                                              <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                                                  <a class="img-link img-link-zoom-in img-thumb img-lightbox" href="{{asset($file->location)}}">
                                                      <img class="img-fluid" src="{{asset($file->location)}}" alt="">
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

                                                  <a class="img-link img-link-zoom-in img-lightbox" href="{{asset("dream_images/". $dream->attachment[0]->location ."")}}">
                                                      <img class="img-fluid" src="{{asset("dream_images/". $dream->attachment[0]->location ."")}}" alt="">
                                                  </a>
                                              </div> --}}

                                        </div>
                                        @endif

                                          @if($dream->status == 'draft')

                                            <a class="btn btn-info" href="/dream/{{$dream->id}}/edit" style="width:100px">Finish it</a>

                                          @endif

                                          <a type="button" class="btn btn-outline-success" href="/dream/{{$dream->id}}" style="width:100px">Read more</a>
                                      </div>
                                  </li>


                                  @endforeach


                            </ul>
                        </div>
                    </div>
                  </div>


@endsection

@section('js_after')
  <script>jQuery(function(){ Codebase.helpers('magnific-popup'); });</script>
  <script src="{{asset('js/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

@endsection
