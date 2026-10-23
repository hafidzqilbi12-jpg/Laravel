<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::withCount('users')
            ->with('permissions')
            ->orderBy('id')
            ->get();

        return view('role.index', compact('roles'));
    }

    public function create(): View
    {
        $permissions = Permission::orderBy('name')->get();

        return view('role.create', compact('permissions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('roles', 'name'),
            ],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,name'],
        ]);

        $role = Role::create([
            'name' => $validated['name'],
        ]);

        $role->syncPermissions($validated['permissions'] ?? []);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return redirect()
            ->route('role.index')
            ->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit(Role $role): View
    {
        $permissions = Permission::orderBy('name')->get();

        $role->load('permissions');

        return view('role.edit', compact('role', 'permissions'));
    }

    public function update(
        Request $request,
        Role $role
    ): RedirectResponse {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('roles', 'name')->ignore($role->id),
            ],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,name'],
        ]);

        if ($role->name === 'admin' && $validated['name'] !== 'admin') {
            return back()->withInput()->withErrors([
                'name' => 'Nama role admin tidak boleh diubah.',
            ]);
        }

        $role->update([
            'name' => $validated['name'],
        ]);

        $role->syncPermissions($validated['permissions'] ?? []);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return redirect()
            ->route('role.index')
            ->with('success', 'Role berhasil diubah.');
    }

    public function destroy(Role $role): RedirectResponse
    {
        if ($role->users()->exists()) {
            return redirect()
                ->route('role.index')
                ->with('error', 'Role masih digunakan oleh pengguna.');
        }

        if ($role->name === 'admin') {
            return redirect()
                ->route('role.index')
                ->with('error', 'Role admin tidak boleh dihapus.');
        }

        $role->delete();

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return redirect()
            ->route('role.index')
            ->with('success', 'Role berhasil dihapus.');
    }
}