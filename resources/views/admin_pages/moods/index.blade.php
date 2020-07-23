@extends('layouts.admin.backend')


@section('content')
                  <div class="container">
                  <!-- Striped Table -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Moods Table</h3>
                            {{-- <div class="block-options">
                                <div class="block-options-item">
                                    <code>.table-striped</code>
                                </div>
                            </div> --}}
                            <a href="{{route('admin.mood.create')}}">
                              <button type="button" class="btn btn-alt-success min-width-125 js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;">
                                Add Mood
                              </button>
                            </a>
                        </div>
                        <div class="block-content">
                            <table class="table table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Mood</th>
                                        {{-- <th class="d-none d-sm-table-cell" style="width: 15%;">Mood</th> --}}
                                        <th class="text-center" style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($moods as $mood)
                                    <tr>
                                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                        <td>{{$mood->name}}</td>
                                        {{-- <td class="d-none d-sm-table-cell">
                                            <span><i class="fa fa-square fa-2x" style="color: {{$color->hex}}"></i></span>
                                        </td> --}}
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" href="{{route('admin.mood.edit', $mood->id)}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete" onclick="deleteMood({{$mood->id}})">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Striped Table -->
                  </div>


@endsection

@section('js_after')

  <script>


    function deleteMood(id){

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax(
          {
          url: '/adminpanel/moods/'+id,
          type: 'delete', // replaced from put
          dataType: "JSON",
          data: {
              "id": id // method and token not needed in data
          },

         //  success: function (response)
         //  {
         //      console.log(response); // see the reponse sent
         //  },
         //  error: function(xhr) {
         //   console.log(xhr.responseText); // this line will save you tons of hours while debugging
         //  // do something here because of error
         // }
       });
       window.location.reload();

      }

  </script>

@endsection
