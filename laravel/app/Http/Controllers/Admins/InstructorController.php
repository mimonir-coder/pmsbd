<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class InstructorController extends Controller
{
    public function index(): View
    {
        $instructors = Instructor::query()->orderBy('sort_order')->orderBy('name')->paginate(15);

        return view('admins.instructors.index', compact('instructors'));
    }

    public function create(): View
    {
        return view('admins.instructors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'qualifications' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
            'is_active' => ['sometimes', 'boolean'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('instructors', 'public');
        } else {
            unset($data['image']);
        }

        Instructor::query()->create($data);

        return redirect()->route('admin.instructors.index')->with('status', 'Instructor saved.');
    }

    public function edit(Instructor $instructor): View
    {
        return view('admins.instructors.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'qualifications' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
            'is_active' => ['sometimes', 'boolean'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($instructor->image) {
                Storage::disk('public')->delete($instructor->image);
            }
            $data['image'] = $request->file('image')->store('instructors', 'public');
        } else {
            unset($data['image']);
        }

        $instructor->update($data);

        return redirect()->route('admin.instructors.index')->with('status', 'Instructor updated.');
    }

    public function destroy(Instructor $instructor): RedirectResponse
    {
        if ($instructor->image) {
            Storage::disk('public')->delete($instructor->image);
        }
        $instructor->delete();

        return redirect()->route('admin.instructors.index')->with('status', 'Instructor deleted.');
    }
}
