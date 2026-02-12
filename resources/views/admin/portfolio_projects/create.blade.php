@extends('adminlte::page')
@section('title','Add Project')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1>Add Project</h1>
    <a class="btn btn-secondary" href="{{ route('admin.portfolio-projects.index') }}">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.portfolio-projects.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.portfolio_projects._form', [
            'item' => null,
            'categories' => $categories,
            'defaultSections' => $defaultSections ?? []
            ])

        </form>
    </div>
</div>
@stop
