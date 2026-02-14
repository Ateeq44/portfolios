@extends('layouts.app_front')
@section('title','Portfolios')
<style>
    main{
        margin-top: 130px !important;
    }
    .por-item:hover{
        transform: translateY(-3px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
    }
    .jkfl{
        padding-right: 20px;
    }
</style>
@section('content')
<section class="hero-section header-section ">
    <div class="header-bottom">
        <div class="row align-items-center min-vh-80">
            <div class="col-lg-12 fgdfds">
                <h1 class="display-4 fw-bold mb-4 text-center" style="line-height: 1.2;">
                    See What We Do
                </h1>
                <p class="lead text-muted mb-0 text-center">
                    We help turn ideas into successful products, guiding clients through validation, development, launch, scaling, and ongoing support.
                </p>
            </div>
        </div>
    </div>
</section>
<div class="container mt-4">

    <div class="row g-4">
        @forelse($items as $p)
        <div class="col-md-12 col-lg-12">
            <div class="card shadow-sm flex-row overflow-hidden por-item">
                <!-- Left Side: Content -->
                <div class="card-body d-flex flex-row justify-content-between" style="flex: 1;">
                    <div>
                        <div>
                            <span class="badge bg-gradient-primary my-3">{{ $p->category->name ?? 'Uncategorized' }}</span>
                            <h5 class="card-title">{{ $p->title }}</h5>
                            <p class="card-text text-muted jkfl">{{ $p->short_description }}</p>
                        </div>

                        <div class="pt-3 mt-3">
                            <a class="btn btn-gradient-primary text-white w-lg-25 w-sm-25 btn-case-st" href="{{ route('portfolios.show', $p->slug) }}">
                                View Case Study
                            </a>
                        </div>
                    </div>

                    <!-- Right Side: Image -->
                    @if($p->cover_image_path)
                    <div style="flex: 0 0 40%; max-width: 500px;" class="img-cover-portf">
                        <img src="{{ asset($p->cover_image_path) }}" class="w-100" alt="cover" style="object-fit: cover; height: 226.38px;">
                    </div>
                    @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="flex: 0 0 40%; max-width: 350px;">
                        <span class="text-muted">No Image</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">No published projects yet.</div>
        </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>
@endsection
