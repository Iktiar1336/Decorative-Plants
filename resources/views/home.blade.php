@extends('layouts.profile')

@section('title')
Decorative Plant | Home
@endsection

@section('css')
<link href="{{asset('/front/assets/css/checkout.css')}}" rel="stylesheet">
<style>
    @media only screen and (max-width: 628px) {
        .container {
            margin-left: 20px;
        }

        .sidebar {
            width: 90%;
        }

        .card {
            width: 90%;
            margin: 10px;
            margin-right: 40px;
        }
    }
</style>
@endsection

@section('breadcumb')
<div id="breadcrumb">
    <h5><a class="active" href="/"> Home </a>/
        Dashboard</h5>
</div>
@endsection

@section('content')

@endsection