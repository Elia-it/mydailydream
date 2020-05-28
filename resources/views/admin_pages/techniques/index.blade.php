@extends('layouts.admin.backend')
@section('content')

<div class="container">
                  <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">All Techniques</h3>
                            {{-- <div class="block-options">

                            </div>
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_1"></label> --}}
                            <a href="/adminpanel/techniques/create">
                              <button type="button" class="btn btn-alt-success min-width-125 js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;">
                              Add Technique
                              </button>
                            </a>
                        </div>
                        <div class="block-content">
                            <table class="table table-striped table-vcenter">
                                <thead>

                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Name of Technique</th>


                                        <th class="text-center" style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach ($techniques as $technique)

                                    <tr>
                                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                        <td>{{$technique->name}}</td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/adminpanel/techniques/{{$technique->id}}/edit">
                                                  <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    Edit <i class="fa fa-pencil"></i>
                                                </button>
                                              </a>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
@endsection
