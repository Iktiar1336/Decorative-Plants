@extends('layouts.front')

@section('title')
Decorative Plant ! Home
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<style>
    body{
        overflow-x: hidden;
        margin: 0;
        padding: 0;
    }
    .pagination {
        margin-right: 30px;
    }

    
</style>
@endsection

@section('cart')
<sup><span class="badge badge-danger"></span></sup>
@endsection

@section('content')
<div class="row container m-auto">
    @foreach ($products as $item)
    <div class="col-sm-4 m-auto">
        <div class="card">
            <a href="{{ url('/product/' . $item->slug) }}"><img class="card-img-top" src="{{ secure_asset('storage/products/' . $item->image) }}" alt="Green Florest"></a>
            <div class="card-body">
                <p id="tittle">{{$item->name}}</p>
                <p id="price">IDR {{ number_format($item->price) }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row float-right">
    @if ($products->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($products->currentPage() == 1) ? ' disabled' : '' }} page-item">
            <a href="{{ $products->url(1) }}" class="page-link">Previous</a>
        </li>
        @for ($i = 1; $i <= $products->lastPage(); $i++)
            <li class="{{ ($products->currentPage() == $i) ? ' active' : '' }} page-item">
                <a href="{{ $products->url($i) }}" class="page-link">{{ $i }}</a>
            </li>
            @endfor
            <li class="{{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }} page-item">
                <a href="{{ $products->url($products->currentPage()+1) }}" class="page-link">Next</a>
            </li>
    </ul>
    @endif
</div>

@endsection

@section('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection