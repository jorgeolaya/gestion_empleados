<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app3.css') }}">
</head>
<body>

<div class="header">
    <h1>Gestión de Empleados</h1>
</div>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lista de Empleados</h2>
        <button class="btn btn-primary" onclick="openEmployeeWindow()">Agregar Empleado</button>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="Buscar por nombre" onkeyup="searchEmployee()">
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Posición</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->position_id }}</td>
                    <td>{{ $employee->department_id }}</td>
                    <td>
                    <!--    
                    <button class="btn btn-danger btn-sm" onclick="deleteEmployee({{ $employee->id }})">Eliminar</button>
                    -->
                    <form id="deleteEmployeeForm" action="{{ route('empleados.delete', ['id' => $employee->id]) }}" method="POST">

                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" id="employeeIdToDelete" name="employeeId">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                                                            
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    function openEmployeeWindow() {
        window.open('{{ route("createemployees") }}', 'Agregar Empleado', 'width=600,height=400');
    }


    function deleteEmployee(employeeId) {
    // Establecer el valor del campo oculto con el ID del empleado
    document.getElementById('employeeIdToDelete').value = employeeId;
    // Enviar el formulario
    document.getElementById('deleteEmployeeForm').submit();
    }



</script>

</body>
</html>
