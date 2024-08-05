<?php

namespace App\Http\Controllers;
use App\Models\ServiceRecord;
use App\Models\Employee;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    //
    public function index(Request $request){
    

        $serviceQuery = ServiceRecord::query();
        $this->search($serviceQuery, $request->search);

        $paginated_service = $serviceQuery->latest()->paginate(10);
    
        return Inertia::render('ServicesRecord/Index/Index', [
            'all_service_record' => $paginated_service,

        ]);
    }

    protected function search($query, $search){

        return $query->when($search, function($query,$search){
             $query->where('service_type', 'like', '%' .$search. '%');
            //  ->orWhere('last_name', 'like', '%' .$search. '%')
        });
 
     }

    public function create(){
        $all_employees = Employee::all();
        // dd([
        //     'all_employees' => $all_employees
        // ]);
        return Inertia::render('ServicesRecord/Create/Index',[
            'all_employees' => $all_employees
        ]);
    }

    public function store(Request $request){
            // dd($request);
        // exists:employees,id
        $validated=$request->validate([
            'employee_id' => 'required|exists:employees,id',
            'service_date' => 'required|date',
            'service_type' => 'required|string',
            'description' => 'nullable|string',
            'duration' => 'nullable|integer',
            'result' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $user_id = $request->user()->id;

        ServiceRecord::create(array_merge(
            $validated,
            ['user_id' => $user_id]
        ));

        return redirect()->route('services')->with('message', 'Employee was created successfully');
    }

    public function edit(ServiceRecord $service){
        
        $service->load('employee');

        return Inertia::render('ServicesRecord/Edit/Index',[
            'service' => $service
        ]);
    }

    public function update(ServiceRecord $service, Request $request){
        $validated=$request->validate([
            'employee_id' => 'required|exists:employees,id',
            'service_date' => 'required|date',
            'service_type' => 'required|string',
            'description' => 'nullable|string',
            'duration' => 'nullable|integer',
            'result' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $service->update($validated);
        return redirect()->route('services')->with('message', 'Service Record was updated successfully');
    }

    public function delete(ServiceRecord $service){
        $service->delete();
        return redirect()->route('services')->with('message', 'Service Record was deleted successfully');
    }
}
