@extends('layouts.app')
@section('title','Products')
@section('css')
    <style>
        .custom-btn{
            border-radius: 26px;
            width: 49%;
            /* padding: 9px; */

            color: white;
            outline: none !important;
            box-shadow: none !important;

        }
        .themed-blue{
            background-color: #508FFE;
        }
    </style>
@endsection
@section('_')
    <div class="sub_categorys d-flex">
        <div class="d-flex">
            <div class="sub_category_heading">
                <p class="Ofw-300 fs-18">All Products
                </p>
                <p class="Ofw-700 fs-11 "> {{isset($products)  ? count($products) : 0}} Results found</p>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container my-5" style="margin-top: 0rem!important;">
        <div class="row">
            @include('web.products.product',['data' => isset($products) ? $products : ''])
            {{$products->appends(request()->except('page'))->links('vendor.pagination.default')}}
        </div>
    </div>
@endsection
