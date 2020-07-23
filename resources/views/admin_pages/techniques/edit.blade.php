@extends('layouts.admin.backend')

@section('content')
  <div class="container">

  <div class="block mx-auto" style="width: 80%">
                            <!-- Material Login -->
      <div class="block block-themed">
          <div class="block-header" id="block_header">
              <h3 class="block-title">Edit Technique</h3>
              <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                  </button>
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
              </div>
          </div>
          <div class="block-content">
            <form action="{{route('admin.technique.update', $technique->id)}}" method="POST">
              @method('PUT')
              @csrf
              <div class="form-group row">
                   <div class="col-12">
                       <div class="form-material floating">
                           <input type="text" class="form-control" id="technique_name" name="technique_name" value="{{$technique->name}}">
                           <label for="technique_name">{{__('Technique Name')}}</label>
                       </div>
                   </div>
               </div>


                  <div class="form-group row">
                      <div class="col-12">
                          <button type="submit" class="btn btn-alt-info">
                              <i class="fa fa-arrow-right mr-5"></i>Edit Technique
                          </button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
      <!-- END Material Login -->

    </div>
  </div>
</div>
@endsection
