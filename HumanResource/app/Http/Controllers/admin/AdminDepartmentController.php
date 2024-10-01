<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Depends;

class AdminDepartmentController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Departments Management";
        $viewData["departments"] = Department::all();
        return view('admin.departments.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $department = Department::with('employees')->findOrFail($id);
        $viewData = [
            "title" => "Employees in " . $department->Name,
            "department" => $department
        ];
        return view('admin.departments.show')->with("viewData", $viewData);
    }
    public function create()
    {
        $viewData = [
            "title" => "Add New Department"
        ];
        return view('admin.departments.create')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        $request->validate([
            "Name" => "required|max:100",
            "GroupName" => "required|max:255",
        ]);

        // Tạo nhân viên với dữ liệu từ form
        Department::create($request->only([
            "Name", 
            "GroupName", 
        ]));

        return redirect()->route('admin.departments.index')->with('success', 'Department added successfully!');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $viewData = [
            "title" => "Edit Department",
            "department" => $department
        ];
        return view('admin.departments.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "Name" => "required|max:100",
            "GroupName" => "required|max:255",
        ]);
    
        $department = Department::findOrFail($id);
        $department->ModifiedDate = now();
        $department->update($request->only([
            "Name", 
            "GroupName", 
        ]));
    
        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully!');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id); // Tìm nhân viên cần xóa
        $department->delete(); // Thực hiện xóa nhân viên

        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully!');
    }
    public function employees($id)
{
    $department = Department::findOrFail($id);
    $employees = $department->employees; // Giả sử bạn có phương thức này trong model

    $viewData = [
        "title" => "Employees in " . $department->Name,
        "department" => $department,
        "employees" => $employees
    ];
    
    return view('admin.departments.employees')->with("viewData", $viewData);
}
}
