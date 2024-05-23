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
        <h2>Lista de Departamentos</h2>
        <button class="btn btn-primary" onclick="openEmployeeWindow()">Agregar Departamento</button>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="Buscar por nombre" onkeyup="searchEmployee()">
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes iterar sobre tus datos de departamentos para mostrar cada uno -->
            @foreach($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->id }}</td>
                    <td>{{ $departamento->name }}</td>
                    <td>{{ $departamento->description }}</td>
                    <!-- Puedes añadir acciones como editar o eliminar según tus necesidades -->
                    <td>
                        <!-- Por ejemplo, un botón para editar -->
                        <button class="btn btn-primary btn-sm" onclick="editDepartment({{ $departamento->id }})">Editar</button>
                        <!-- O un botón para eliminar -->
                        <button class="btn btn-danger btn-sm" onclick="deleteDepartment({{ $departamento->id }})">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    function openEmployeeWindow() {
        window.open('{{ route("createdepartment") }}', 'Agregar Empleado', 'width=600,height=400');
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
