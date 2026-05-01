<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\ValuedClient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ValuedClientController extends Controller
{
    public function index(): View
    {
        $clients = ValuedClient::query()->orderBy('sort_order')->orderBy('name')->paginate(15);

        return view('admins.valued_clients.index', compact('clients'));
    }

    public function create(): View
    {
        return view('admins.valued_clients.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
            'is_active' => ['sometimes', 'boolean'],
            'logo' => ['nullable', 'image', 'max:4096'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('clients', 'public');
        } else {
            unset($data['logo']);
        }

        ValuedClient::query()->create($data);

        return redirect()->route('admin.valued-clients.index')->with('status', 'Client saved.');
    }

    public function edit(ValuedClient $valued_client): View
    {
        return view('admins.valued_clients.edit', ['client' => $valued_client]);
    }

    public function update(Request $request, ValuedClient $valued_client): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
            'is_active' => ['sometimes', 'boolean'],
            'logo' => ['nullable', 'image', 'max:4096'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            if ($valued_client->logo) {
                Storage::disk('public')->delete($valued_client->logo);
            }
            $data['logo'] = $request->file('logo')->store('clients', 'public');
        } else {
            unset($data['logo']);
        }

        $valued_client->update($data);

        return redirect()->route('admin.valued-clients.index')->with('status', 'Client updated.');
    }

    public function destroy(ValuedClient $valued_client): RedirectResponse
    {
        if ($valued_client->logo) {
            Storage::disk('public')->delete($valued_client->logo);
        }
        $valued_client->delete();

        return redirect()->route('admin.valued-clients.index')->with('status', 'Client deleted.');
    }
}
