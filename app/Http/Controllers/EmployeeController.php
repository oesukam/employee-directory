<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Instantiate a new EmployeeController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

//        $employees->load('department');

        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $employee = new Employee;

        $employee->department_id = $request->department;
        $employee->name = $request->name;
        $employee->job_title = $request->job_title;
        $employee->cellphone = $request->cellphone;
        $employee->email = $request->email;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = str_slug($employee->name). '-' . $photo->getClientOriginalName();
            $request->file('photo')->move(base_path() . '/public/images/avatar/', $filename);
            $employee->photo = 'images/avatar/'.$filename;
        }

        $employee->save();

        $request->session()->flash('success', 'New Employee has been created!');

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
        $employee = Employee::find($id);

        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        $departments = Department::all();

        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditEmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->department_id = $request->department;
        $employee->name = $request->name;
        $employee->job_title = $request->job_title;
        $employee->cellphone = $request->cellphone;
        $employee->email = $request->email;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = str_slug($employee->name). '-' . $photo->getClientOriginalName();
            $request->file('photo')->move(base_path() . '/public/images/avatar/', $filename);
            $employee->photo = 'images/avatar/'.$filename;
        }

        $employee->save();

        $request->session()->flash('success', 'The employee has been updated!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return back()->withSuccess("The '$employee->name' employee has been deleted.");
    }
}
