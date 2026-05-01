@php(
    $selectedIds = old(
        'instructor_ids',
        (($course ?? null)?->getKey())
            ? $course->instructors->pluck('id')->all()
            : []
    )
)
<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" required value="{{ old('title', $course->title ?? '') }}">
</div>
<div class="form-row">
    <div class="form-group col-md-8">
        <label>Slug (optional)</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $course->slug ?? '') }}" placeholder="auto from title">
    </div>
    <div class="form-group col-md-4">
        <label>Course fee</label>
        <input type="number" step="0.01" min="0" name="fee" class="form-control" value="{{ old('fee', $course->fee ?? '') }}">
    </div>
</div>
<div class="form-group">
    <label>Sub-title</label>
    <input type="text" name="sub_title" class="form-control" value="{{ old('sub_title', $course->sub_title ?? '') }}">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Featured image</label>
        <input type="file" name="featured_image" class="form-control-file" accept="image/*">
    </div>
    <div class="form-group col-md-6">
        <label>Brochure (PDF)</label>
        <input type="file" name="brochure" class="form-control-file" accept="application/pdf">
        @if(filled(($course ?? null)?->brochure_path))
            <div class="form-check mt-2">
                <input type="checkbox" class="form-check-input" id="remove_brochure" name="remove_brochure" value="1">
                <label class="form-check-label" for="remove_brochure">Remove current brochure</label>
            </div>
        @endif
    </div>
</div>
<div class="form-group">
    <label>Promo video (YouTube URL or embed link)</label>
    <input type="text" name="promo_video_url" class="form-control" value="{{ old('promo_video_url', $course->promo_video_url ?? '') }}">
</div>
<div class="form-group">
    <label>Course overview</label>
    <textarea name="overview" id="overview" class="form-control">{{ old('overview', $course->overview ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Course content</label>
    <textarea name="content" id="content" class="form-control">{{ old('content', $course->content ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Course schedule</label>
    <textarea name="schedule" id="schedule" class="form-control">{{ old('schedule', $course->schedule ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Enrollment / Google Form link</label>
    <input type="text" name="registration_url" class="form-control" value="{{ old('registration_url', $course->registration_url ?? '') }}">
</div>
<div class="form-group">
    <label>Instructors</label>
    <select name="instructor_ids[]" class="form-control" multiple size="8">
        @foreach ($instructors as $ins)
            <option value="{{ $ins->id }}" @selected(collect(old('instructor_ids', $selectedIds))->contains($ins->id))>
                {{ $ins->name }} @if ($ins->designation) — {{ $ins->designation }} @endif
            </option>
        @endforeach
    </select>
    <small class="form-text text-muted">Hold Ctrl (Windows) to select multiple.</small>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Sort order</label>
        <input type="number" name="sort_order" class="form-control" min="0" value="{{ old('sort_order', $course->sort_order ?? 0) }}">
    </div>
    <div class="form-group col-md-4 d-flex align-items-end">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" @checked(old('is_active', $course->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active</label>
        </div>
    </div>
</div>
