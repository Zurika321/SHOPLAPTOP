<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class AdminShiftController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Shift Management";
        // if ($request->has('search')) {
        //     $search = $request->query('search');
        //     $viewData["shift"] = Shift::where('NationalIDNumber', 'like', '%' . $search . '%')
        //         ->orWhere('LoginID', 'like', '%' . $search . '%')
        //         ->orWhere('JobTitle', 'like', '%' . $search . '%')
        //         ->orWhere('BirthDate', 'like', '%' . $search . '%')
        //         ->get();
        // } else {
        //     $viewData["shift"] = History::all();
        // }
        $viewData["shift"] = Shift::all();
        
        return view('admin.shift.index')->with("viewData", $viewData);
    }
    
    public function create()
    {
        $viewData = [
            "title" => "Add New Shift"
        ];
        return view('admin.shift.create')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        // // Validate form inputs
        // $request->validate([
        //     "NationalIDNumber" => "required|max:100",
        //     "LoginID" => "required|max:255",
        //     "JobTitle" => "required|max:50",
        //     "BirthDate" => "required|date",
        //     "MaritalStatus" => "required|in:M,S",
        //     "Gender" => "required|in:M,F",
        //     "HireDate" => "required|date",
        // ]);

        // // Tạo nhân viên với dữ liệu từ form và thêm giá trị mặc định cho VacationHours
        // Shift::create(array_merge(
        //     $request->only([
        //         "NationalIDNumber", 
        //         "LoginID", 
        //         "JobTitle", 
        //         "BirthDate", 
        //         "MaritalStatus", 
        //         "Gender", 
        //         "HireDate",
        //     ]), [
        //         "VacationHours" => 0, // Gán giá trị mặc định là 0 cho VacationHours
        //         "SickLeaveHours" => 0, // Gán giá trị mặc định là 0 cho SickLeaveHours (nếu cần)
        //     ]
        // ));

        return redirect()->route('admin.shift.index')->with('success', 'Shift added successfully!');
    }


    public function show($id)
    {
        $shift = Shift::findOrFail($id);
        $viewData = [
            "title" => "Shift Details",
            "shift" => $shift
        ];
        return view('admin.shift.show')->with("viewData", $viewData);
    }

    public function edit($id)
    {
        $shift = Shift::findOrFail($id);
        $viewData = [
            "title" => "Edit Shift",
            "shift" => $shift
        ];
        return view('admin.shift.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     "NationalIDNumber" => "required|max:100",
        //     "LoginID" => "required|max:255",
        //     "JobTitle" => "required|max:50",
        //     "BirthDate" => "required|date",
        //     "MaritalStatus" => "required|in:M,S",
        //     "Gender" => "required|in:M,F",
        //     "HireDate" => "required|date",
        //     "OrganizationNode" => "nullable|string|max:255",
        //     "OrganizationLevel" => "nullable|string|max:255",
        //     "VacationHours" => "nullable|integer|min:0",
        //     "SickLeaveHours" => "nullable|integer|min:0",
        // ]);
    
        // $shift = Shift::findOrFail($id);
        // $shift->ModifiedDate = now();
        // $shift->update($request->only([
        //     "NationalIDNumber", 
        //     "LoginID", 
        //     "JobTitle", 
        //     "BirthDate", 
        //     "MaritalStatus", 
        //     "Gender", 
        //     "HireDate",
        //     "OrganizationNode",
        //     "OrganizationLevel",
        //     "VacationHours",
        //     "SickLeaveHours",
        // ]));
    
        return redirect()->route('admin.shift.index')->with('success', 'Shift updated successfully!');
    }
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id); 
        $shift->delete(); 

        return redirect()->route('admin.shift.index')->with('success', 'Shift deleted successfully!');
    }
}
