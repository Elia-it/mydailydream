@extends('layouts.user.layout')


@section('css_before')


  <link rel="stylesheet" href="{{asset('js/plugins/magnific-popup/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('js/plugins/fullcalendar/fullcalendar.min.css')}}">


  <style media="screen">


    .crop {
    height: 100%;
    width: 100%;
    overflow: hidden;
    }

  </style>

@endsection


@section('content')



<div class="container">
  <h2 class="content-heading text-center">Welcome to your Home!</h2>
  <div class="block">
    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#btabs-animated-fade-home">Recent actitivies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#btabs-animated-fade-profile">Dream's calendar</a>
        </li>

    </ul>
    <div class="block-content tab-content overflow-hidden">
        <div class="tab-pane fade show active" id="btabs-animated-fade-home" role="tabpanel">
            <h4 class="font-w400">Recent Activities</h4>
            <ul class="list list-timeline list-timeline-modern pull-t">
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
                        @endforeach
                      </div>
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
        <div class="tab-pane fade" id="btabs-animated-fade-profile" role="tabpanel">
          <h4 class="font-w400">Dream's calendar</h4>
          <div id="calendar" style="margin-bottom: 10px">
          </div>
        </div>
      </div>
  </div>
</div>


@endsection

@section('js_after')
  <script>jQuery(function(){ Codebase.helpers('magnific-popup'); });</script>
  <script src="{{asset('js/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

  <script src="{{asset('js/codebase.core.min.js')}}"></script>
  <script src="{{asset('js/codebase.app.min.js')}}"></script>

  <!-- Page JS Plugins -->
  <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>

  <!-- Page JS Code -->
  <script src="{{asset('js/pages/be_comp_calendar.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){


      var calendar = $('#calendar').fullCalendar({
        customButtons: {
            myCustomButton: {
              text: 'custom!',
              click: function() {
                alert('clicked the custom button!');
              }
            }
          },

          editable:false,
          header:{
            left: 'month, basicWeek',
            center: 'title',
            right: 'prev,next today'
          },
          views: {
            month: {
               eventLimit: 4
             }
          },
          events: [
            @foreach ($dreams_calendar as $dream)
            {
                @if (!empty($dream->title))
                  title: '{{substr($dream->title, 0, 15)}}',
                  @else
                  title: 'No Title',
                @endif
              date: '{{$dream->date}}',
              url: "{{route('dream.show', $dream->id)}}",
              @if (!empty($dream->color_id))
                @if ($dream->color_id == '4')
                  textColor: 'white',
                @endif
              color: "{{$dream->color->hex}}"
              @endif

            },

            @endforeach

          ],
          eventClick: function(event) {
            if (event.url) {
              window.open(event.url);
              return false;
            }
          }
      });

    });


  </script>

@endsection
