<?php

namespace Laratrust\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

class PermissionsController
{
    protected $permissionModel;

    public function __construct()
    {
        $this->permissionModel = Config::get('laratrust.models.permission');
    }

    public function index()
    {
        return View::make('laratrust::panel.permissions.index', [
            'permissions' => $this->permissionModel::simplePaginate(10),
        ]);
    }

    public function edit($id)
    {
        $permission = $this->permissionModel::findOrFail($id);

        return View::make('laratrust::panel.edit', [
            'model' => $permission,
            'type' => 'permission',
        ]);
    }

    public function update(Request $request, $id)
    {
        $permission = $this->permissionModel::findOrFail($id);

        $data = $request->validate([
            'diplay_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $permission->update($data);

        return redirect(route('laratrust.permissions.index'));
    }
}
