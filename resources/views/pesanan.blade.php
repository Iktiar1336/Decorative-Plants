@extends('layouts.profile')

@section('title')
List Pesanan
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
        }
    }
</style>
@endsection

@section('breadcumb')
<div id="breadcrumb">
    <h5><a class="active" href="/"> Home </a>/
        List Pesanan</h5>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Pesanan</h4>
            </div>
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Penerima</th>
                                <th>No Telp</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($orders as $row)
                            <tr>
                                <td><strong>{{ $row->invoice }}</strong></td>
                                <td>{{ $row->customer_name }}</td>
                                <td>{{ $row->customer_phone }}</td>
                                <td>{{ number_format($row->subtotal) }}</td>
                                <td>{!! $row->status_label !!}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <a href="{{ route('customer.view_order', $row->invoice) }}"
                                        class="btn btn-primary btn-sm">Detail</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada pesanan</td>
                            </tr>
                            @endforelse
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="float-right">
                    {!! $orders->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection