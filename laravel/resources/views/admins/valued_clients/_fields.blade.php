<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required value="{{ old('name', $client->name ?? '') }}">
</div>
<div class="form-group">
    <label>Logo</label>
    <input type="file" name="logo" class="form-control-file" accept="image/*">
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Sort order</label>
        <input type="number" name="sort_order" class="form-control" min="0" value="{{ old('sort_order', $client->sort_order ?? 0) }}">
    </div>
    <div class="form-group col-md-4 d-flex align-items-end">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" @checked(old('is_active', $client->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active</label>
        </div>
    </div>
</div>
