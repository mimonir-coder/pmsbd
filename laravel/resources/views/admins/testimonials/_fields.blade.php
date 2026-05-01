<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required value="{{ old('name', $testimonial->name ?? '') }}">
</div>
<div class="form-group">
    <label>Designation</label>
    <input type="text" name="designation" class="form-control" value="{{ old('designation', $testimonial->designation ?? '') }}">
</div>
<div class="form-group">
    <label>Photo</label>
    <input type="file" name="image" class="form-control-file" accept="image/*">
</div>
<div class="form-group">
    <label>Comments</label>
    <textarea name="comments" id="comments" class="form-control">{{ old('comments', $testimonial->comments ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Social link</label>
    <input type="text" name="social_link" class="form-control" value="{{ old('social_link', $testimonial->social_link ?? '') }}">
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Sort order</label>
        <input type="number" name="sort_order" class="form-control" min="0" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
    </div>
    <div class="form-group col-md-4 d-flex align-items-end">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" @checked(old('is_active', $testimonial->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active</label>
        </div>
    </div>
</div>
