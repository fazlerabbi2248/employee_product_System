<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{

    public function index(): view
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }


    public function create(): view
    {
        return view('employees.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable',
            'birth_date' => 'nullable|date',
            'address' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/employee_images', $imageName);
            $validatedData['image'] = 'employee_images/' . $imageName;
        }

        Employee::create($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully');

    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }


    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit', compact('employee'));
    }


    public function update(Request $request, $id)
    {

        $employee = Employee::find($id);


        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable',
            'birth_date' => 'nullable|date',
            'address' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/employee_images', $imageName);
            $validatedData['image'] = 'employee_images/' . $imageName;
        }

        
        $employee->update($validatedData);

        return redirect()->route('employees.show', $employee->id)->with('success', 'Employee updated successfully');
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
        
    }
}
