<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = User::where('role_id', 2)->get();

        return view('employees')->with('employees', $employees);
    }
}
