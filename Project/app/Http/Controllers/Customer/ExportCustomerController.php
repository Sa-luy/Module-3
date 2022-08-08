<?php

namespace App\Http\Controllers\Customer;

use App\Exports\CustomerExport;
use App\Http\Controllers\Controller;
use App\Imports\CustomerImport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ExportCustomerController extends Controller
{
    public function export() 
    {
        return Excel::download(new CustomerExport, 'customer.xlsx');
    }
    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        try {

            Excel::import(new CustomerImport,request()->file('file'));
               
        return back();
        } catch (Exception $e) {
            Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
            abort(403);
            
        }
       
    }

}

