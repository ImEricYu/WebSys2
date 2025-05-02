<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Permission access|Permission create|Permission edit|Permission delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Permission create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Permission edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Permission delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $query = Permission::latest();

        // Check if a search term is provided
        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $permissions = $query->paginate(4);

        return view('setting.permission.index', compact('permissions'));
    }


    public function create()
    {
        return view('setting.permission.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Permission::create(['name' => $request->name]);
        return redirect()->back()->withSuccess('Permission created !!!');
    }

    public function edit(Permission $permission)
    {
        return view('setting.permission.edit', ['permission' => $permission]);
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update(['name' => $request->name]);
        return redirect()->back()->withSuccess('Permission updated !!!');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->back()->withSuccess('Permission deleted !!!');
    }
}
