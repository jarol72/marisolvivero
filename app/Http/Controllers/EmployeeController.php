<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Exports\EmployeesExport;

class employeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = User::where('role_id', 2)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
    
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');

        $user->save();

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = User::findOrFail($id);
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        
        $user->update();

        return redirect()->route('employees.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::findOrFail($id);

        $employee->delete();

        return redirect()->route('employees.index');
    }

    public function xls() 
    {
        $employeesExport = new EmployeesExport;
        return $employeesExport->download('Employeees ' . date('Ymd') . '.xlsx');
        
    }

    public function pdf() 
    {
        $employeesExport = new EmployeesExport;
        return $employeesExport->download('Employeees ' . date('Ymd') . '.pdf');
        
    }

}
