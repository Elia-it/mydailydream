@extends('layouts.user.layout')

@section('content')
  <div class="container">
    <div class="col-xl-10 mx-auto">
      <!-- Material Register -->
      <div class="block block-themed">
          <div class="block-header bg-success">
              <h3 class="block-title text-center">Informations</h3>
              <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                  </button>
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
              </div>
          </div>
          <div class="block-content">
              <form action="{{url("profile/$user->id")}}" method="post">

                @method('PUT')
                @csrf
                <div class="form-group row text-center">
                  <div class="mb-15 mx-auto">
                      <a class="img-link" href="{{asset('media/avatars/prova_img.jpg')}}" >
                          <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('media/avatars/prova_img.jpg')}}" alt="">
                      </a>
                      <div class="row">
                        <div class="col-12">
                          <hr>
                        </div>
                      </div>
                      <i>Change your avatar icon</i>
                      <br>
                      <input type="file">
                  </div>
              </div>


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
