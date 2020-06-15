<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = User::paginate(10)->where('role_id', 3)->get();

        return view('clients')->with('clients', $clients);
    }
}
