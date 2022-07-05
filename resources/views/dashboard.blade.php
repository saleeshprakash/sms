@extends('layouts.default')
@section('main-content')
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('dashboard')}}">SMS</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>
    </div>
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
    </div>
    <div class="br-pagebody">
    </div>
</div>
@endsection