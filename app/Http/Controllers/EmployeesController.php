<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Users;
use App\Models\Employee;


class EmployeesController extends Controller
{
    public function index2()
    {
        return view('employees');    
    }

    public function index()
    {
        $employees = Employee::all();

        // Enviar los empleados a la vista
        //return view('employees.index', compact('employees'))
        return view('employees', compact('employees')) ;
    }

    public function store(Request $request)
    {

        //echo "store ----- " ;

         //dd($request->all());
         //exit ;
         //die;

        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json($employee, 200);
    }

    public function destroy($id)
    {

        echo "destroy --- " ; 
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(['success' => true]);
    }

}
