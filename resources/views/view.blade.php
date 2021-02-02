@extends('layouts.profile')

@section('title')
Detail Pesanan
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

        .tab-content {
            width: 90%;
            margin: 10px;
        }

        .nav-tab {
            width: 100%;
            text-align: center;
        }

        .nav-item {
            align-content: center
        }
    }
</style>
@endsection

@section('breadcumb')
<div id="breadcrumb">
    <h5><a class="active" href="/"> Home </a>/ <a class="active" href="{{route('customer.orders')}}">Pesanan</a> /
        Detail Pesanan 
    </h5>
</div>
@endsection

@section('content')
<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="data-pelanggan-tab" data-bs-toggle="tab" href="#data-pelanggan" role="tab"
            aria-controls="data-pelanggan" aria-selected="true">Data Pelanggan</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pembayaran-tab" data-bs-toggle="tab" href="#pembayaran" role="tab"
            aria-controls="pembayaran" aria-selected="false">Pembayaran</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="detail-tab" data-bs-toggle="tab" href="#detail" role="tab" aria-controls="detail"
            aria-selected="false">Detail</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="data-pelanggan" role="tabpanel" aria-labelledby="data-pelanggan-tab">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama Penerima</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Alamat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_phone }}</td>
                    <td>{{ $order->customer_address }}, {{ $order->district->name }}
                        {{ $order->district->city->name }},
                        {{ $order->district->city->province->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="pembayaran" role="tabpanel" aria-labelledby="pembayaran-tab">
        @if ($order->status == 0)
        <a href="{{ url('payment?invoice=' . $order->invoice) }}"
            class="btn btn-primary btn-sm float-right">Konfirmasi</a>
        @endif
        @if ($order->payment)
        <table class="table">
            <tr>
                <td width="30%">Nama Pengirim</td>
                <td width="5%"></td>
                <td>{{ $order->payment->name }}</td>
            </tr>
            <tr>
                <td>Tanggal Transfer</td>
                <td></td>
                <td>{{ $order->payment->transfer_date }}</td>
            </tr>
            <tr>
                <td>Jumlah Transfer</td>
                <td></td>
                <td>Rp {{ number_format($order->payment->amount) }}</td>
            </tr>
            <tr>
                <td>Tujuan Transfer</td>
                <td></td>
                <td>{{ $order->payment->transfer_to }}</td>
            </tr>
            <tr>
                <td>Bukti Transfer</td>
                <td></td>
                <td>
                    <img src="{{ asset('storage/payment/' . $order->payment->proof) }}" width="50px" height="50px"
                        alt="">
                    <a href="{{ asset('storage/payment/' . $order->payment->proof) }}" target="_blank">Lihat
                        Detail</a>
                </td>
            </tr>
        </table>
        @else
        <h4 class="text-center">Belum ada data pembayaran</h4>
        @endif
    </div>
    <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($order->details as $row)
                <tr>
                    <td>{{ $row->product->name }}</td>
                    <td>{{ number_format($row->price) }}</td>
                    <td>{{ $row->qty }} Item</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
@endsection