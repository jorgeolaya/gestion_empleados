<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Users;
use App\Models\Employee;


class CreateEmployeesController extends Controller
{
    public function index()
    {
        return view('createemployees');    
    }


    public function storeEmployee(Request $request)
    {
        // Valida los datos del formulario
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:employees|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        // Crea un nuevo objeto Employee con los datos validados
        $employee = new Employee();
        $employee->first_name = $validatedData['firstName'];
        $employee->last_name = $validatedData['lastName'];
        $employee->email = $validatedData['email'];
        $employee->position_id = $validatedData['position'];
        $employee->department_id = $validatedData['department'];
        $employee->phone = $validatedData['phone'];

        // Guarda el empleado en la base de datos
        $employee->save();

        // Redirige a la página de lista de empleados u otra página de tu elección
        return redirect()->route('employees.index')->with('success', 'Empleado creado exitosamente');
    }
}
