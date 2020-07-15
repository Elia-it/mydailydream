@extends('layouts.admin.backend')
@section('content')
  <div class="container">
    @if (Session::has('error'))
      <div class="alert alert-danger">

          <i class="fa fa-window-close"></i>&nbsp; &nbsp;{{Session::get('error')}}

      </div>
    @endif
                            <div class="block mx-auto" style="width: 80%">
                                <div class="block-header block-header-default text-center">
                                    <h3 class="block-title">Edit Emotion Form</h3>
                                    <div class="block-options">

                                    </div>
                                </div>
                                <div class="block-content">
                                    <form action="{{url("/adminpanel/emotions/$emotion->id")}}" method="post">
                                      @method('PUT')
                                      @csrf
                                        {{-- <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="emotion">{{__('Emotion')}}</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="emotion" name="emotion" value="{{$emotion->name}}">
                                            </div>
                                            <div class="col-4">
                                              <div class="form-material">
                                                   <select class="form-control" id="emoticon" name="emoticon">
                                                       <option>...</option>
                                                       @php
                                                         $emo = new App\Emotion;
                                                         $arr = $emo->getArrayOfEmoticons();
                                                       @endphp

                                                       @foreach ($arr as $emote)
                                                         <option value="{{$emote}}">&#{{$emote}}</option>
                                                       @endforeach

                                                   </select>
                                                   <label for="emoticon">Emoticon</label>
                                               </div>
                                            </div>
                                        </div> --}}

                                        <div class="form-group row">
                                             <div class="col-8">
                                                 <div class="form-material floating">
                                                     <input type="text" class="form-control" id="emotion" name="emotion" value="{{$emotion->name}}">
                                                     <label for="emotion">{{__('Emotion Name')}}</label>
                                                 </div>
                                             </div>
                                             <div class="col-4">
                                               <div class="form-material">
                                                    <select class="form-control" id="emoticon" name="emoticon">
                                                        <option value="{{$emotion->emoticon}}">&#{{$emotion->emoticon}}</option>
                                                        @php
                                                          $emo = new App\Emotion;
                                                          $arr = $emo->getArrayOfEmoticons();
                                                        @endphp

                                                        @foreach ($arr as $emote)
                                                          <option value="{{$emote}}">&#{{$emote}}</option>
                                                        @endforeach

                                                    </select>
                                                    <label for="emoticon">Emoticon</label>
                                                </div>
                                             </div>
                                         </div>

                                        <div class="form-group row">
                                            <div class="col-lg-9 ml-auto">
                                                <button type="submit" class="btn btn-alt-success" value="update">Update</button>
                                            </div>
                                        </div>
                                    </form>



                                    {{-- <form action="{{url("/adminpanel/emotions/$emotion->id")}}" method="post">
                                      @method('DELETE')
                                      @csrf
                                      <div class="form-group row ">
                                        <div class="col-lg-9 ml-auto">
                                            <button type="submit" class="btn btn-alt-danger" value="delete">Delete</button>
                                          </div>
                                       <div>
                                    </form> --}}
                                </div>
                            </div>
                          </div>


@endsection
