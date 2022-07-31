<?php
    //Encabezado para que PHP reconozca que se van a intercambiar archivos JSON
    header('Content-Type: application/json');
    
    //Este archivo será el controlador del API REST, aquí se van a hacer las operaciones del CRUD
    //CREATE, READ, UPDATE, DELETE
    require_once "../config/conexion.php";
    require_once "../models/Pacientes.php";

    //Para recibir solicitudes de la URI
    $body = json_decode(file_get_contents("php://input"),true);

    //Instanciar el objeto producto se usará para realizarlas acciones del API
    $paciente = new Paciente(); 

    //Crear el Web service que realice las acciones del CRUD por medio de la API REST, el switch será el encargado de atender las peticiones
    switch($_GET["opcion"]){
        //Este caso, recupera todos los datos de la tabla pacientes, la información recuperada de lo que indica el archivo models->Productos.php -> método get_producto()
        case "getAll":
            $datos = $paciente -> get_paciente();
            //Una vez recuperados los datos, se les da formato json
            echo json_encode($datos);
            break;
        //Para recuperar un registro se ocupa get, que tiene el id del producto
        case "get":
            $datos = $paciente -> get_paciente_id($body["id"]); //Este id es el de la tabla a consultar
            echo json_encode($datos);
            break;
        //Para insertar un registro se deben mandar los campos en el json
        case "insert":
            //Datos a insertar en la tabla
            $datos = $paciente -> insert_paciente($body["nombre"],$body["apellidop"],$body["apellidom"],$body["sexo"],$body["servicio"],$body["lugarnac"],$body["fechanac"],$body["edad"],$body["calle"],$body["noext"],$body["noint"],$body["cp"],$body["antiguedad"],$body["municipio"],$body["entidadfed"],$body["colonia"],$body["seccion"],$body["ref"],$body["ubicacion"],$body["fotocasa"]);
            echo json_encode("Paciente Ingresado");
            break;
        //Para actualizar un registro se deben mandar los campos en el json
        case "update":
            //Datos a actualizar en la tabla
            $datos = $paciente -> update_paciente($body["nombre"],$body["apellidop"],$body["apellidom"],$body["sexo"],$body["servicio"],$body["lugarnac"],$body["fechanac"],$body["edad"],$body["calle"],$body["noext"],$body["noint"],$body["cp"],$body["antiguedad"],$body["municipio"],$body["entidadfed"],$body["colonia"],$body["seccion"],$body["ref"],$body["ubicacion"],$body["fotocasa"]);
            echo json_encode("Paciente Actualizado");
            break;
        //Para hacer un borrado lógico de un  un registro
        case "delete":
            //Solo el id
            $datos = $paciente -> delete_paciente($body["id"]);
            echo json_encode("Paciente eliminado");
            break;
        //Para hacer un borrado físico de un  un registro
        case "kill":
            //Solo el id
            $datos = $paciente -> kill_paciente($body["id"]);
            echo json_encode("Paciente eliminado completamente");
            break;
            
        case "getPacientes":
            $datos = $paciente -> get_pacientes();
            //Una vez recuperados los datos, se les da formato json
            echo json_encode($datos); //
            break;
    }
?>