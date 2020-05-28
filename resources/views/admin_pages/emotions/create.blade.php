@extends('layouts.admin.backend')
@section('content')
  <div class="container">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Add Emotion Form</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <form action="{{route('emotions.store')}}" method="post">
                                      @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="emotion">{{__('Emotion Name')}}</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="emotion" name="emotion">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-9 ml-auto">
                                                <button type="submit" class="btn btn-alt-success">Add Emotion</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>

@endsection
