<?php

namespace App\Http\Controllers;

use App\Models\permission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function create()
    {
        return view('admin.permissions.add');
    }
    
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
                 $permissionParent = new Permission();
            $permissionParent->name = $request->module ;
            $permissionParent->group_name = $request->module;
            $permissionParent->group_key = 0;
            $permissionParent->save();
        
        foreach ($request->permission_ids as  $item) {
            $permission = new Permission();
            $permission->name = $request->module . '_' . $item;
            $permission->group_name = $request->module;
            $permission->group_key = $permissionParent->id;
            $permission->save();
            DB::commit();
        }
        Session::flash('messages', 'Phân quyền thành công');
        return redirect()->route('dashboard');   
        } catch (Exception $e) {
            DB::rollBack();
           Log::error('messages'.$e->getMessage().'---Line'.$e->getLine());
           abort(403);
        }
    
    }
}
