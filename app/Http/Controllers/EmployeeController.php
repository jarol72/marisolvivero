<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Hash;

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
                        ->orderBy('name', 'asc')
                        ->get();
    
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
        $request['password'] = Hash::make($request['password']);
        
        $this->validate($request,[
            'role_id' => 'required',
            'nit' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:App\User,email',
            'password' => 'required'
        ]);

        $user = new User();
 
        $user->create($request->all());

        return redirect()->route('clients.create')->with('status', 'El cliente fue creado correctamente.');
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
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'id' => 'required',
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:App\User,email,'.$id,
        ]);
 
        User::findOrFail($id)->update($request->all());

        return redirect()->route('employees.index')->with('status', 'El empleado fue actualizado correctamente.');
        
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
        $employees = User::where('role_id', 2)->orderBy('name')->get(); 

        $pdf = PDF::loadView('admin.employees.pdf', compact('employees'));
        $pdf->setPaper('letter', 'portrait');

        return $pdf->stream('listado.pdf');
        
        
        /* $employeesExport = new EmployeesExport;
        return $employeesExport->download('Employeees ' . date('Ymd') . '.pdf'); */
        
    }

}
