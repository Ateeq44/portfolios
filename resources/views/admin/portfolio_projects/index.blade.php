@extends('adminlte::page')

@section('title','Portfolio Projects')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1>Projects</h1>
    <a class="btn btn-primary" href="{{ route('admin.portfolio-projects.create') }}">
        <i class="fas fa-plus"></i> Add Project
    </a>
</div>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th style="width:80px">Cover</th>
                    <th>Title</th>
                    <th style="width:180px">Category</th>
                    <th style="width:110px">Published</th>
                    <th style="width:170px">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($items as $p)
                <tr>
                    <td>
                        @if($p->cover_image_path)
                            <img src="{{ asset($p->cover_image_path) }}" alt="cover" class="img-fluid rounded" style="height:55px;width:75px;object-fit:cover;">
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        <div class="fw-bold">{{ $p->title }}</div>
                        <div class="text-muted small">
                            <code>{{ $p->slug }}</code>
                        </div>
                    </td>
                    <td>{{ $p->category->name ?? '—' }}</td>
                    <td>
                        @if($p->is_published)
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-secondary">No</span>
                        @endif
                    </td>
                    <td class="d-flex gap-2">
                        <a class="btn btn-sm btn-warning" href="{{ route('admin.portfolio-projects.edit', $p) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.portfolio-projects.destroy', $p) }}"
                              onsubmit="return confirm('Delete this project?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted">No projects found.</td></tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $items->links() }}
        </div>
    </div>
</div>
@stop
