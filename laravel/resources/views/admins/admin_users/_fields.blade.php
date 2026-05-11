@php
    $editing = isset($admin) && $admin?->exists;
    $currentImage = $editing && filled($admin->image) ? asset('storage/'.$admin->image) : asset('assets/images/user/avatar-2.jpg');
@endphp

<div class="row">
    <div class="col-md-8">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name', $admin->name ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email', $admin->email ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Mobile number</label>
                <input type="text" name="mobile" class="form-control" required value="{{ old('mobile', $admin->mobile ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Admin type</label>
                <input type="text" name="type" class="form-control" required value="{{ old('type', $admin->type ?? 'Admin') }}">
            </div>
        </div>

        @unless($profile ?? false)
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    @php($status = old('status', $admin->status ?? 'Active'))
                    <option value="Active" @selected($status === 'Active')>Active</option>
                    <option value="Inactive" @selected($status === 'Inactive')>Inactive</option>
                </select>
            </div>
        @endunless

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>{{ $editing ? 'New password (optional)' : 'Password' }}</label>
                <input type="password" name="password" class="form-control" autocomplete="new-password" {{ ! $editing ? 'required' : '' }}>
                @if($editing)
                    <small class="form-text text-muted">Leave blank to keep current password.</small>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label>Confirm password</label>
                <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password" {{ ! $editing ? 'required' : '' }}>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Photo</label>
            <div class="mb-3">
                <img src="{{ $currentImage }}" alt="Admin photo" class="img-fluid rounded" style="max-height: 180px;">
            </div>
            <input type="file" name="image" class="form-control-file" accept="image/*">
            <small class="form-text text-muted">JPG/PNG/WebP, max 2MB.</small>

            @if($editing && filled($admin->image))
                <div class="form-check mt-2">
                    <input type="checkbox" class="form-check-input" id="remove_image" name="remove_image" value="1">
                    <label class="form-check-label" for="remove_image">Remove current photo</label>
                </div>
            @endif
        </div>
    </div>
</div>
