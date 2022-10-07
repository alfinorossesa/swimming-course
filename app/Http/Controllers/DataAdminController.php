<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataAdminRequest;
use App\Models\User;
use App\Services\DataAdminService;
use Illuminate\Http\Request;

class DataAdminController extends Controller
{
    protected $dataAdminService;
    public function __construct(DataAdminService $dataAdminService)
    {
        $this->dataAdminService = $dataAdminService;
    }

    public function index()
    {
        $admins = User::where('isAdmin', true)->latest()->get();

        return view('admin.data-admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.data-admin.create');
    }

    public function store(DataAdminRequest $request)
    {
        $this->dataAdminService->storeData($request);

        return redirect()->route('data-admin.index')->with('success', 'Admin berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        return view('admin.data-admin.edit', compact('user'));
    }

    public function update(DataAdminRequest $request, User $user)
    {
        $this->dataAdminService->updateData($user, $request);

        return redirect()->route('data-admin.index')->with('update', 'Admin berhasil diupdate!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('data-admin.index')->with('destroy', 'Admin berhasil dihapus!');
    }
}
