@extends('layouts.admin',['page' => 'Admins'])
@section('title','All Admins')
@section('_')
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Admins</h4>
                    <div class="table-responsive">
                        <table id="zero_configuration_table" class="display table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="zero_configuration_table_info">
                            <thead>
                            <tr role="row">
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($adminData) > 0)
                                @foreach($adminData as $key => $list)
                                    <tr role="row" @if($key/2 != 0) class="odd"  @else class="even" @endif>
                                        <td >{{$adminData->firstItem() + $key }}</td>
                                        <td>{{$list->name}}</td>
                                        <td  style="text-align: right;">{{$list->email}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{route('admin.edit',$list->id)}}">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="16">
                                        <h5 class="text-center">No product found</h5>
                                    </td>
                                </tr>
                            @endif
                            </tbody>

                        </table>
                    </div>
                    <div class="row" style="float:right">
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="zero_configuration_table_paginate">
                                @if(count($adminData) > 0)
                                    {{$adminData->appends(request()->all())->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
