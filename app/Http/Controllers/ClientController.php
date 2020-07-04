<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Exports\ClientsExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
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
        $clients = User::where('role_id', 3)
                        ->orderBy('created_at', 'desc')
                        ->get();
    
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
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
        $client = User::findOrFail($id);
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = User::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
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

        return redirect()->route('clients.edit')->with('status', 'El cliente fue actualizado correctamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = User::findOrFail($id);

        $client->delete();

        return redirect()->route('clients.index');
    }

    public function xls() 
    {
        $clientsExport = new ClientsExport;
        return $clientsExport->download('Clientes ' . date('Ymd') . '.xlsx');
    }
    
    public function pdf() 
    {
        $clients = User::where('role_id', 2)->orderBy('name')->get(); 

        $pdf = PDF::loadView('admin.clients.pdf', compact('clients'));
        $pdf->setPaper('letter', 'portrait');

        return $pdf->stream('listado.pdf');
        
        
        /* $clientsExport = new ClientsExport;
        return $clientsExport->download('Clientes ' . date('Ymd') . '.pdf'); */
    }
}

