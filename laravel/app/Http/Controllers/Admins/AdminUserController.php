<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $admins = Admin::query()->orderBy('name')->paginate(15);

        return view('admins.admin_users.index', compact('admins'));
    }

    public function create(): View
    {
        return view('admins.admin_users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedAdmin($request);
        $data['password'] = Hash::make($data['password']);
        $data['created_by'] = Auth::guard('admin')->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('admins', 'public');
        }

        Admin::query()->create($data);

        return redirect()->route('admin.admin-users.index')->with('status', 'Admin user created.');
    }

    public function edit(Admin $adminUser): View
    {
        return view('admins.admin_users.edit', ['admin' => $adminUser]);
    }

    public function update(Request $request, Admin $adminUser): RedirectResponse
    {
        $data = $this->validatedAdmin($request, $adminUser->id);
        $data['updated_by'] = Auth::guard('admin')->id();

        if (filled($data['password'] ?? null)) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('image')) {
            if ($adminUser->image) {
                Storage::disk('public')->delete($adminUser->image);
            }
            $data['image'] = $request->file('image')->store('admins', 'public');
        }

        if ($request->boolean('remove_image')) {
            if ($adminUser->image) {
                Storage::disk('public')->delete($adminUser->image);
            }
            $data['image'] = null;
        }

        $adminUser->update($data);

        return redirect()->route('admin.admin-users.index')->with('status', 'Admin user updated.');
    }

    public function destroy(Admin $adminUser): RedirectResponse
    {
        if ($adminUser->is(Auth::guard('admin')->user())) {
            return back()->withErrors(['admin' => 'You cannot delete your own admin account.']);
        }

        if ($adminUser->image) {
            Storage::disk('public')->delete($adminUser->image);
        }

        $adminUser->delete();

        return redirect()->route('admin.admin-users.index')->with('status', 'Admin user deleted.');
    }

    public function editProfile(): View
    {
        return view('admins.admin_users.profile', ['admin' => Auth::guard('admin')->user()]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $admin = Auth::guard('admin')->user();
        $data = $this->validatedAdmin($request, $admin->id, true);

        if (filled($data['password'] ?? null)) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('image')) {
            if ($admin->image) {
                Storage::disk('public')->delete($admin->image);
            }
            $data['image'] = $request->file('image')->store('admins', 'public');
        }

        if ($request->boolean('remove_image')) {
            if ($admin->image) {
                Storage::disk('public')->delete($admin->image);
            }
            $data['image'] = null;
        }

        $admin->update($data);

        return redirect()->route('admin.profile.edit')->with('status', 'Profile updated.');
    }

    private function validatedAdmin(Request $request, ?int $adminId = null, bool $profile = false): array
    {
        $passwordRules = $adminId
            ? ['nullable', 'confirmed', Password::defaults()]
            : ['required', 'confirmed', Password::defaults()];

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('admins', 'email')->ignore($adminId)],
            'mobile' => ['required', 'string', 'max:255', Rule::unique('admins', 'mobile')->ignore($adminId)],
            'type' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in(['Active', 'Inactive'])],
            'password' => $passwordRules,
            'image' => ['nullable', 'image', 'max:2048'],
            'remove_image' => ['sometimes', 'boolean'],
        ];

        if ($profile) {
            $rules['status'] = ['sometimes', Rule::in(['Active', 'Inactive'])];
        }

        $data = $request->validate($rules);

        if ($profile) {
            unset($data['status']);
            $data['type'] = $data['type'] ?? Auth::guard('admin')->user()->type;
        }

        return $data;
    }
}
