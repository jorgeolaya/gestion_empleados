<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Users;
use App\Models\Employee;
use App\Models\Departments;

class DepartmentController extends Controller
{
    public function index()
    {

        $departamentos = Departments::all();

        // Enviar los empleados a la vista
        //return view('employees.index', compact('employees'))
        return view('department', compact('departamentos')) ;

        
    }

}
