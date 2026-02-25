@extends('adminlte::page')

@section('title','Portfolio Categories')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1>Categories</h1>
    <a class="btn btn-primary" href="{{ route('admin.portfolio-categories.create') }}">
        <i class="fas fa-plus"></i> Add Category
    </a>
</div>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width:40%">Name</th>
                    <th>Slug</th>
                    <th style="width:100px">Active</th>
                    <th style="width:170px">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td><code>{{ $item->slug }}</code></td>
                    <td>
                        @if($item->is_active)
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-secondary">No</span>
                        @endif
                    </td>
                    <td class="d-flex gap-2">
                        <a class="btn btn-sm btn-warning" style="margin-right: 12px;" href="{{ route('admin.portfolio-categories.edit',$item) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form method="POST"
                              action="{{ route('admin.portfolio-categories.destroy',$item) }}"
                              onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted">No categories found.</td></tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $items->links() }}
        </div>
    </div>
</div>
@stop
