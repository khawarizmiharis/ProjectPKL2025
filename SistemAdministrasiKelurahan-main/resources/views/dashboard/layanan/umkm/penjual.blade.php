@extends('dashboard.layouts.master', ['title' => " Penjual"])
@section('content')
<?php
    $data=[
        'icon' => "pe-7s-cart",
        'judul' => " Penjual ",
        'link' => route('manajemen-umkm.data-penjual') ,
        'page1' => " Penjual  "
    ]
?>
@include('dashboard.layouts.page-title',$data)
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header"> Penjual
                <div class="btn-actions-pane-right ">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection