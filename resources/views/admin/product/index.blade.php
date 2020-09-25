@extends('layouts.admin',['page' => 'products'])
@section('title','All Products')
@section('_')
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Products</h4>
                    <div class="table-responsive">
                        <table id="zero_configuration_table" class="display table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="zero_configuration_table_info">
                            <thead>
                            <tr role="row">
                                <th>S.No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Active</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($productData) > 0)
                                @foreach($productData as $key => $list)
                                    <tr role="row" @if($key/2 != 0) class="odd"  @else class="even" @endif>
                                        <td >{{$productData->firstItem() + $key }}</td>
                                        <td>{{$list->title}}</td>
                                        <td  style="text-align: right;">{{$list->basic_price}}</td>
                                        <td  style="text-align: center;">{{$list->discount}}</td>
                                        <td  style="text-align: center;">
                                            @if($list->active == 'Y')
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            @if($list->resource)
                                                <img src="{{asset('resources/'.$list->id.'.'.$list->extension)}}" width="50px" height="50px">
                                            @else
                                                <img src="{{asset('defaut/default.jpg')}}" width="50px" height="50px">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{route('product.edit',$list->id)}}">Edit</a>
                                                    <a class="dropdown-item delete-action-btn" href="{{route('product.delete',$list->id)}}">Delete</a>
                                                    <a class="dropdown-item" href="{{route('product.status',$list->id)}}">Activate</a>
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
                                @if(count($productData) > 0)
                                    {{$productData->appends(request()->all())->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $("body").on('click','.delete-action-btn',function(e){
            e.preventDefault();
            // console.log($(this).data());
            let t = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "you want to remove this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type : 'GET',
                        url: $(this).attr('href'),
                        data:{
                            _method: $(this).data('_method')
                        },
                        success:function(e){
                            toastr.success('Product has been deleted');
                            window.location.reload();
                        },
                        error:function(w){
                            t.parent().parent().show();
                            console.log(w.responseJSON.message);
                            toastr.error(w.responseJSON.message || 'An error Occured');

                        }
                    });
                }
            })
        })
    </script>
@endsection
