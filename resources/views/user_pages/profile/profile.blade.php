@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section('content')

  <!-- Page Content -->
  <!-- User Info -->
  <div class="bg-image bg-image-bottom" style= @if($asset->isImg()) 'background-image: url("/profiles/backgrounds/{{$asset->background}}");' @else "background-color: {{$asset->background}};" @endif >
      <div class="bg-primary-dark-op py-30">
          <div class="content content-full">

                  <div class="row">
                    <div class="col-12 text-right">
                      <label style="color:white;">Change your background</label>
                      <button type="button" class="btn btn-circle btn-dual-secondary" id="sss">
                          <i class="fa fa-paint-brush"></i>
                      </button>
                    </div>
                  </div>

                  <div class="col-4 ml-auto" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="block block-bordered block-rounded mb-2">
                                    {{-- <div class="block-header" role="tab" id="accordion_h1">
                                        <a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q1" aria-expanded="false" aria-controls="accordion_q1"><i class="fa fa-paint-brush"></i>Change your background</a>
                                    </div> --}}

                                    <div id="accordion_q1" class="collapse" role="tabpanel" aria-labelledby="accordion_h1" data-parent="#accordion">
                                        <div class="block-content">
                                          <form action="{{url("profile/img/$asset->id")}}" method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf

                                            <div class="col-lg-12">
                                              <label>Color</label>
                                                <div class="js-colorpicker input-group" data-format="hex">
                                                    <input type="text" class="form-control" id="example-colorpicker2" name="background" value="#42a5f5">

                                                    <div class="input-group-append">
                                                        <span class="input-group-text colorpicker-input-addon">
                                                            <i></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <input type="file" class="custom-file-input js-custom-file-input-enabled" id="example-file-input-custom" name="example-file-input-custom" data-toggle="custom-file-input">
                                            </div>
                                            <div class="col-lg-12 mx-auto">
                                              <label>Files</label>
                                                  <div class="custom-file">
                                                      <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                      <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                                      <input type="file" class="custom-file-input" id="file" name="background" data-toggle="custom-file-input">
                                                      <label class="custom-file-label" for="file">Choose file</label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row text-right">
                                              <div class="col-12 ml-auto">
                                                <input type="submit" class="btn btn-rounded btn-outline-info min-width-100 mb-10" style="margin-top: 5px; margin-bottom: 3px"  value="save">

                                              </div>
                                            </div>
                                        </form>



                                        </div>
                                    </div>
                                </div>

              <!-- Avatar -->
              <div class="mb-15 text-center">
                  <a class="img-link" href="{{asset("profiles/avatars/$asset->path_avatar")}}" >
                      <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset("profiles/avatars/$asset->path_avatar")}}" alt="">
                  </a>
              </div>
              <!-- END Avatar -->

              <!-- Personal -->
              <h1 class="h3 text-white font-w700 mb-10 text-center">
                  {{Auth::user()->first_name . ' ' . Auth::user()->last_name}}
              </h1>

              <h2 class="h5 text-white-op text-center">
                @if($user->isSubToNewsletter())
                  Subscribed to our <a class="text-primary-light" href="javascript:void(0)">@Newsletter</a>
                @else
                  Not a subscriber of our <a class="text-primary-light" href="javascript:void(0)">@Newsletter</a>
                @endif
                  <a class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5 px-20" data-toggle="tooltip" title="Edit Info" href="/profile/{{Auth::user()->id}}/edit">
                      <i class="fa fa-pencil"></i>
                  </a>

              </h2>

              <!-- END Personal -->

              <!-- Actions -->
              {{-- <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5">
                  <i class="fa fa-plus mr-5"></i> Add Friend
              </button>
              <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5">
                  <i class="fa fa-envelope-o mr-5"></i> Message
              </button>
              <a class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5 px-20" href="be_pages_generic_profile_edit.html">
                  <i class="fa fa-pencil"></i>
              </a> --}}
              <!-- END Actions -->
          </div>
      </div>
  </div>
  <!-- END User Info -->
<div class="container">
                  {{-- <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                <i class="fa fa-user-circle mr-5 text-muted"></i> User Profile
                            </h3>
                        </div>
                        <div class="block-content">
                            <form action="{{url("profile/Auth::user()->id")}}" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                              @method('PUT')
                              @csrf
                                <div class="row items-push">
                                    <div class="col-lg-3">
                                        <p class="text-muted">
                                            Your account’s vital info. Your username will be publicly visible.
                                        </p>
                                    </div>
                                    <div class="col-lg-7 offset-lg-1">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="profile-settings-username">First Name</label>
                                                <input type="text" class="form-control form-control-lg" id="profile-settings-username" name="profile-settings-username" placeholder="Enter your username.." value="{{Auth::user()->first_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="profile-settings-name">Last Name</label>
                                                <input type="text" class="form-control form-control-lg" id="profile-settings-name" name="profile-settings-name" placeholder="Enter your name.." value="{{Auth::user()->last_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="profile-settings-email">Email Address</label>
                                                <input type="email" class="form-control form-control-lg" id="profile-settings-email" name="profile-settings-email" placeholder="Enter your email.." value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-10 col-xl-6">
                                                <div class="push">
                                                    <img class="img-avatar" src="assets/media/avatars/avatar15.jpg" alt="">
                                                </div>
                                                <div class="custom-file">
                                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                    <input type="file" class="custom-file-input js-custom-file-input-enabled" id="profile-settings-avatar" name="profile-settings-avatar" data-toggle="custom-file-input">
                                                    <label class="custom-file-label" for="profile-settings-avatar">Choose new avatar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}





                    <div class="block">
                       <div class="block-header block-header-default">
                           <h3 class="block-title">All your Dreams</h3>
                       </div>
                       <div class="block-content block-content-full">
                           <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                           <table class="table table-bordered table-striped table-vcenter js-dataTable-full">

                               <thead>
                                   <tr>
                                       <th class="text-center">Date </th>
                                       <th>Title</th>
                                       <th class="d-none d-sm-table-cell">Tags</th>
                                       <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                       <th class="text-center" style="width: 25%;">Profile</th>
                                   </tr>
                               </thead>

                               <tbody>
                                 @foreach ($dreams as $dream)
                                   <tr>
                                       <td class="text-center">{{$dream->date}}</td>
                                       <td class="font-w600">@if(!empty($dream->title)) {{$dream->title}} @else <i>No Title</i> @endif </td>
                                       <td class="d-none d-sm-table-cell">@if(!empty($dream->tags[0])) @foreach ($dream->tags as $tag)
                                         {{$tag->name}},
                                       @endforeach @else <i> No tags</i> @endif</td>

                                       <td class="d-none d-sm-table-cell">
                                        @if($dream->isPublish())
                                          <span class="badge badge-success">Publish</span>
                                        @else
                                          <span class="badge badge-danger">Draft</span>
                                        @endif
                                       </td>
                                       <td class="text-center">
                                         <a type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Dream" href="/dream/{{$dream->id}}">
                                             <i class="si si-paper-plane"></i>
                                         </a>

                                           <a type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit Dream" href="/dream/{{$dream->id}}/edit">
                                               <i class="si si-settings"></i>
                                           </a>
                                       </td>
                                   </tr>
                                 @endforeach


                               </tbody>

                           </table>
                          <div class="editor-statusbar"><span>Total Dreams: {{$dreams->count()}}</span></div>
                       </div>
                   </div>
                   <!-- END Dynamic Table Full -->


</div>
@endsection

@section('js_after')


        <script>
            $(document).ready(function(){
              $("#sss").click(function(){
                $("#accordion_q1").slideToggle("slow");
              });
              $("#show").click(function(){
                $("p").show();
              });
            });
        </script>

        <script src="{{asset('/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script>jQuery(function(){ Codebase.helpers(['colorpicker']); });</script>


        <!-- Page JS Code -->
        <script src="{{asset('js/pages/tables_datatables.js')}}"></script>

        {{-- <script>
        function truncateText(selector, maxLength) {
            var element = document.querySelector(selector),
                truncated = element.innerText;

            if (truncated.length > maxLength) {
                truncated = truncated.substr(0,maxLength) + '...';
            }
            return truncated;
        }

        document.querySelector('td').innerText = truncateText('td', 107);
        </script> --}}

@endsection
