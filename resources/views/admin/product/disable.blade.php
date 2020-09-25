@extends('layouts.admin',['page' => 'products'])
@section('title','Status Product')
@section('css')
    <style>
        .hr_{
            border: 0;
            border-top: 1px solid rgba(0,0,0,.1);
            height: 0;
            margin-top: 0rem;
            margin-bottom: 0rem;
        }
    </style>
@endsection
@section('_')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <div class=" flex-column">
                        <form action="{{route('product.disable', $product->id)}}" method="post" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Active</label>
                                <select class="form-control" id="exampleFormControlSelect2" name="active">
                                    <option value="Y" {{ $product->active == 'Y' ? 'selected' : '' }}>Yes</option>
                                    <option value="N" {{ $product->active == 'N' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary pd-x-20 ladda-button" data-style="expand-right">{{ isset($product) ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
