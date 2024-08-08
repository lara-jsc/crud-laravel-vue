<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ServiceRecord;
use App\Models\Employee;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    //
    public function index(Request $request){
        $serviceQuery = ServiceRecord::query()->with('department', 'employee');
        $this->search($serviceQuery, $request->search);

    

        $paginated_service = $serviceQuery
            ->latest()
            ->paginate(10);
        return Inertia::render('ServicesRecord/Index/Index', [
            'all_service_record' => $paginated_service,

        ]);
    }

    protected function search($query, $search){

        return $query->when($search, function($query,$search){
             $query->where('position', 'like', '%' .$search. '%');
            //  ->orWhere('last_name', 'like', '%' .$search. '%')
        });
 
     }

    public function create(){
        $all_employees = Employee::all();
        $all_departments = Department::all();
        return Inertia::render('ServicesRecord/Create/Index',[
            'all_employees' => $all_employees, 'all_departments' => $all_departments
        ]);
    }

    public function store(Request $request){
         
        $validated=$request->validate([
            'employee_id' => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'position' => 'required|string',
        ]);

        $user_id = $request->user()->id;

        ServiceRecord::create(array_merge(
            $validated,
            ['user_id' => $user_id]
        ));

        return redirect()->route('services')->with('message', 'Employee was created successfully');
    }

    public function edit(ServiceRecord $service){
        $service = $service->load('employee', 'department');

        $all_employees = Employee::all();
        
        $all_departments = Department::all();
    
        return Inertia::render('ServicesRecord/Edit/Index', [
            'service' => $service,
            'all_employees' => $all_employees,
            'all_departments' => $all_departments,
        ]);
    }

    public function update(ServiceRecord $service, Request $request){
        $validated=$request->validate([
            'employee_id' => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'position' => 'required|string',
        ]);

        $service->update($validated);
        return redirect()->route('services')->with('message', 'Service Record was updated successfully');
    }

    public function delete(ServiceRecord $service){
        $service->delete();
        return redirect()->route('services')->with('message', 'Service Record was deleted successfully');
    }
}
