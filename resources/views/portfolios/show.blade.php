@extends('layouts.app_front')
@section('title', $project->title)
{{-- Custom CSS --}}
<style>
    main{
        margin-top: 130px !important;
    }
    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
    }
    .hover-shadow {
        transition: box-shadow 0.3s ease;
    }
    .hover-shadow:hover {
        box-shadow: 0 8px 30px rgba(0,0,0,0.12) !important;
    }
    .transition-all {
        transition: all 0.3s ease;
    }
    .line-height-tight {
        line-height: 1.2;
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    }
    .icon-box {
        transition: transform 0.2s ease;
    }
    .d-flex:hover .icon-box {
        transform: scale(1.1);
    }
    .sticky-top {
        position: sticky;
    }
    .loc-part-indu{
        display: flex;
        gap:100px;
    }
    @media (max-width: 991.98px) {
        .sticky-top {
            position: relative !important;
            top: 0 !important;
        }
    }
    @media (max-width: 500px) {
        .loc-part-indu{
            display: unset;
            gap:100px;
        }
        .title-project{
            font-size: 22px !important;
        }
    }
</style>
@php
// Sections keyed by type
$sections = $project->caseStudySections?->keyBy('type') ?? collect();

$renderSection = function($sec){
if(!$sec) return '';

$heading = $sec->heading ?: '';
$content = $sec->content ?: '';
$img = $sec->image_path ? asset($sec->image_path) : null;

$layout = $sec->layout ?: 'image_right'; // image_left | image_right | stacked

$textHtml = '
<div class="'.($img ? 'col-lg-7' : 'col-12').'">
    <h2 class="h4 mb-3">'.e($heading).'</h2>
    '.($content ? '<div class="text-muted ck-content">'.$content.'</div>' : '').'
</div>
';

$imgHtml = $img ? '
<div class="col-lg-5">
    <img src="'.$img.'" class="img-fluid rounded shadow-sm" alt="'.e($heading).'">
</div>
' : '';

// Layout decisions
if(!$img || $layout === 'stacked'){
return '
<section class="mb-5">
    <div class="row g-4 align-items-start">
        '.$textHtml.'
        '.($img ? '<div class="col-12">'.$imgHtml.'</div>' : '').'
    </div>
</section>
';
}

if($layout === 'image_left'){
return '
<section class="mb-5">
    <div class="row g-4 align-items-start">
        '.$imgHtml.'
        '.$textHtml.'
    </div>
</section>
';
}

// image_right default
return '
<section class="mb-5">
    <div class="row g-4 align-items-start">
        '.$textHtml.'
        '.$imgHtml.'
    </div>
</section>
';
};
@endphp

@section('content')
<div class="container">
    {{-- MAIN CONTENT GRID --}}
    <div class="row g-4">


        {{-- RIGHT COLUMN: Sidebar Info --}}
        <div class="col-lg-12">
            {{-- Project Meta Card --}}
            <div class="card border-0 shadow-lg rounded-4 mb-4 sticky-top" style="top: 2rem; z-index: 100;    box-shadow: 1px 0rem 3rem rgba(0, 0, 0, 0.175) !important;">
                <div class="card-header border-0 py-4 px-4 rounded-top-4">
                    <nav style="" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a style="text-decoration: none;font-size: 15px;color: #0c2a7c;" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a style="text-decoration: none;font-size: 15px;color: #0c2a7c;" href="{{ url('portfolios') }}">Portfolio</a></li>
                            <li class="breadcrumb-item active" style="font-size: 15px;" aria-current="page">{{ $project->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4 mb-3">
                        {{-- LEFT COLUMN: Project Info --}}
                        <div class="col-lg-8">
                            <div class="position-relative">
                                {{-- Category Badge --}}
                                <span class="badge bg-gradient-primary text-white rounded-pill px-3 py-2 mb-3 d-inline-flex align-items-center gap-2 shadow-sm">
                                    <i class="bi bi-folder-fill"></i>
                                    {{ $project->category->name ?? 'Web Development' }}
                                </span>

                                {{-- Title --}}
                                <h5 class="card-title fw-bold">
                                    {{ $project->title }}
                                </h5>

                                {{-- Short Description --}}
                                @if($project->short_description)
                                <p class="lead text-secondary mb-4 fw-light" style="font-size: 1rem;line-height: 1.7;">
                                    {{ $project->short_description }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- Location --}}
                    <div class="loc-part-indu">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom border-light">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-gradient-primary text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <span class="material-icons">location_on</span>
                                </div>
                            </div>
                            <div>
                                <small class="text-dark text-uppercase fw-bold" style="font-size: 1rem; letter-spacing: 0.5px;">Location</small>
                                <p class="mb-0 text-dark">{{ $project->location ?? 'Pakistan' }}</p>
                            </div>
                        </div>

                        {{-- Partnership Period --}}
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom border-light">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-gradient-primary text-white text-success rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <span class="material-icons">date_range</span>
                                </div>
                            </div>
                            <div>
                                <small class="text-dark text-uppercase fw-bold" style="font-size: 1rem; letter-spacing: 0.5px;">Partnership Period</small>
                                <p class="mb-0 text-dark">{{ $project->partnership_period ?? '2025' }}</p>
                            </div>
                        </div>

                        {{-- Industry --}}
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom border-light">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-gradient-primary text-white text-warning rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <span class="material-icons">apartment</span>
                                </div>
                            </div>
                            <div>
                                <small class="text-dark text-uppercase fw-bold" style="font-size: 1rem; letter-spacing: 0.5px;">Industry</small>
                                <p class="mb-0 text-dark">{{ $project->industry ?? 'Other' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Technologies --}}
                    <div class="mb-4">
                        <h5 class="text-dark fw-bold d-block mb-3" style="font-size: 1rem; letter-spacing: 0.5px;">
                            <i class="bi bi-stack me-1"></i> Technologies Used
                        </h5>
                        <div class="d-flex flex-wrap gap-2">
                            @if(!empty($project->technologies))
                            @foreach($project->technologies as $t)
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-medium border border-primary border-opacity-25">
                                {{ $t }}
                            </span>
                            @endforeach
                            @else
                            <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill px-3 py-2">Laravel 11</span>
                            <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill px-3 py-2">Bootstrap 5</span>
                            <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill px-3 py-2">PHP</span>
                            <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill px-3 py-2">MySQL</span>
                            <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill px-3 py-2">JavaScript</span>
                            <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill px-3 py-2">jQuery</span>
                            <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill px-3 py-2">DataTables</span>
                            @endif
                        </div>
                    </div>

                    {{-- Team Size --}}
                    <div class="mb-2">
                        <small class="text-dark fw-bold d-block mb-3" style="font-size: 1rem; letter-spacing: 0.5px;">
                            <i class="bi bi-people-fill me-1"></i> Team Composition
                        </small>
                        <div class="d-flex flex-wrap gap-2">
                            @if($project->teamRoles && $project->teamRoles->count())
                            @foreach($project->teamRoles as $tr)
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-medium border border-primary border-opacity-25">
                                {{ $tr->count }} {{ $tr->role }}
                            </span>
                            @endforeach
                            @else
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 border border-primary border-opacity-25">1 Project Manager</span>
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 border border-primary border-opacity-25">1 Frontend Developer</span>
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 border border-primary border-opacity-25">1 Backend Developer</span>
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 border border-primary border-opacity-25">1 Database Engineer</span>
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 border border-primary border-opacity-25">1 DevOps Engineer</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Card Footer with CTA --}}
                @if($project->reference_url)
                <div class="card-footer bg-light border-0 p-4 rounded-bottom-4">
                    <a href="{{ $project->reference_url }}" target="_blank" class="btn btn-primary w-25 rounded-pill py-3 fw-bold d-flex align-items-center justify-content-center gap-2 hover-lift shadow-sm">
                        <span>Visit Project</span>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>



    <hr class="my-5">

    {{-- SECTIONS (Fixed order) --}}
    {!! $renderSection($sections->get('competitive')) !!}
    {!! $renderSection($sections->get('problem')) !!}
    {!! $renderSection($sections->get('solution')) !!}
    {!! $renderSection($sections->get('technology')) !!}

    {{-- PHASES (Dynamic) --}}
    <section class="mb-5">
        <h2 class="h4 mb-3">Phases</h2>

        @if($project->phases && $project->phases->count())
        <div class="accordion" id="phasesAcc">
            @foreach($project->phases as $i => $ph)
            @php
            $bul = is_array($ph->bullets ?? null) ? $ph->bullets : [];
            $pid = 'ph_'.$ph->id;
            @endphp
            <div class="accordion-item">
                <h2 class="accordion-header" id="h_{{ $pid }}">
                    <button class="accordion-button {{ $i===0?'':'collapsed' }}" type="button"
                    data-bs-toggle="collapse" data-bs-target="#c_{{ $pid }}">
                    {{ $ph->title }}
                    @if($ph->subtitle)
                    <span class="ms-2 text-muted">— {{ $ph->subtitle }}</span>
                    @endif
                </button>
            </h2>

            <div id="c_{{ $pid }}" class="accordion-collapse collapse {{ $i===0?'show':'' }}"
            data-bs-parent="#phasesAcc">
            <div class="accordion-body">
                <div class="row g-4 align-items-start">
                    <div class="col-lg-7">
                        @if(!empty($bul))
                        <ul class="mb-0">
                            @foreach($bul as $b)
                            <li>{{ $b }}</li>
                            @endforeach
                        </ul>
                        @else
                        <p class="text-muted mb-0">No details added.</p>
                        @endif
                    </div>
                    <div class="col-lg-5">
                        @if($ph->image_path)
                        <img src="{{ asset($ph->image_path) }}"
                        class="img-fluid rounded shadow-sm"
                        alt="{{ $ph->title }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<p class="text-muted">No phases added yet.</p>
@endif
</section>

{!! $renderSection($sections->get('conclusion')) !!}
{!! $renderSection($sections->get('challenge')) !!}
{!! $renderSection($sections->get('next_steps')) !!}

</div>

{{-- OPTIONAL: small CSS fix for editor output (nice spacing) --}}
<style>
    .ck-content p { margin-bottom: 12px; }
    .ck-content ul, .ck-content ol { padding-left: 18px; margin-bottom: 12px; }
    .ck-content img { max-width: 100%; height: auto; }
</style>
@endsection
