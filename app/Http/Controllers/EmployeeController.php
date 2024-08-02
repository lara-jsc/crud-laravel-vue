<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    //
    public function index(){
        
        $all_employees = Employee::all();

        // dd(@$all_employees);
        return Inertia::render('Employees/Index/Index', [
            'all_employees' => $all_employees
        ]);
    }

    public function create(){

        return Inertia::render('Employees/Create/Index');
    }

    public function store(Request $request){
        //dd($request);

        $validated=$request->validate([
            'first_name' => 'required|string|max:255',  
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', 
            'phone_number' => 'required|string|max:15',  
            'hire_date' => 'required|date',  
            'position' => 'required|string|max:100',
            'department' => 'required|string|max:100', 
            'status' => 'required|string|max:20', 
        ]);

        $user_id = $request->user()->id;

        Employee::create(array_merge(
            $validated,
            ['user_id' => $user_id]
        ));

        return redirect()->route('employees')->with('message', 'Employee was created successfully');
    }

    public function edit(Employee $employee){
       
        return Inertia::render('Employees/Edit/Index',[
            'employee' => $employee
        ]);
    }

    public function update(Employee $employee, Request $request){
        $validated=$request->validate([
            'first_name' => 'required|string|max:255',  
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', 
            'phone_number' => 'required|string|max:15',  
            'hire_date' => 'required|date',  
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255', 
            'status' => 'required|string|max:20', 

        ]);

        $employee->update($validated);

        return redirect()->route('employees')->with('message', 'Employee was updated successfully');
    }

        public function delete(Employee $employee){
            $employee->delete();
            return redirect()->route('employees')->with('message', 'Employee was deleted successfully');
        }
}
