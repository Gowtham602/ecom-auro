@extends('layouts.admin')

@section('title','Dashboard')

@section('breadcrumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>
        </li>

        <li class="breadcrumb-item active">
            Home
        </li>
    </ol>
</nav>

@endsection

@section('content')

<div class="row">

    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5>Total Products</h5>

                <h2>120</h2>

            </div>

        </div>

    </div>

</div>

@endsection