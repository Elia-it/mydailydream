@extends('layouts.admin.backend')

@section('content')

  <div class="block mx-auto" style="width: 80%">
                            <!-- Material Login -->
                            <div class="block block-themed">
                                <div class="block-header" id="block_header">
                                    <h3 class="block-title">Edit Type</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                  <form action="{{route('admin.type.update', $type->id)}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                         <div class="col-12">
                                             <div class="form-material floating">
                                                 <input type="text" class="form-control" id="type_name" name="type_name" value="{{$type->name}}">
                                                 <label for="type_name">{{__('Type Name')}}</label>
                                             </div>
                                         </div>
                                     </div>


                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-info">
                                                    <i class="fa fa-arrow-right mr-5"></i>Edit Type
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Material Login -->

                          </div>
                          </div>
@endsection
