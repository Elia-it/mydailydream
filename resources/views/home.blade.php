@extends('layouts.user.layout')


@section('before_content')



@endsection


@section('content')


<div class="container">
  <h2 class="content-heading">Your Time-dreams! </h2>

  <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">All your dreams</h3>
                            <div class="block-options">
                              <a type="button" class="btn btn-alt-success mr-5 mb-5" href="/dream/create">
                                    <i class="fa fa-plus mr-5"></i>Write your dream!
                                </a>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
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
                                      <i class="list-timeline-icon fa fa-check bg-success"></i>

                                  @else

                                      <i class="list-timeline-icon fa fa-close bg-danger"></i>

                                  @endif
                                    <div class="list-timeline-content">
                                        <p class="font-w600">{{$dream->title}}</p>
                                        <p>Inizia a scrivere per poi continuare dopo...</p>

                                        @if($dream->status == 'draft')

                                          <a class="btn btn-info" href="/dream/{{$dream->id}}/edit">Want to finish him?  <i class="fa fa-exclamation">  </i></a>

                                        @endif

                                        <a type="button" class="btn btn-outline-success" href="/dream/{{$dream->id}}" >Do you want read it?</a>
                                    </div>
                                </li>

                                @endforeach

                                
                            </ul>
                        </div>
                    </div>
                  </div>

@endsection