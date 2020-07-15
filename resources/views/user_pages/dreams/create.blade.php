@extends('layouts.user.layout')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">

@endsection

@section('content')
              <div class="container">

                @if(Session::has('error_file'))
                  <div class="alert alert-danger">

                      <i class="fa fa-check-square"></i>&nbsp; &nbsp;{{Session::get('error_file')}}

                  </div>

                @endif


                <h2 class="content-heading" style="text-align: center;">Write your daily dream!</h2>
                <form method="POST" action="{{route('dream.store')}}" enctype="multipart/form-data" id="createForm" name="createForm">
                  @csrf
                  <div class="row">
                    <div class="col-12">
                    <div class="block"  id="box">
                        <div class="block-header block-header-default">
                            <div class="form-material">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" size="50" style="font-size: 20px" placeholder="Title">

                            </div>
                            <div class="btn-group" role="group">
                              <label>Select a color for your Dream! </label>
                            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-paint-brush"></i>
                            </button>
                            <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown" style="">
                                <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                                <h6 class="dropdown-header">Dream Themes</h6>
                                <div class="row no-gutters">
                                    <div class="col-12">

                                      <label class="css-control css-switch">
                                            <input type="radio" class="css-control-input" name="color_id" onClick="borderStyle('none')" value="" >
                                            <span class="css-control-indicator"></span> none
                                        </label>
                                      </div>

                                      @foreach ($colors as $color)
                                        <div class="col-12">


                                          <label class="css-control css-switch">
                                                <input type="radio" class="css-control-input" name="color_id" id="color_{{$color->id}}" onClick="borderStyle('{{$color->hex}}')" value="{{$color->id}}" >
                                                <span class="css-control-indicator"></span> {{$color->name}}
                                            </label>
                                            </div>

                                            {{-- <script>
                                            document.getElementById("color_{{$color->id}}").onclick = function() { ChangeColor("color_{{$color->id}}, {{$color->hex}}"); }
                                            </script> --}}

                                    @endforeach
                                </div>

                            </div>

                        </div>
                        </div>

                        <div class="block-content">
                                <div class="form-group row text-center">
                                    <div class="col-md-10">

                                        <!-- SimpleMDE Container -->
                                        <textarea class="js-simplemde" id="simplemde" name="content" placeholder="Do you haven't enough time for write it? Just write 3 words and we will remember you later!"></textarea>




                                    </div>

                                      <div class="col-md-2">

                                            <label for="flatpickr">When did you dream it?</label>
                                            <div class="col-md-12 mx:auto text-center">
                                              <input type="text" class="js-flatpickr form-control bg-white" id="flatpickr" name="date" placeholder="Y-m-d" value="{{date('Y-m-d')}}">
                                            </div>
                                            <br>

                                            <label>Tags</label>
                                            <div class="col-md-sm-12 text-left mx:auto">
                                              <select class="js-select2 form-control" id="tag" name="tag[]" style="width:100%" data-placeholder="Choose yours tag..." multiple>
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                                @foreach ($tags as $tag)
                                                  <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach

                                            </select>
                                          </div>
                                      </div>




                                </div>

                                <div class="row text-center">
                                  <div class="col-md-5">
                                    <div class="box">
                                      <label>How did you feel?</label>
                                      <div class="col-12">
                                      @foreach ($emotions as $emotion)
                                        {{-- <input type="radio" class="css-control-input" name="emotion_id" value="{{$emotion->id}}" >{{$emotion->emoticon}} --}}
                                          <div class="custom-control custom-radio custom-control-inline mb-5">
                                              <input class="custom-control-input" type="radio" name="emotion_id" id="emotion_{{$emotion->id}}" value="{{$emotion->id}}">
                                              <label class="custom-control-label" data-toggle="tooltip" data-placement="bottom" title="{{$emotion->name}}" for="emotion_{{$emotion->id}}">&#{{$emotion->emoticon}};

                                              </label>
                                          </div>

                                      @endforeach

                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-5 mr-auto">
                                    <div class="box">
                                      <label>Did you use a technique?</label>
                                      <div class="col-6 mx-auto">

                                            <select class="form-control" id="technique" name="technique_id" style="align-items: center" >
                                                <option value="">...</option>

                                                @foreach ($techniques as $technique)
                                                  <option value="{{$technique->id}}">{{$technique->name}}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                  </div>
                                </div>


                                <br><br>



                                <div class="form-group row text-center">
                                  <div class="col-md-4 mx-auto">
                                    <div class="box">
                                      <label>What kind of Dream it was?</label>
                                      <div class="col-8 mx-auto">
                                        <select class="form-control" id="type" name="type_id">
                                            <option value="">...</option>

                                            @foreach ($types as $type)
                                              <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach

                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-4 mx-auto">
                                    <div class="box">
                                      <label>What mood did you feel?</label>
                                      <div class="col-8 mx-auto">
                                        <select class="form-control" id="mood" name="mood_id">
                                            <option value="">...</option>

                                            @foreach ($moods as $mood)
                                              <option value="{{$mood->id}}">{{$mood->name}}</option>
                                            @endforeach

                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-4 mx-auto">
                                    <label>Files</label>
                                        <div class="custom-file">
                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                            <input type="file" class="custom-file-input" id="file" name="file[]" data-toggle="custom-file-input" multiple onchange="uploadFiles()">
                                            <label class="custom-file-label" for="file">Choose files</label>
                                            <input type="hidden" id="fileUp" name="fileUp">
                                        </div>
                                      </div>
                                  </div>

                                  {{-- <label class="css-control css-switch">
                                        <input type="radio" class="css-control-input" name="color_id" onClick="borderStyle('{{$color->hex}}')" value="{{$color->id}}" >
                                        <span class="css-control-indicator"></span> {{$color->name}}
                                    </label>
                                    </div> --}}




                                      {{-- <div class="col-12">
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="example-inline-radio1" value="option1" checked="">
                                                    <label class="custom-control-label" for="example-inline-radio1">&#{{$emotions[0]->emoticon}};</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="example-inline-radio2" value="option2">
                                                    <label class="custom-control-label" for="example-inline-radio2">Option 2</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="example-inline-radio3" value="option3">
                                                    <label class="custom-control-label" for="example-inline-radio3">Option 3</label>
                                                </div>
                                            </div> --}}


                                    {{-- <select class="form-control" id="emotion" name="emotion_id"> --}}




                                    {{-- </select> --}}


                                <br>
                                <div class="row">
                                  {{-- <div class="col-3">

                                        <select class="form-control" id="emotion" name="emotion_id">
                                            <option value="">How did you feel?</option>
                                            @foreach ($emotions as $emotion)
                                              <option value="{{$emotion->id}}">{{$emotion->name}}</option>
                                            @endforeach

                                        </select>
                                    </div> --}}


                                  <div class="col-md-5 mr-auto">
                                      <div class="custom-control custom-checkbox">
                                          <input type="hidden" class="custom-control-input" id="is_in_first_person_hidden" name="is_in_first_person" value="0">
                                          <input type="checkbox" class="custom-control-input" id="is_in_first_person" name="is_in_first_person" value="1">
                                          <label class="custom-control-label" for="is_in_first_person">It was in first person?</label>
                                      </div>
                                    </div>
                                  </div>



                                <div class="row">
                                    <div class="col-md-5 mr-auto">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" class="custom-control-input" id="status_hidden" name="status" value="draft">
                                            <input type="checkbox" class="custom-control-input" id="status" name="status" value="publish">
                                            <label class="custom-control-label" for="status">Is it a publish? </label>
                                        </div>
                                    </div>

                                  </div>


                              {{-- <div class="row">
                                <label for="example-file-multiple-input">Add your file</label>
                                <input type="file" class="form-control-file" style="margin-top: 10px" name="file[]" multiple="">
                              </div>
                              <div class="row"> --}}
                              {{-- <div class="col-4">
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled" style="margin-top: 10px" id="example-file-multiple-input-custom" name="file[]" data-toggle="custom-file-input" multiple="">
                                        <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files</label>
                                    </div>
                                </div> --}}
                              <br>



                            <div class="row text-center">
                              <div class="col-12">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="submit" class="btn btn-rounded btn-outline-info min-width-150 mx:auto" name="submit_btn" style="margin-bottom: 10px" value="Save">
                              </div>
                            </div>

                        </div>
                        {{-- END BOX --}}
                    </div>
                    <!-- END SimpleMDE Editor -->





                    </form>
                  </div>
                  </div>




                  {{-- <form method="post" id="upload_form" enctype="multipart/form-data">
                    @csrf
                    <input id="img_input" type="file" name="image" accept="image/*">
                  </form> --}}
                  {{-- <div class="alert" id="message" style="display: none"></div>
                  <form method="post" id="upload_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                     <table class="table">
                      <tr>
                       <td width="40%" align="right"><label>Select File for Upload</label></td>
                       <td width="30"><input type="file" name="select_file[]" id="select_file" multiple/></td>
                       <td width="30%" align="left"><input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload"></td>
                      </tr>
                      <tr>
                       <td width="40%" align="right"></td>
                       <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                       <td width="30%" align="left"></td>
                      </tr>
                     </table>
                    </div>
                    <input type="hidden" value="" id="result">
                   </form>
                   <br>
                   <span id="uploaded_image"></span>

                   <br>
                   <span id=num></span>
                   <span id=info></span>
                   <div id=prova>
                   </div> --}}


@endsection

@section('js_after')
  <script>
  // $( document ).ready(function() {
  // var prv =  $('textarea').val();
  //   console.log( prv );
  // });



//NON FUNZIONANTE!!!!!


  // function ChangeColor(id, color) {
  //   // var clrDiv = document.getElementById(id);
  //   // clrDiv.style.backgroundColor = color;ù
  //   var elem = document.getElementById(id); // this is your domObj
  //   var theCSSprop = window.getComputedStyle(elem);
  //   // alert(window.getComputedStyle(document.getElementById(id).style.backgroundColor));
  //   console.log(theCSSprop);
  //   // console.log(clrDiv);
  // }
  </script>

        <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>

        <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
        <script>jQuery(function(){ Codebase.helpers(['simplemde']); });</script>




      <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>

        <script>


          // window.changeColour = function(value)
          // {
          //     document.getElementById('box').style.borderLeft = solid value;
          //
          // }
          // function css_switch(id, value){
          //   // if (document.getElementById('id').checked == true) {
          //   // document.documentElement.setAttribute("style", "background-color:" . value ."");
          //   var e = document.getElementById(id).style.backgroundColor;
          //   console.log(e);
          //   document.getElementById(id).style.backgroundColor = value;
          //   var c = document.getElementById(id).style.backgroundColor;
          //   console.log(c);
          //   // } else {
          //   // document.documentElement.setAttribute("style", "background-color: white;");
          //   // document.getElementById('id').style.backgroundColor = white;
          //   // }
          // }

          function borderStyle(value) {
            if(value != 'none'){

                //document.getElementsByClassName("css-control-indicator").style.background = value;

              document.getElementById("box").style.borderLeft = "solid";
              document.getElementById("box").style.borderLeftColor = value;
            }else{
              document.getElementById("box").style.borderLeft = "none";

            }
          }

          </script>
          <script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
          <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>
          <script>jQuery(function(){ Codebase.helpers(['select2']); });</script>

          <script>
          // $(document).ready(function(){
          //     $('.add_more').click(function(e){
          //         e.preventDefault();
          //         $(this).before("<input name='file[]' type='file'/>");
          //     });
          // });
          //
          // $('#upload').click(function() {
          //   var filedata = document.getElementsByName("file"),
          //           formdata = false;
          //   if (window.FormData) {
          //       formdata = new FormData();
          //   }
          //   var i = 0, len = filedata.files.length, img, reader, file;
          //
          //   for (; i < len; i++) {
          //       file = filedata.files[i];
          //
          //       if (window.FileReader) {
          //           reader = new FileReader();
          //           reader.onloadend = function(e) {
          //               showUploadedItem(e.target.result, file.fileName);
          //           };
          //           reader.readAsDataURL(file);
          //       }
          //       if (formdata) {
          //           formdata.append("file[]", file);
          //       }
          //   }
          //   if (formdata) {
          //       $.ajax({
                    // url: "",
          //           type: "POST",
          //           data: formdata,
          //           processData: false,
          //           contentType: false,
          //           success: function(res) {
          //
          //           },
          //           error: function(res) {
          //
          //            }
          //            });
          //           }
          //       });

          // document.getElementById('img_input').onchange = function () {
          //   upload();
          //   };
          //
          //   function upload() {
          //       var upload = document.getElementById('img_input');
          //       var image = upload.files[0];
          //       $.ajax({
          //         url:"",
          //         type: "POST",
          //         data: new FormData($('#img_form')[0]),
          //         contentType:false,
          //         cache: false,
          //         processData:false,
          //         success:function (msg) {}
          //         });
          //   };


            // $(document).on("click", "#upload", function() {
            //   var file_data = $("#avatar").prop("files")[0]; // Getting the properties of file from file field
            //   var form_data = new FormData(); // Creating object of FormData class
            //   form_data.append("file", file_data) // Appending parameter named file with properties of file_field to form_data
            //   form_data.append("user_id", 123) // Adding extra parameters to form_data
            //   $.ajax({
            //     url: "", // Upload Script
            //     dataType: 'script',
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     data: form_data, // Setting the data attribute of ajax with file_data
            //     type: 'post',
            //     success: function(data) {
            //       // Do something after Ajax completes
            //     }
            //   });
            // });



             // $('#upload_form').on('submit', function(event){
             //  event.preventDefault();
             //
             //  var formData = new FormData(this);
             //  $.ajax({
             //    url:"",
             //    method:"POST",
             //    // data:new FormData(this),
             //    data: formData,
             //    dataType:'JSON',
             //    contentType: false,
             //    cache: false,
             //    success:function(data){
             //      $('#message').html(data.message);
             //    }
             //
             //    console.log(formData);
             //
             //
             //
             //  });



              // var files = document.getElementById('select_file');
              //
              // var num = files.files.length;
              // // var arr = [];
              // var infonum = document.getElementById('num');
              //
              //
              // var arr = [];
              //
              // for(var i=0; i < num; i++){
              //   arr[i] = document.getElementById('select_file').files[i].name;
              //   console.log(arr);
              // }
              //
              // var jsonString = JSON.stringify(arr);
              //
              //
              // infonum.innerHTML = prova;
              //
              //
              // // var info = document.getElementById('info');
              // //
              // // info.innerHTML = arr;
              //
              // $.ajax({
              //  url:"",
              //  method:"POST",
              //  // data:new FormData(this),
              //  data: {array: arr},
              //  dataType:'JSON',
              //  contentType: false,
              //  cache: false,
              //  processData: false,
              //  success:function(data)
              //  {
              //
              //   $('#message').css('display', 'block');
              //   $('#message').html(data.message);
              //   $('#message').addClass(data.class_name);
              //   // $('#uploaded_image').html(data.uploaded_image);
              //  }
              // })
              // .done(function(data) {
              //    $('#result').val(data);
              // });
              // });

              function uploadFiles(){
                var leng = document.getElementById('file').files.length;
                var token = $('input[name=_token]');

                var data = new FormData();

                for(var i = 0; i < leng; i++){
                  data.append('file[]', document.getElementById('file').files[i]);
                }
                data.append('fileUp', document.getElementById('fileUp').value);
                // var pre_value = document.getElementById('fileUp').value;
                // if(pre_value != "" || pre_value != null ){
                //   $.ajax({
                //     headers: {
                //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     url: "/delete/old_files/" + pre_value + "",
                //     type: "POST",
                //     data: {old: pre_value},
                //     contentType: false,
                //     processData:false,
                //     cache: false,
                //
                //   });
                // }

                var result = [];
                var res = [];
                $.ajax({
                     url: "{{ route('check.and.upload') }}",
                     type: "POST",
                     data: data,
                     contentType: false,
                     processData: false,
                     headers: {
                         'X-CSRF-TOKEN': token.val()
                     },
                     success: function(data)
                     {
                         result = data.path;

                         $('[name=fileUp').val(JSON.stringify(result));
                         // $('#fileUp').val(result);
                         alert(data.message);


                     }

                });
              }

              // $(window).bind("pageshow", function() {
              //   $(document).ready(function(){
              //       $('#createForm').
              //   });
              // });


              // $(document).ready(function () {
              //
              //
              //   $('#save').click(function() {
              //       unsaved = false;
              //   });
              //
              //
              //
              // });

//               window.onunload = function() {
//                   alert('Bye.');
//               }
//
//               $(window).unload(function(){
//   alert('Bye.');
// });
//             }
window.onbeforeunload = goodbye;
$("#createForm").on("submit", function(event){
        window.onbeforeunload = null;
});



// $(document).ready(function(e){
//   $("#createForm").on("input", function() {
//     window.onbeforeunload = goodbye;
//   });
// });

var inputsDefault = document.getElementsByTagName('input');
var selectDefault = document.getElementsByTagName('select');
var formDefault = false;


if(inputsDefault['title'].value == "" && inputsDefault['emotion_id'].value == "1" && inputsDefault['is_in_first_person'].value == "1" && inputsDefault['file'].value == ""
    && selectDefault['type'].value == "" && selectDefault['mood'].value == "" && selectDefault['tag'].value == "" && selectDefault['technique'].value == ""){
   formDefault = true;
};


// console.log(default);

// $(document).ready(function(e){
//   var inputsDefault = document.getElementsByTagName('input');
//   // console.log(inputsDefault);
//   // e.preventDefault;
// //   if(e.preventDefault){
// //     window.onbeforeunload = null;
// //   }else{
// //     window.onbeforeunload=goodbye;
// //   };
// //   var inp = document.getElementsByTagName('input');
// //   var val = setOnbeforeload(inp);
// // });
// //
// //
// // function setOnbeforeunload(inp){
// //   for(index = 0; index < inp.legth; index++){
// //     if(input)
// //   }
// //
// //   console.log(inp);
// });

// $('#createForm').on('change', function(e){
//     window.onbeforeunload = goodbye;
// });
//
// var oldVal = "";
// $("#simplemde").on("change keyup paste", function() {
//     var currentVal = $(this).val();
//     if(currentVal == oldVal) {
//         return; //check to prevent multiple simultaneous triggers
//     }
//
//     oldVal = currentVal;
//     //action to be performed on textarea changed
//     alert("changed!");
// });

function goodbye(e) {

  let myForm = document.getElementById('createForm');
  let formData = new FormData(myForm);
  document.forms["createForm"].submit();



  var content = document.getElementById('simplemde').value;
  if(formDefault == true && content == ""){
    return;
  };

  if(!e) e = window.event;

  //e.cancelBubble is supported by IE - this will kill the bubbling process.
  e.cancelBubble = true;
  e.returnValue = 'You sure you want to leave?'; //This is displayed on the dialog
  // var text = document.getElementById('textarea').value;
  // var message = $('#textarea').val();

  // let myForm = document.getElementById('createForm');
  // let formData = new FormData(myForm);
  // var token = $('input[name=_token]');


//   var simplemde = new SimpleMDE({ element: $("#simplemde")[0] });
//   var editor = simplemde.fromTextArea(), {
//   mode: "javascript",
//   autoRefresh:true,
//   lineNumbers: false,
//   lineWrapping: true,
//
// });

 //  var simplemde = new SimpleMDE({
 //    element: document.getElementById("simplemde"),
 //    autosave: {
 //    		enabled: true,
 //    		uniqueId: "simplemde",
 //    		delay: 1,
	//    },
 //     forceSync: true,
 // });
 // var text = simplemde.value();
 //
 //  setTimeout(function() {
 //      text.refresh();
 //  },1);
 // var simplemde = new SimpleMDE({element: document.getElementById('simplemde', forceSync: true,)});

// console.log(simplemde.value());
 //
 // var prova = simplemde.codemirror.getValue();
 // console.log(prova);
  // var text = simplemde.value();

  // var dati = $("#createForm").serialize()+"&text="+JSON.stringify(simplemde.value());
  // var simplemde = new SimpleMDE({ element: $("")[0] });
  // // var text = simplemde.value();
  // console.log(simplemde);
  // var prova = text.value;
  //
  // var text = document.getElementById('textarea');
  //
  // console.log(prova);

  // formData.append('content',);


  // document.forms["createForm"].submit();
  //
  // var content = document.getElementById('simplemde').value;
  //

    formData.append('content', content);

    $.ajax({
      url: "{{ route('dream.store') }}",
      type: "POST",
      data: formData,
      contentType: false,
      processData:false,
      // headers: {
      //     'X-CSRF-TOKEN': token.val()
      // },
    });


  // formData.append('content', content);
  //
  // $.ajax({
  //   url: "",
  //   type: "POST",
  //   data: formData,
  //   contentType: false,
  //   processData:false,
  //   // headers: {
  //   //     'X-CSRF-TOKEN': token.val()
  //   // },
  // });


  //e.stopPropagation works in Firefox.
  if (e.stopPropagation) {
      e.stopPropagation();
      e.preventDefault();
  }

  var prova

}



              // window.onbeforeunload = confirmExit;
              //
              //
              // $("#createForm").on("submit", function(event){
              //         window.onbeforeunload = null;
              // });
              //
              //
              //
              //
              //
              // function submitData(){
              //   if(window.onbeforeunload == confirmExit){
              //
              //   }
              // }
              //
              //
              // function confirmExit()
              // {
              //   // document.getElementById('createForm').submit();
              //
              //
              //   return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
              // }

              $('')


            </script>
@endsection
