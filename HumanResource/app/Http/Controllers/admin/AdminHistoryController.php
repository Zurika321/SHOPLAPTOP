<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class AdminHistoryController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Employees Management";
        // if ($request->has('search')) {
        //     $search = $request->query('search');
        //     $viewData["employees"] = History::where('NationalIDNumber', 'like', '%' . $search . '%')
        //         ->orWhere('LoginID', 'like', '%' . $search . '%')
        //         ->orWhere('JobTitle', 'like', '%' . $search . '%')
        //         ->orWhere('BirthDate', 'like', '%' . $search . '%')
        //         ->get();
        // } else {
        //     // Nếu không có tìm kiếm, lấy tất cả nhân viên
        //     $viewData["employees"] = History::all();
        // }
        $viewData["history"] = History::all();
        
        return view('admin.history.index')->with("viewData", $viewData);
    }
}
