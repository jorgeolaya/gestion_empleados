<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Users;


class AuthenticationController extends Controller
{
    public function index()
    {
        return view('authentication');    
    }

    public function testDatabaseConnection()
    {

        //echo "entre aqui en test"  ;

        /*
        // Verificar la conexión a la base de datos
        try {
            \DB::connection()->getPdo();
            return "Conexión exitosa a la base de datos.";
        } 
        catch (\Exception $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
        */

        // Obtener los primeros 5 registros de la tabla inad_control
        $inadControls = Users::take(5)->get();

        // Retornar los registros como una respuesta JSON
        return response()->json($inadControls);
    }    

    public function login(Request $request)
    {

        // Imprimir todas las variables POST
        //dd($request->all());


        // Obtener los datos del formulario
        $email =  $request->input('email');
        $password = $request->input('password');

	    
        $passwordTwo = md5 ($password);

        //echo "passwordTwo  --> $passwordTwo  "   ;
        
        
        // Find the user by email and password
         $user = Users::where('email', $email)
        ->where('password', $passwordTwo) // Assuming password is stored in plain text (NOT recommended)
        ->first();



        if (!$user) {

            /*
            return response()->json([
            'message' => 'Usuario no encontrado o contraseña incorrecta',
            ], 401);
            */

            //echo "Usuario no encontrado o contraseña incorrecta " ;

            return view('authentication')
            ->with('mensaje_respuesta', '2') ;
        
        }

        // Authentication successful
        // You can now use the $user object to access user information

        /*
        return response()->json([
        'message' => 'Usuario autenticado correctamente',
        'user' => $user
        ]);
        */

        //echo "Usuario autenticado correctamente" ;

        //exit;
        //die;

        
        // Authentication successful
        // Create an authentication token (e.g., using Laravel's Passport)
        //$token = auth()->create($user);

        //echo "Usuarkp autemticado correctamente " ;
        
        /*
        return response()->json([
            'message' => 'Usuario autenticado correctamente',
            'token' => $token,
        ]);
        */

        // Authentication successful
        // Extract username from the user object (if it has a 'name' attribute)
        $userName = isset($user->name) ? $user->name : null;        

        //echo "username  --> $username "  ;
        //exit;
        //die;
        

        { 
            {

                // Autenticación exitosa, crea una variable de sesión
                Session::put('email', $email);
                // Otros datos de usuario pueden ser almacenados en la sesión si es necesario
                Session::put('userName', $userName);                    

                return redirect()->route('dashboard');
            }
            
        }
    }
}
