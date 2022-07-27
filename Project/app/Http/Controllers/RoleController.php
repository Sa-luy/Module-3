<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use PDO;

class RoleController extends Controller
{
    private $role;
    public function __construct(Role $role, Permission $permission,)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        try {
            $roles = $this->role->where('deleted_at', '=', null)->paginate(10);
            return view('admin.roles.index', compact('roles'));
        } catch (\Exception $e) {
            Log::error('messages' . $e->getMessage() . '_____line' . $e->getLine());
            abort(403);
        }
    }

    public function create()
    {
        try {
            DB::beginTransaction();
            $permissions = $this->permission->where('group_key', '=', 0)->get();
            foreach ($permissions as $permission)
            $permissionsChilds = $permission->permissionChild;
            DB::commit();
            return view('admin.roles.add', compact('permissions', 'permissionsChilds'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '_____line' . $e->getLine());
            abort(403);
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $role = new Role();
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->save();
            $role->permissions()->attach($request->permission_ids);

            DB::commit();
            Session::flash('messages', 'Đã thêm vai trò');
            return redirect()->route('role.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '_____line' . $e->getLine());
            abort(403);
        }
    }
    public function edit($id)
    {
        // dd(123);
        DB::beginTransaction();
        try {
        $permissions = $this->permission->where('group_key', 0)->get();
        $role = $this->role->findOrFail($id);
        $permissionsChecked = $role->permissions;
        // dd($permissionsChecked);
        return view('admin.roles.edit', compact('role', 'permissions', 'permissionsChecked'));
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('messages' . $e->getMessage() . '_____line' . $e->getLine());
        abort(403);
    }
    }
    public function update(Request $request, $id)
    {
        $role = $this->role->findOrFail($id);
        try {
            DB::beginTransaction();
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->save();
            $role->permissions()->sync($request->permission_ids);
            DB::commit();
            Session::flash('messages', 'Đã cập nhật vai trò');
            return redirect()->route('role.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '_____line' . $e->getLine());
            abort(403);
        }
    }
    public function destroy($id)
    {
        try {
            $role = $this->role->findOrFail($id);
            $role->delete();
            Session::flash('success', 'Đã chuyển vào thùng rác');
            return redirect()->route('role.index');
        } catch (Exception $e) {
            abort(403);
            Log::eror('messages' . $e->getMessage() . '---___Line' . $e->getLine());
        }
    }
    public function trashed (){
        {
            try {
                $roles = Role::onlyTrashed()->get();
                return view('admin.roles.recycle', compact('roles'));
            } catch (Exception $e) {
                Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
                abort(403);
            }
        }
    
    }
    public function recycleBin()
    {
        try {
            $roles = $this->role->where('deleted_at', '!=', null)->paginate(10);
            return view('admin.roles.recycle', compact('roles'));
        } catch (Exception $e) {
            Log::eror('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
        }
    }
    public function rehibilitate($id)
    {
        
        try {
            $role = $this->role->findOrFail($id);
            
            $role->deleted_at = null;
            $role->save();
            Session::flash('messages', 'Phục Hồi thành công');
            return redirect()->route('role.index');
        } catch (Exception $e) {
            abort(403);
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }
}
