<?php

namespace App\Http\Controllers;
use App\Models\ServiceRecord;
use App\Models\Employee;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    //

    public function index(){
        $all_service_record = ServiceRecord::all();

         return Inertia::render('ServicesRecord/Index/Index', [
            'all_service_record' => $all_service_record
        ]);
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

    // public function create() {
    //     $all_employees = Employee::select('id', 'first_name', 'last_name')->get();
    //     // dd($all_employees);

    //     return Inertia::render('ServicesRecord/Create/Index', [
    //         'all_employees' => $all_employees
    //     ]);
    // }

    public function store(Request $request){
        dd($request);
        // exists:employees,id
        $validated=$request->validate([
            'employee_id' => 'required',
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
}
