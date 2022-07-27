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
            Session::flash('success', 'Đã thêm vai trò');
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
            Session::flash('success', 'Đã cập nhật vai trò');
            return redirect()->route('role.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '_____line' . $e->getLine());
            abort(403);
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        try {
            $role = $this->role->findOrFail($id);
            $role->delete();
            // Session::flash('success', 'Đã chuyển vào thùng rác');
            $status=200;
            $messages='Deleted ,'.$role->name;
            return response()->json([
                'messages' =>$messages,
                'status' => 1
            ],$status);
        } catch (Exception $e) {
            $messages='Errors Deleted!!!!! ,'.$role->name;
            $status=403;
            Log::eror('messages' . $e->getMessage() . '---___Line' . $e->getLine());
            return response()->json([
                'messages' =>$messages,
                'status' => 0
            ],$status);
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
    public function restore($id)
    {
        try {
            $role = $this->role->withTrashed()->where('id', $id)->restore();;

            Session::flash('success', 'Phục Hồi thành công');
            return redirect()->route('role.index');
        } catch (Exception $e) {
            abort(403);
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }
    // public function forceDelete($id){
    //     try {
    //         DB::beginTransaction();
    //         $role = Role::withTrashed()->find($id);
    //         dd($role->permissions);
    //         $role->forceDelete();
    //         DB::commit();
    //         Session::flash('success', 'Xóa danh mục vĩnh viễn thành công');
    //         return redirect()->route('role-trashed');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Session::flash('success', 'Xóa danh mục vĩnh viễn lỗi!!! Hãy thử lại');
    //         Log::error('messages' . $e->getMessage() . 'line________' . $e->getLine());
    //         return redirect()->route('role-trashed');
    //     }
    // }
 
}
