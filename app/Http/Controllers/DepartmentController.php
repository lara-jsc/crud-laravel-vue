<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Inertia\Inertia;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //

    public function index(Request $request){
        
        $departmentQuery = Department::query();
        $this->search($departmentQuery, $request->search);

        $paginated_departments = $departmentQuery->latest()->paginate(10);
        // dd($paginated_departments);
        return Inertia::render('Department/Index/Index', [
            'all_departments' => $paginated_departments,
        ]);
    }

    protected function search($query, $search){
        return $query->when($search, function($query,$search){
             $query->where('name', 'like', '%' .$search. '%')
             ->orWhere('id', 'like', '%' .$search. '%');
        });
     }

    public function create(){
        return Inertia::render('Department/Create/Index');
    }

    public function store(Request $request){
        $validated=$request->validate([
            'name' => 'required|string'
        ]);

        Department::create($validated);
        return redirect()->route('department')->with('message', 'Department was created successfully');

    }

    public function edit(Department $department){
        return Inertia::render('Department/Edit/Index',[
            'department' => $department
        ]);

    }

    public function update(Department $department, Request $request){
        $validated=$request->validate([
            'name' => 'required|string'
        ]);

        $department->update($validated);
        return redirect()->route('department')->with('message', 'Department was updated successfully');

    }

    public function delete(Department $department){
        $department->delete();
        return redirect()->route('department')->with('message', 'Department was deleted successfully');
    }
}
