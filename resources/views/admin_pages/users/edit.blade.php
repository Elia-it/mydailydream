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
                                  <div class="row items-push">
                                      {{-- <div class="col-lg-3">
                                          <p class="text-muted">
                                              Your account’s vital info. Your username will be publicly visible.
                                          </p>
                                      </div> --}}
                                      <div class="col-lg-9 offset-lg-1">
                                          <div class="form-group row">
                                              <div class="col-9">
                                                  <label for="first_name">First name</label>
                                                  <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" placeholder="Enter your username.." value="{{$user->first_name}}" disabled>
                                              </div>
                                              <div class="col-3">
                                                <div class="form-material floating">
                                                    <select class="form-control" id="role_id" name="role_id" disabled>
                                                        <option value="{{$user->role_id}}">{{$user->role->role}}</option><!-- Empty value for demostrating material select box -->
                                                        @php
                                                          $class_roles = new App\Role;
                                                          $roles = $class_roles->getRoles();

                                                        @endphp

                                                       @foreach ($roles as $role)
                                                          @php
                                                            if($role->id == $user->role_id){
                                                              continue;
                                                            }
                                                          @endphp
                                                          <option value="{{$role->id}}">{{$role->role}}</option>
                                                        @endforeach

                                                    </select>
                                                    <label for="role_id">Role</label>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-9">
                                                  <label for="last_name">Last name</label>
                                                  <input type="text" class="form-control form-control-lg" id="last_name" name="last_name" placeholder="Enter your name.." value="{{$user->last_name}}" disabled>
                                              </div>
                                              <div class="col-3">
                                                  <label for="gender">Gender</label>
                                                  <input type="text" class="form-control form-control-lg" id="gender" name="gender" placeholder="Enter your name.." value="{{$user->gender}}" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-12">
                                                  <label for="email">Email Address</label>
                                                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email.." value="{{$user->email}}" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-md-10 col-xl-6">
                                                  {{-- <div class="push">
                                                      <img class="img-avatar" src="assets/media/avatars/avatar15.jpg" alt="">
                                                  </div> --}}

                                              </div>
                                          </div>

                                          <div class="form-group row">
                                              <div class="col-9">
                                                  <button type="submit" class="btn btn-alt-primary" id="update" disabled>Update</button>
                                              </div>
                                              <div class="col-3">
                                                  <button class="btn btn-alt-danger" id="delete" data-confirm="Are you sure to delete this user?" >Delete</button>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-12">
                                              <label class="css-control css-control-info css-switch">
                                                <input type="checkbox" class="css-control-input" id="btn">
                                                <span class="css-control-indicator"></span> Enable to update
                                            </label>
                                        </div>
                                      </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                      <!-- END User Profile -->
</div>


@endsection

@section('js_after')
<script>
var arr = [];

function ArrInputs(){
  return arr = [document.getElementById('first_name'), document.getElementById('last_name'), document.getElementById('email'), document.getElementById('role_id'), document.getElementById('gender'), document.getElementById('update'), document.getElementById('delete')];
}

document.getElementById("btn").addEventListener("click",function(e) {
  arr = ArrInputs();
  if($('#btn').is(':checked')) {

    for(var i = 0; i < arr.length; i++){
      arr[i].disabled = false;
    }

  } else {

    for(var i = 0; i < arr.length; i++){
      arr[i].disabled = true;
    }
    $( "#first_name" ).prop( "disabled", true );

  }
});

document.getElementById("delete").addEventListener("click", function(e){
  event.preventDefault();

	  var choice = confirm(this.getAttribute('data-confirm'));

	  if (choice) {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{route('admin.user.destroy', "$user->id")}}",
        type: 'DELETE',
        dataType: "JSON",
        data: {
            "id": {{$user->id}}
        },
        success: function(data){
          window.location.href = data.link;
        }
      });
  }
});



</script>

@endsection
