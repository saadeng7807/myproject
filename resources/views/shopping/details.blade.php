@extends('layouts.app')
@section('content')


<style>
        body {
            background-color: #f8f9fa;
        }
        .product-image {
            max-height: 350px;
            object-fit: contain;
        }
        .product-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

<div class="container my-5">
        <div class="row">
            <!-- صورة المنتج -->
            <div class="col-md-6">
                <img src="{{$product->image}}" class="img-fluid product-image" alt="صورة المنتج">
            </div>
            <!-- تفاصيل المنتج -->
            <div class="col-md-6">
                <div class="product-details">
                    <h2 class="mb-3"> {{$product->name}} </h2>
                    <p class="text-muted mb-2">الفئة: إلكترونيات</p>
                    <h4 class="text-success mb-3">{{$product->price}} ر.س</h4>
                    <p class="mb-4">
                    {{$product->descreption}}
                    </p>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('shopping.cart') }}" class="btn btn-primary btn-lg">إضافة إلى السلة</a>
                        </div>
                        <div class="col">
                            <a href="{{ route('shopping.checkout') }}" class="btn btn-success btn-lg">  الذهاب الى صفحة الدفع </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
