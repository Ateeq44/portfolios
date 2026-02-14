@php
$categoryId = old('category_id', $item->category_id ?? '');
$title = old('title', $item->title ?? '');
$short = old('short_description', $item->short_description ?? '');
$ref = old('reference_url', $item->reference_url ?? '');

$location = old('location', $item->location ?? '');
$period = old('partnership_period', $item->partnership_period ?? '');
$industry = old('industry', $item->industry ?? '');

$tech = old('technologies', isset($item) && is_array($item->technologies) ? implode(', ', $item->technologies) : '');
$published = old('is_published', isset($item) ? (int)$item->is_published : 0);

// existing relations for edit
$existingSections = isset($item) ? ($item->caseStudySections->keyBy('type') ?? collect()) : collect();
$existingPhases = isset($item) ? ($item->phases ?? collect()) : collect();
$existingTeam = isset($item) ? ($item->teamRoles ?? collect()) : collect();

$sectionOrder = ['competitive','problem','solution','technology','conclusion','challenge','next_steps'];
@endphp

<div class="row">
    <div class="col-lg-8">

        {{-- BASIC INFO --}}
        <div class="card mb-3">
            <div class="card-header"><b>Basic Info</b></div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">-- Select --</option>
                        @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ (string)$categoryId === (string)$c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" value="{{ $title }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="e.g. Pulse LMS">
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" rows="2"
                    class="form-control @error('short_description') is-invalid @enderror"
                    placeholder="One line summary...">{{ $short }}</textarea>
                    @error('short_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Reference URL</label>
                    <input type="url" name="reference_url" value="{{ $ref }}"
                    class="form-control @error('reference_url') is-invalid @enderror"
                    placeholder="https://dixeam.com/portfolios/pulse-lms">
                    @error('reference_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" value="{{ $location }}" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Partnership Period</label>
                        <input type="text" name="partnership_period" value="{{ $period }}" class="form-control" placeholder="2024">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Industry</label>
                        <input type="text" name="industry" value="{{ $industry }}" class="form-control" placeholder="Education">
                    </div>
                </div>

                <div class="mb-0">
                    <label class="form-label">Technologies (comma separated)</label>
                    <input type="text" name="technologies" value="{{ $tech }}" class="form-control"
                    placeholder="Laravel, Bootstrap, MySQL, ...">
                </div>

            </div>
        </div>

        {{-- TEAM ROLES --}}
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <b>Team Size (Roles)</b>
                <button type="button" class="btn btn-sm btn-primary" onclick="addTeamRow()">
                    <i class="fas fa-plus"></i> Add Role
                </button>
            </div>
            <div class="card-body">
                <div id="teamWrap">
                    @php
                    $teamOld = old('team_roles');
                    $teamRows = is_array($teamOld) ? $teamOld : ($existingTeam->count() ? $existingTeam->toArray() : []);
                    if(empty($teamRows)) $teamRows = [['role'=>'Project Manager','count'=>1]];
                    @endphp

                    @foreach($teamRows as $i => $tr)
                    <div class="row g-2 align-items-end teamRow mb-2">
                        <div class="col-md-8">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control"
                            name="team_roles[{{ $i }}][role]"
                            value="{{ $tr['role'] ?? '' }}"
                            placeholder="e.g. Backend Developer">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Count</label>
                            <input type="number" class="form-control"
                            name="team_roles[{{ $i }}][count]"
                            value="{{ $tr['count'] ?? 1 }}" min="1">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger w-100" onclick="removeRow(this)">×</button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <template id="teamTpl">
                    <div class="row g-2 align-items-end teamRow mb-2">
                        <div class="col-md-8">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" name="__NAME_ROLE__" placeholder="e.g. Database Engineer">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Count</label>
                            <input type="number" class="form-control" name="__NAME_COUNT__" value="1" min="1">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger w-100" onclick="removeRow(this)">×</button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- CASE STUDY SECTIONS (NO BULLETS NOW + CKEditor) --}}
        <div class="card mb-3">
            <div class="card-header"><b>Case Study Sections</b> (Heading + Content + Image + Layout)</div>
            <div class="card-body">

                @foreach($sectionOrder as $type)
                @php
                $sec = $existingSections->get($type);
                $headingDefault = $defaultSections[$type] ?? ucfirst(str_replace('_',' ',$type));

                $headingVal = old("sections.$type.heading", $sec->heading ?? $headingDefault);
                $contentVal = old("sections.$type.content", $sec->content ?? '');
                $layoutVal  = old("sections.$type.layout",  $sec->layout ?? 'image_right');

                // Unique editor ID per section
                $editorId = "sec_{$type}_content";
                @endphp

                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $headingVal }}</h5>
                        <span class="badge bg-info text-dark">{{ $type }}</span>
                    </div>

                    <input type="hidden" name="sections[{{ $type }}][type]" value="{{ $type }}">

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <label class="form-label">Heading</label>
                            <input type="text" class="form-control"
                            name="sections[{{ $type }}][heading]"
                            value="{{ $headingVal }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Layout</label>
                            <select class="form-control" name="sections[{{ $type }}][layout]">
                                <option value="image_right" {{ $layoutVal==='image_right'?'selected':'' }}>Image Right</option>
                                <option value="image_left"  {{ $layoutVal==='image_left'?'selected':'' }}>Image Left</option>
                                <option value="stacked"     {{ $layoutVal==='stacked'?'selected':'' }}>Stacked</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Content (Editor)</label>

                        {{-- IMPORTANT:
                            - We use {!! !!} so existing HTML stays in editor
                            - CKEditor 4 will be attached via JS to all .js-editor
                            --}}
                            <textarea
                            class="form-control js-editor"
                            id="{{ $editorId }}"
                            rows="10"
                            name="sections[{{ $type }}][content]"
                            placeholder="Write content here...">{!! $contentVal !!}</textarea>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Section Image (optional)</label>
                            <input type="file" class="form-control" name="sections[{{ $type }}][image]">

                            @if(isset($sec) && $sec && $sec->image_path)
                            <div class="mt-2">
                                <img src="{{ asset($sec->image_path) }}" class="img-fluid rounded"
                                style="max-height:180px;object-fit:cover;">
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- PHASES (KEEP BULLETS TEXTAREA) --}}
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <b>Phases</b> (Phase 1, Phase 2, Phase 3...)
                    <button type="button" class="btn btn-sm btn-primary" onclick="addPhaseRow()">
                        <i class="fas fa-plus"></i> Add Phase
                    </button>
                </div>

                <div class="card-body">
                    <div id="phasesWrap">
                        @php
                        $phOld = old('phases');
                        $phRows = is_array($phOld) ? $phOld : ($existingPhases->count() ? $existingPhases->toArray() : []);
                        @endphp

                        @foreach($phRows as $i => $ph)
                        @php
                        $bul = $ph['bullets'] ?? [];
                        $bulText = is_array($bul) ? implode("\n",$bul) : ($ph['bullets_text'] ?? '');
                        @endphp

                        <div class="phaseRow border rounded p-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-2">Phase</h5>
                                <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Title</label>
                                    <input class="form-control" name="phases[{{ $i }}][title]"
                                    value="{{ $ph['title'] ?? '' }}" placeholder="Phase 1">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Subtitle</label>
                                    <input class="form-control" name="phases[{{ $i }}][subtitle]"
                                    value="{{ $ph['subtitle'] ?? '' }}" placeholder="Core Platform Development">
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Bullets (one line = one bullet)</label>
                                <textarea class="form-control" rows="4" name="phases[{{ $i }}][bullets_text]">{{ $bulText }}</textarea>
                            </div>

                            <div class="mb-0">
                                <label class="form-label">Phase Image (optional)</label>
                                <input type="file" class="form-control" name="phases[{{ $i }}][image]">

                                @if(isset($ph['image_path']) && $ph['image_path'])
                                <div class="mt-2">
                                    <img src="{{ asset($ph['image_path']) }}" class="img-fluid rounded"
                                    style="max-height:160px;object-fit:cover;">
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <template id="phaseTpl">
                        <div class="phaseRow border rounded p-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-2">Phase</h5>
                                <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Title</label>
                                    <input class="form-control" name="__PH_TITLE__" placeholder="Phase 4">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Subtitle</label>
                                    <input class="form-control" name="__PH_SUB__" placeholder="Deployment & Scaling">
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Bullets (one line = one bullet)</label>
                                <textarea class="form-control" rows="4" name="__PH_BUL__"></textarea>
                            </div>

                            <div class="mb-0">
                                <label class="form-label">Phase Image (optional)</label>
                                <input type="file" class="form-control" name="__PH_IMG__">
                            </div>
                        </div>
                    </template>
                </div>
            </div>

        </div>

        {{-- RIGHT SIDEBAR --}}
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label">Cover Image</label>
                <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                @error('cover_image') <div class="invalid-feedback">{{ $message }}</div> @enderror

                @if(isset($item) && $item->cover_image_path)
                <div class="mt-2">
                    <img src="{{ asset($item->cover_image_path) }}" class="img-fluid rounded"
                    style="max-height:220px;object-fit:cover;">
                </div>
                @endif
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1"
                        {{ (int)$published===1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>

                    <hr>

                    <button class="btn btn-primary w-100">
                        <i class="fas fa-save"></i> Save
                    </button>

                    <a class="btn btn-outline-secondary w-100 mt-2" href="{{ route('admin.portfolio-projects.index') }}">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>


{{-- JS (Repeaters + CKEditor 4) --}}
@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>


@parent


<script>
    // Prevent CKEditor from auto-inline behavior
    if (window.CKEDITOR) {
        CKEDITOR.disableAutoInline = true;
    }

    function removeRow(btn){
        btn.closest('.teamRow, .phaseRow').remove();
    }

    function addTeamRow(){
        const wrap = document.getElementById('teamWrap');
        const tpl = document.getElementById('teamTpl').innerHTML;
        const idx = wrap.querySelectorAll('.teamRow').length;

        const html = tpl
        .replace('__NAME_ROLE__', `team_roles[${idx}][role]`)
        .replace('__NAME_COUNT__', `team_roles[${idx}][count]`);

        wrap.insertAdjacentHTML('beforeend', html);
    }

    function addPhaseRow(){
        const wrap = document.getElementById('phasesWrap');
        const tpl = document.getElementById('phaseTpl').innerHTML;
        const idx = wrap.querySelectorAll('.phaseRow').length;

        const html = tpl
        .replace('__PH_TITLE__', `phases[${idx}][title]`)
        .replace('__PH_SUB__', `phases[${idx}][subtitle]`)
        .replace('__PH_BUL__', `phases[${idx}][bullets_text]`)
        .replace('__PH_IMG__', `phases[${idx}][image]`);

        wrap.insertAdjacentHTML('beforeend', html);
    }

    document.addEventListener('DOMContentLoaded', function () {
        CKEDITOR.disableAutoInline = true;

        document.querySelectorAll('textarea.js-editor').forEach(function (el) {
            if (!el.id) return;
            if (CKEDITOR.instances[el.id]) return;

            CKEDITOR.replace(el.id, {
              height: 260,
              allowedContent: true,
              extraPlugins: 'sourcearea',
              versionCheck: false,
              toolbar: [
              { name: 'document', items: [ 'Source' ] },
              { name: 'styles', items: [ 'Format', 'FontSize' ] },
              { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline' ] },
              { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Blockquote' ] },
              { name: 'links', items: [ 'Link', 'Unlink' ] },
              { name: 'insert', items: [ 'Table', 'HorizontalRule' ] },
              { name: 'clipboard', items: [ 'Undo', 'Redo' ] }
              ]
          });
        });
    });

</script>
@endsection
