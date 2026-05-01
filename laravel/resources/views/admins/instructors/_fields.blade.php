<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required value="{{ old('name', $instructor->name ?? '') }}">
</div>
<div class="form-group">
    <label>Designation</label>
    <input type="text" name="designation" class="form-control" value="{{ old('designation', $instructor->designation ?? '') }}">
</div>
<div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control-file" accept="image/*">
    @if (! empty($instructor?->image))
        <small class="form-text text-muted">Current file is kept unless you upload a replacement.</small>
    @endif
</div>
<div class="form-group">
    <label>Qualifications</label>
    <textarea name="qualifications" class="form-control" rows="3">{{ old('qualifications', $instructor->qualifications ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Bio</label>
    <textarea name="bio" id="bio" class="form-control">{{ old('bio', $instructor->bio ?? '') }}</textarea>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Sort order</label>
        <input type="number" name="sort_order" class="form-control" min="0" value="{{ old('sort_order', $instructor->sort_order ?? 0) }}">
    </div>
    <div class="form-group col-md-4 d-flex align-items-end">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" @checked(old('is_active', $instructor->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active</label>
        </div>
    </div>
</div>
