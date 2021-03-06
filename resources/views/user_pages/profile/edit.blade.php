@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/magnific-popup/magnific-popup.css')}}">

@endsection

@section('content')
  <div class="container">
    <div class="col-xl-10 mx-auto">
      <!-- Material Register -->
      <div class="block block-themed">
          <div class="block-header bg-info">
              <h3 class="block-title text-center">Informations</h3>
              {{-- <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                  </button>
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
              </div> --}}
          </div>
          <div class="block-content">

              <form action="{{url("profile/img/$asset->id")}}" method="post" enctype="multipart/form-data">

                @method('PUT')
                @csrf
                <div class="form-group row text-center">
                  <div class="mb-15 mx-auto">
                      {{-- <a class="img-link" @if($asset->checkImg()) href="{{asset($asset->path_avatar)}}" @else href="{{url("profiles/avatars/$asset->path_avatar")}}"  @endif >
                          <img class="img-avatar img-avatar96 img-avatar-thumb" @if($asset->checkImg()) src="{{asset($asset->path_avatar)}}" @else src="{{url("profiles/avatars/$asset->path_avatar")}}"  @endif alt="">
                      </a> --}}
                        <div class="items-push js-gallery img-fluid-100">
                              <a class="img-link img-link-zoom-in img-thumb img-lightbox" @if($asset->checkImg()) href="{{asset($asset->path_avatar)}}" @else href="{{url("profiles/avatars/$asset->path_avatar")}}"  @endif>
                                  <img class="img-avatar img-avatar96 img-avatar-thumb" @if($asset->checkImg()) src="{{asset($asset->path_avatar)}}" @else src="{{url("profiles/avatars/$asset->path_avatar")}}"  @endif alt="">
                              </a>
                        </div>

                      <div class="row">
                        <div class="col-12">
                          <hr>
                        </div>
                      </div>
                      <i>Change your avatar icon</i>
                      <br>
                      <input type="file" name="path_avatar">

                      <input type="submit" class="btn btn-sm btn-info">
                    </form>


                    @if($asset->checkImg())
                      <form action="{{url("profile/img/$asset->id")}}" method="POST">
                        @method('DELETE')
                        @csrf

                        <input type="submit" class="btn btn-sm-danger" value="Remove img">

                      </form>

                    @endif


                  </div>
              </div>





              <form action="{{url("profile/$user->id")}}" method="post">

                @method('PUT')
                @csrf

                  <div class="form-group row">
                      <div class="col-6">
                          <div class="form-material">
                              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your firstname.." value="{{Auth::user()->first_name}}">
                              <label for="first_name">First name</label>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-material">
                              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your lastname.." value="{{Auth::user()->last_name}}">
                              <label for="last_name">Last name</label>
                          </div>
                      </div>
                  </div>
                  {{-- <div class="form-group row">
                      <div class="col-12">
                          <div class="form-material input-group">
                              <input type="text" class="form-control" id="register5-account" name="register5-account" placeholder="Company's name.." >
                              <label for="register5-account">Company</label>
                              <div class="input-group-append">
                                  <span class="input-group-text">.example.com</span>
                              </div>
                          </div>
                      </div>
                  </div> --}}
                  <div class="form-group row">
                      <div class="col-12">
                          <div class="form-material input-group">
                              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email.." value="{{Auth::user()->email}}">
                              <label for="email">Email</label>
                              <div class="input-group-append">
                                  <span class="input-group-text">
                                      <i class="fa fa-envelope-o"></i>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- <div class="form-group row">
                      <div class="col-12">
                          <div class="form-material input-group">
                              <input type="password" class="form-control" id="register5-password" name="register5-password" placeholder="Enter your password..">
                              <label for="register5-password">Password</label>
                              <div class="input-group-append">
                                  <span class="input-group-text">
                                      <i class="fa fa-asterisk"></i>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-12">
                          <div class="form-material input-group">
                              <input type="password" class="form-control" id="register5-password2" name="register5-password2" placeholder="Confirm your password..">
                              <label for="register5-password2">Confirm Password</label>
                              <div class="input-group-append">
                                  <span class="input-group-text">
                                      <i class="fa fa-asterisk"></i>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div> --}}
                  <div class="form-group row">
                    <div class="col-6 col-md-4">

                        <ul class="list list-simple-mini font-size-sm">
                            <li>
                                <a class="link-effect font-w600" href="{{route('password.request')}}">Reset password</a>
                            </li>
                            @if($user->email_verified_at == NULL)
                              <li>
                                  <a class="link-effect font-w600" href="{{route('verification.notice')}}">Confirm your email</a>
                              </li>
                            @endif
                        </ul>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-5 mr-auto">
                      <div class="custom-control custom-checkbox mb-5">
                          @if($user->isSubToNewsletter())
                            <input type="hidden" name="newsletter" value="1">
                            <input class="custom-control-input" type="checkbox" name="newsletter" id="newsletter" value="0">
                            <label class="custom-control-label" for="newsletter">Unsubscribe to newsletter!</label>
                          @else
                            <input type="hidden" name="newsletter" value="0">
                            <input class="custom-control-input" type="checkbox" name="newsletter" id="newsletter" value="1">
                            <label class="custom-control-label" for="newsletter">Subscribe to newsletter!</label>
                          @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-3 ml-auto">
                        <input type="submit" class="btn btn-rounded btn-outline-info min-width-125 mb-10" value="Save"></button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
      <!-- END Material Register -->
  </div>
</div>
@endsection

@section('js_after')
  <script>jQuery(function(){ Codebase.helpers('magnific-popup'); });</script>
  <script src="{{asset('js/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
@endsection
