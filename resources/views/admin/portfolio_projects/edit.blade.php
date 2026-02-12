@extends('adminlte::page')
@section('title','Edit Project')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1>Edit Project</h1>
    <a class="btn btn-secondary" href="{{ route('admin.portfolio-projects.index') }}">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.portfolio-projects.update', $item) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.portfolio_projects._form', [
            'item' => $item,
            'categories' => $categories,
            'defaultSections' => $defaultSections ?? []
            ])

            ])
        </form>
    </div>
</div>
@stop
