@extends('layouts.admin.backend')

@section('content')
  <div class="container">
  <div class="bg-image bg-image-bottom" style= @if($user->user_attatchment->isImg()) "background-image: url('{{asset($user->user_attatchment->background)}}');" @else "background-color: {{$user->user_attatchment->background}};" @endif>
                      <div class="bg-black-op-75 py-30">
                          <div class="content content-full text-center">
                              <!-- Avatar -->
                              <div class="mb-15">
                                <a class="img-link" @if($user->user_attatchment->checkImg()) href="{{asset($user->user_attatchment->path_avatar)}}"  @else href="{{url("profiles/avatars/".$user->user_attatchment->path_avatar."")}}"  @endif >
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" @if($user->user_attatchment->checkImg()) src="{{asset($user->user_attatchment->path_avatar)}}"  @else src="{{url("profiles/avatars/".$user->user_attatchment->path_avatar."")}}" @endif alt="">
                                </a>
                            </div>
                            <!-- END Avatar -->

                            <!-- Personal -->
                            <h1 class="h3 text-white font-w700 mb-10">{{$user->first_name . " " . $user->last_name}}</h1>
                            <h2 class="h5 text-white-op">
                                Role: <a class="text-primary-light" href="">{{$user->role->role}}</a>
                            </h2>
                            <!-- END Personal -->

                            <!-- Actions -->
                            <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5">
                                <i class="fa fa-arrow-left mr-5"></i> Back
                            </a>
                            <!-- END Actions -->
                        </div>
                    </div>
                </div>
                <!-- END User Info -->

                <!-- Main Content -->
                <div class="content">
                    <!-- User Profile -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                <i class="fa fa-user-circle mr-5 text-muted"></i> User Profile
                            </h3>
                        </div>
                        <div class="block-content">
                                <form action="{{route('admin.user.update', "$user->id")}}" method="POST" enctype="multipart/form-data">
                                  @method('PUT')
                                  @csrf
                                    <div class="col-lg-3">
                                        {{-- <p class="text-muted">
                                            Your account’s vital info. Your username will be publicly visible.
                                        </p> --}}
                                    </div>
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="first_name">first_name</label>
                                                <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" placeholder="Enter your username.." value="{{$user->first_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="last_name">Last_name</label>
                                                <input type="text" class="form-control form-control-lg" id="last_name" name="last_name" placeholder="Enter your name.." value="{{$user->last_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email.." value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            {{-- <div class="col-md-10 col-xl-6">
                                                <div class="push">
                                                    <img class="img-avatar" src="assets/media/avatars/avatar15.jpg" alt="">
                                                </div>
                                                <div class="custom-file">
                                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                    <input type="file" class="custom-file-input" id="profile-settings-avatar" name="profile-settings-avatar" data-toggle="custom-file-input">
                                                    <label class="custom-file-label" for="profile-settings-avatar">Choose new avatar</label>
                                                </div>
                                            </div> --}}
                                        </div>
                                        {{-- <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-primary">Update</button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END User Profile -->
                  </div>
@endsection
