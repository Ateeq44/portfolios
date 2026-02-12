@extends('adminlte::page')

@section('title','Edit Category')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1>Edit Category</h1>
    <a class="btn btn-secondary" href="{{ route('admin.portfolio-categories.index') }}">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.portfolio-categories.update', $item) }}">
            @csrf
            @method('PUT')
            @include('admin.portfolio_categories._form', ['item' => $item])
        </form>
    </div>
</div>
@stop
