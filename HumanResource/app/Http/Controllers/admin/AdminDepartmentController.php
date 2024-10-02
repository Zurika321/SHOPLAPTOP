<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AdminDepartmentController extends Controller
{
    public function index(Request $request)
{
    $viewData = [];
    $viewData["title"] = "Admin Page - Departments Management";
    
    // Kiểm tra xem có query 'search' không
    if ($request->has('search')) {
        $search = $request->query('search');
        // Tìm kiếm các phòng ban dựa trên Name và GroupName
        $viewData["departments"] = Department::where('Name', 'like', '%' . $search . '%')
            ->orWhere('GroupName', 'like', '%' . $search . '%')
            ->orWhere('ModifiedDate', 'like', '%' . $search . '%')
            ->get();
    } else {
        // Nếu không có tìm kiếm, lấy tất cả phòng ban
        $viewData["departments"] = Department::all();
    }
    
    return view('admin.departments.index')->with("viewData", $viewData);
}


    public function show($id)
{
    // Lấy phòng ban cùng với nhân viên thông qua bảng employee_department_history
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
        // Validate form inputs
        $request->validate([
            "DepartmentID" => "required|integer",
            "Name" => "required|max:100",
            "GroupName" => "required|max:255",
        ]);
    
        // Ghi lại dữ liệu vào log
        Log::info('Department Data:', $request->all());
    
        // Tạo department với dữ liệu từ form
        Department::create([
            "DepartmentID" => $request->input('DepartmentID'),
            "Name" => $request->input('Name'),
            "GroupName" => $request->input('GroupName'),
        ]);
    
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
