@extends('layouts.site')
@section('title', $cat->name)
@section('content')

<div class="container">
    <h1 class="text-center">{{$cat->name}}</h1>
    <div class="row featured__filter">
        @foreach($list_product as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="{{ asset('images/product/'.$product->image) }}">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><button onclick="AddCart({{$product->id}})"><i class="fa fa-shopping-cart"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="{{ route('site.slug', ['slug' =>$product->slug]) }}">{{$product->name}}</a></h6>
                    <h5><del>{{ number_format($product->price)}}</del></h5>
                    <h5>{{ number_format($product->pricesale)}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
             {{ $list_product->links() }}
        </div>
</div>
@endsection