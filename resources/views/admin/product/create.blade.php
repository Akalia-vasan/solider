@extends('layouts.admin',['page' => 'products'])
@section('title','Create Product')
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
                        <form action="{{route('product.store')}}" method="post" class="needs-validation" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id ?? null}}">
                            <div class="form-group">
                                <label for="">Product Title</label>
                                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Product Title" value="{{$product->title ?? old('title')}}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Enter Some Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Enter Description" >{{old('description') ?? $product->description ?? ''}}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="basic_price" class="form-control @error('basic_price') is-invalid @enderror" placeholder="Enter price" value="{{$product->basic_price ?? old('basic_price')}}" min="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                @error('basic_price')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Enter Discount <small class="text-danger bold">In percent without percent sign</small></label>
                                <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" placeholder="Enter Discount" value="{{$product->discount ?? old('discount')}}" min="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                @error('discount')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Upload Image of 200x200 dimensions</label>
                                <input type="file" class="form-control inputstl" id="selphoto" name="image" accept="image/png, image/jpeg,image/jpg,image/webp">
                                @error('image')
                                <div class="invalid-feedback" style="display: block;margin-bottom: 10px;">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @if(isset($product) && $product->resource)
                                <div class="row">
                                    <div class="col-md-2 _imgCard">
                                        <div class="card">
                                            <img src="{{asset('resources/'.$product->id.'.'.$product->extension)}}" alt="No image">
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endif
                            <button type="submit" class="btn btn-primary pd-x-20 ladda-button" data-style="expand-right">{{ isset($product) ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
