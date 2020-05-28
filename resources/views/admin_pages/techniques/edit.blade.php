@extends('layouts.admin.backend')
@section('content')
  <div class="container">
                            <div class="block">
                                <div class="block-header block-header-default text-center">
                                    <h3 class="block-title">Edit Technique Form</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <form action="{{url("/adminpanel/techniques/$technique->id")}}" method="post">
                                      @method('PUT')
                                      @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="technique">{{__('Technique')}}</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="technique" name="technique" value="{{$technique->name}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-9 ml-auto">
                                                <button type="submit" class="btn btn-alt-success" value="update">Update</button>
                                            </div>
                                        </div>
                                    </form>



                                    <form action="{{url("/adminpanel/techniques/$technique->id")}}" method="post">
                                      @method('DELETE')
                                      @csrf
                                      <div class="form-group row ">
                                        <div class="col-lg-9 ml-auto">
                                            <button type="submit" class="btn btn-alt-danger" value="delete">Delete</button>
                                          </div>
                                       <div>
                                    </form>
                                </div>
                            </div>
                          </div>


@endsection
