<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Error;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr;

class CustomerController extends Controller
{
    function register()
    {
        return view('fronten.customers.register');
    }

    function Postregistered(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required||min:9|max:11',
            'address' => 'required|max:255',
            'email' => 'required|email|unique:customers,email|max:255',
            'password' => 'required|min:8',
        ]);
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->password = Hash::make($request->password);
            $customer->provider_name = 'website';
            $customer->provider_id = null;
            $customer->avatar = null;
            $customer->save();

            Auth::guard('customer')->login($customer);
            Session::flash('messages', 'successfully');
            return redirect()->route('customer.home');
        } catch (Exception $e) {
            SEssion::flash('messages', 'error Register');
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            return redirect()->back();
        }
    }

    function login()
    {
        try {
            if (!Auth::guard('customer')->check()) {
                return view('fronten.customers.login');
            }
            return redirect()->route('customer.home');
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
        }
    }


    function checkLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:customers,email',
                'password' => 'required|min:8|max:30'
            ], [
                'email.exists' => 'Email -' . $request->email . '- is not registered'
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::guard('customer')->attempt($credentials)) {
                return redirect()->route('customer.home');
            } else {
                return redirect()->route('customer.login')->with('fail', 'Login failed!!! please try again');
            }
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
        }
    }

    function customerLogout()
    {
        Auth::guard('customer')->logout();

        return redirect()->route('home');
    }

    function index()
    {
        $this->authorize('viewAny', Customer::class);
        try {
            $customers = Customer::latest()->paginate(10);
            $param = [
                'customers' => $customers
            ];
            return view('admin.customers.index', $param);
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
        }
    }

    public function show($id)
    {
        try {
            $this->authorize('view', Customer::class);

            $customer = Customer::findOrFail($id);
            $param = [
                'customer' => $customer
            ];
            return view('admin.customers.show', $param);
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
        }
    }

    function update(CustomerRequest $request, $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->email = $request->email;
            $customer->name = $request->name;
            $customer->name = $request->name;
            $customer->name = $request->name;

            $customer->save();
            Session::flash('success', 'successfully');
            return redirect()->route('customer.index');
        } catch (Exception $e) {
            Session::flash('fail', 'error update!!!!!!! please try again');
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine()) . 'file___' . $e->getFile();
            return redirect()->back();
        }
    }

    function edit($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $param = [
                'customer' => $customer
            ];
            return view('admin.customers.edit', $param);
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
        }
    }


    function destroy($id)
    {
        $this->authorize('delete', Customer::class);

        try {

            DB::beginTransaction();
            $customer = Customer::findOrFail($id);
            $customer->delete();
            DB::commit();
            $messages = 'Deleted successfully.';
            return response()->json([
                'messages' => $messages,
                'status' => 1
            ], 200);
            // die();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('messages' . $e->getMessage() . 'line________' . $e->getLine());
            $messages = 'Deleted errors!!!please try again.';
            return response()->json([
                'messages' => $messages,
                'status' => 0
            ], 200);
        }
    }
    function trash()
    {
        try {
            $customers = Customer::onlyTrashed()->get();
            $param = [
                'customers' => $customers
            ];
            return view('admin.customers.recycleBin', $param);
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
        }
    }

    function restore($id)
    {
        try {
            Customer::withTrashed()->where('id', $id)->restore();
            $status = 1;
            return response()->json([
                'messages' => 'successfully',
                'status' => 1
            ], 200);
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            $status = 0;
            return response()->json([
                'messages' => 'successfully',
                'status' => 0
            ], 404);
        }
    }
    function forceDelete($id)
    {

        try {
            Customer::withTrashed()->where('id', $id)->forceDelete();;
            $status = 1;
            return response()->json([
                'messages' => 'successfully',
                'status' => 1
            ], 200);
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            $status = 0;
            return response()->json([
                'messages' => 'successfully',
                'status' => 0
            ], 404);
        }
    }
}
