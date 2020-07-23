@extends('layouts.admin.backend')

@section('css_before')
  <link rel="stylesheet" href="{{asset('js/plugins/datatables/dataTables.bootstrap4.css')}}">

@endsection

@section('content')

  <div class="container">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Users Table</small></h3>
        </div>

        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>First Name Last Name #ID</th>
                        <th class="d-none d-sm-table-cell">Email</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Email confirmed</th>
                        <th class="text-center" style="width: 15%;">Profile</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="font-w600">{{$user->last_name}} {{$user->first_name}} #{{$user->id}}</td>
                        <td class="d-none d-sm-table-cell">{{$user->email}}</td>
                        <td class="d-none d-sm-table-cell">

                            @if ($user->email_verified_at == NULL)
                              <span class="badge badge-danger" style="width: 50px">  <i class="fa fa-close"></i>
                            @else
                              <span class="badge badge-success" style="width: 50px"> <i class="fa fa-check"></i>
                            @endif
                            </span>
                        </td>
                        <td class="text-center">
                            <a type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer" href="{{route('admin.user.edit', "$user->id")}}">
                                <i class="fa fa-user"></i>
                                {{-- <span class="badge badge-info">{{$user->role->role}}</span> --}}
                            </a>
                            @if ($user->role->role == 'admin')
                              <span style="width: 50px" class="badge badge-success">{{$user->role->role}}</span>
                            @elseif ($user->role->role == 'guest')
                              <span style="width: 50px" class="badge badge-info">{{$user->role->role}}</span>

                            @endif
                        </td>
                    </tr>


                  @endforeach


                </tbody>
            </table>
        </div>
      </div>
    </div>

@endsection

@section('js_after')
        <script src="{{asset('/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>


        <!-- Page JS Code -->
        <script src="{{asset('js/pages/tables_datatables.js')}}"></script>

@endsection
