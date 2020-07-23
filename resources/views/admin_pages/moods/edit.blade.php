@extends('layouts.admin.backend')

@section('content')

  <div class="block mx-auto" style="width: 80%">
                            <!-- Material Login -->
                            <div class="block block-themed">
                                <div class="block-header" id="block_header">
                                    <h3 class="block-title">Edit Mood</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                  <form action="{{route('admin.mood.update', $mood->id)}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                         <div class="col-12">
                                             <div class="form-material floating">
                                                 <input type="text" class="form-control" id="mood_name" name="mood_name" value="{{$mood->name}}">
                                                 <label for="mood_name">{{__('Mood Name')}}</label>
                                             </div>
                                         </div>
                                     </div>


                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-info">
                                                    <i class="fa fa-arrow-right mr-5"></i>Edit Mood
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
