<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Roles;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr;

class AdminUserControler extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8',],
        ]);
        try {
            DB::beginTransaction();
            $users = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);
            $users->roles()->attach($request->role_id);
            DB::commit();
            Session::flash('messages', 'Thêm  thành công');

            return redirect()->route('users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }
    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->findOrFail($id);
        $rolesUser = $user->roles;
        // echo '<pre>';
        // print_r($rolesUser);
        // die();

        return view('admin.user.edit', compact('roles', 'user', 'rolesUser'));
    }
    public function update(Request $request, $id)
    {

        try {
            DB::beginTransaction();
            $this->user->findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);
            $users = $this->user->findOrFail($id);
            $users->roles()->sync($request->role_id);
            DB::commit();
            Session::flash('messages', 'Update thành công');

            return redirect()->route('users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }
    public function trashed()
    {
        try {
            $users = $this->user->onlyTrashed()->get();
            return view('admin.user.recycle', compact('users'));
        } catch (Exception $e) {
            abort(403);
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->user->findOrFail($id);
            $user->delete();
            Session::flash('messages', 'Đã chuyển vào thùng rác');
            return redirect()->route('users.index');
        } catch (Exception $e) {
            abort(403);
            Log::eror('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }

  

    //khôi phục thùng rác
    public function restore($id)
    {
        try {
           $user=$this->user->withTrashed()->where('id', $id)->restore();;

            Session::flash('messages', 'Phục Hồi thành công');
            return redirect()->route('users.index');
        } catch (Exception $e) {
            abort(403);
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
        }
    }
    //focre delete
    // public function delete(Request $request){

    // $validated = $request->validate(
    //     [
    //         'ids' => 'required',
    //     ],
    //     [
    //         'ids.required' => 'Bạn phải chọn ô',
    //     ],
    // );
    //    $id=$request->post;
    //    $this->user::whereIn('id', $id)->delete();
    //    return redirect()->route('users.index')->with('messages', 'Xóa user thành công');
    // }

}
