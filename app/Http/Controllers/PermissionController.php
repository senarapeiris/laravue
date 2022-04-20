<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{

  public function index()
  {
    $permissions = Permission::get();
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['name' => "Permission"]
    ];
    return view('/content/permission/index', [
      'breadcrumbs' => $breadcrumbs,
      'permissions' => $permissions
    ]);
  }


  public function addPermission()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permission"], ['name' => "Add Permission"]
    ];
    return view('/content/permission/add-permission', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }


  public function createPermission(Request $request)
  {

    $permission       = new Permission();
    $permission->name = $request->name;
    $permission->save();

    return redirect()->route()->with('success', 'Permission added successfully!!!');
  }


  public function edit($id)
  {
    $permission = Permission::with('roles')->find($id);

    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permissions"], ['name' => "Edit Permission"]
    ];
    return view('/content/permissions/edit-permission', compact('permission'), [
      'breadcrumbs' => $breadcrumbs
    ]);
  }


  public function update(Request $request)
  {
    $permission = Permission::find($request->id);
    $permission->name = $request->name;
    $permission->update();

    return redirect()->route('permissions')->with('success', 'Permission successfully updated!!!');
 
  }


}