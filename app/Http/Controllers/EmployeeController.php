<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    //
    public function index(Request $request){      
        $employeeQuery = Employee::query()
            ->with('latestServiceRecord.department');
        $this->search($employeeQuery, $request->search);

        // foreach ($employeeQuery->get() as $employee) {
            // dd($employeeQuery->department);
        // }

        $paginated_employees = $employeeQuery->latest()->paginate(10);

        return Inertia::render('Employees/Index/Index', [
            'all_employees' => $paginated_employees,
        ]);

    }

    protected function search($query, $search){

       return $query->when($search, function($query,$search){
            $query->where('first_name', 'like', '%' .$search. '%')
            ->orWhere('last_name', 'like', '%' .$search. '%')
            ->orWhere('email', 'like', '%' .$search. '%');

       });
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
            // 'position' => 'required|string|max:100',
            // 'department' => 'required|string|max:100', 
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
            // 'position' => 'required|string|max:255',
            // 'department' => 'required|string|max:255', 
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
