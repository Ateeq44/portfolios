@php
    $name = old('name', $item->name ?? '');
    $sort = old('sort_order', $item->sort_order ?? '');
    $active = old('is_active', isset($item) ? (int)$item->is_active : 1);
@endphp

<div class="mb-3">
    <label class="form-label">Name <span class="text-danger">*</span></label>
    <input type="text"
           name="name"
           value="{{ $name }}"
           class="form-control @error('name') is-invalid @enderror"
           placeholder="e.g. Web Development">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number"
           name="sort_order"
           value="{{ $sort }}"
           class="form-control @error('sort_order') is-invalid @enderror"
           placeholder="e.g. 1">
    @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-check mb-3">
    <input class="form-check-input"
           type="checkbox"
           name="is_active"
           id="is_active"
           value="1"
           {{ (int)$active === 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>

<div class="d-flex gap-2">
    <button class="btn btn-primary">
        <i class="fas fa-save"></i> Save
    </button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.portfolio-categories.index') }}">
        Cancel
    </a>
</div>
