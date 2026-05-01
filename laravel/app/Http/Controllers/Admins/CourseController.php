<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::query()->with('instructors')->orderBy('sort_order')->orderByDesc('updated_at')->paginate(15);

        return view('admins.courses.index', compact('courses'));
    }

    public function create(): View
    {
        $instructors = Instructor::query()->where('is_active', true)->orderBy('name')->get();

        return view('admins.courses.create', compact('instructors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedCourse($request);
        $data['slug'] = $this->uniqueSlugFromTitle($request->input('title'), $request->input('slug'));
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('courses', 'public');
        } else {
            unset($data['featured_image']);
        }

        if ($request->hasFile('brochure')) {
            $data['brochure_path'] = $request->file('brochure')->store('brochures', 'public');
        } else {
            unset($data['brochure_path']);
        }

        $course = Course::query()->create($data);

        $ids = collect($request->input('instructor_ids', []))->filter()->unique()->values()->all();
        if ($ids !== []) {
            $course->instructors()->sync($ids);
        }

        return redirect()->route('admin.courses.index')->with('status', 'Course saved.');
    }

    public function edit(Course $course): View
    {
        $course->load('instructors');
        $instructors = Instructor::query()->where('is_active', true)->orderBy('name')->get();

        return view('admins.courses.edit', compact('course', 'instructors'));
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
        $data = $this->validatedCourse($request, $course->id);

        $slugInput = trim((string) $request->input('slug'));
        $data['slug'] = $slugInput !== ''
            ? Str::slug($slugInput)
            : Str::slug($request->input('title'));

        $data['slug'] = $this->ensureUniqueSlug($data['slug'], $course->id);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('featured_image')) {
            if ($course->featured_image) {
                Storage::disk('public')->delete($course->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('courses', 'public');
        } else {
            unset($data['featured_image']);
        }

        if ($request->boolean('remove_brochure')) {
            if ($course->brochure_path) {
                Storage::disk('public')->delete($course->brochure_path);
            }
            $data['brochure_path'] = null;
        }

        if ($request->hasFile('brochure')) {
            if ($course->brochure_path) {
                Storage::disk('public')->delete($course->brochure_path);
            }
            $data['brochure_path'] = $request->file('brochure')->store('brochures', 'public');
        } elseif (! $request->boolean('remove_brochure')) {
            unset($data['brochure_path']);
        }

        $course->update($data);

        $ids = collect($request->input('instructor_ids', []))->filter()->unique()->values()->all();
        $course->instructors()->sync($ids);

        return redirect()->route('admin.courses.index')->with('status', 'Course updated.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        if ($course->featured_image) {
            Storage::disk('public')->delete($course->featured_image);
        }
        if ($course->brochure_path) {
            Storage::disk('public')->delete($course->brochure_path);
        }
        $course->delete();

        return redirect()->route('admin.courses.index')->with('status', 'Course deleted.');
    }

    private function validatedCourse(Request $request, ?int $courseId = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'sub_title' => ['nullable', 'string', 'max:255'],
            'fee' => ['nullable', 'numeric', 'min:0'],
            'promo_video_url' => ['nullable', 'string', 'max:2048'],
            'overview' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'schedule' => ['nullable', 'string'],
            'registration_url' => ['nullable', 'string', 'max:2048'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
            'instructor_ids' => ['nullable', 'array'],
            'instructor_ids.*' => ['integer', Rule::exists('instructors', 'id')],
            'featured_image' => ['nullable', 'image', 'max:6144'],
            'brochure' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
            'remove_brochure' => ['sometimes', 'boolean'],
        ]);
    }

    private function uniqueSlugFromTitle(string $title, ?string $slugOptional): string
    {
        $base = trim((string) $slugOptional) !== '' ? Str::slug($slugOptional) : Str::slug($title);

        return $this->ensureUniqueSlug($base);
    }

    private function ensureUniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $original = $slug;
        $i = 1;
        while (Course::query()
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->where('slug', $slug)
            ->exists()) {
            $slug = $original.'-'.$i++;
        }

        return $slug;
    }
}
