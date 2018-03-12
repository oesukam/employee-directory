<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Http\Requests;
use App\Http\Requests\DepartmentRequest;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Instantiate a new DepartmentController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'showEmployees']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('departments.index', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();

        return view('departments.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $department = new Department;

        $department->name = $request->name;
        $department->office_number = $request->office_number;
        $department->manager = $request->employee;

        $department->save();

        $request->session()->flash('success', 'New Department has been created!');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);

        return view('departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        $employees = Employee::all();

//        $department->with('employees');

        return view('departments.edit', compact('department', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::findOrFail($id);

        $department->name = $request->name;
        $department->office_number = $request->office_number;
        $department->manager = $request->employee;
        $department->save();

        return back()->with('success', 'Department updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return back()->withSuccess("The '$department->name' department has been deleted.");
    }

    /**
     * View employees in a department
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEmployees($id)
    {
        $department = Department::findOrFail($id);

        $department->with('employees');

        return view('departments.show-employees', compact('department'));
    }
}
