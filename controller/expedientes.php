<?php
    //Encabezado para que PHP reconozca que se van a intercambiar archivos JSON
    header('Content-Type: application/json');
    
    //Este archivo será el controlador del API REST, aquí se van a hacer las operaciones del CRUD
    //CREATE, READ, UPDATE, DELETE
    require_once "../config/conexion.php";
    require_once "../models/Expedientes.php";

    //Para recibir solicitudes de la URI
    $body = json_decode(file_get_contents("php://input"),true);

    //Instanciar el objeto producto se usará para realizarlas acciones del API
    $expediente = new Expediente(); 

    //Crear el Web service que realice las acciones del CRUD por medio de la API REST, el switch será el encargado de atender las peticiones
    switch($_GET["opcion"]){
        //Este caso, recupera todos los datos de la tabla pacientes, la información recuperada de lo que indica el archivo models->Expedientes.php -> método get_expediente()
        case "getAll":
            $datos = $expediente -> get_expediente();
            //Una vez recuperados los datos, se les da formato json
            echo json_encode($datos);
            break;
        //Para recuperar un registro se ocupa get, que tiene el id del expediente
        case "get":
            $datos = $expediente -> get_expediente_id($body["id"]); //Este id es el de la tabla a consultar
            echo json_encode($datos);
            break;
        //Para insertar un registro se deben mandar los campos en el json
        case "insert":
            //Datos a insertar en la tabla
            $datos = $expediente -> insert_expediente($body["id_paciente"],$body["destinatario"],$body["remitente"],$body["fecha"],$body["observacion"]);
            echo json_encode("Envio de expediente Ingresado");
            break;
        //Para actualizar un registro se deben mandar los campos en el json
        case "update":
            //Datos a actualizar en la tabla
            $datos = $expediente -> update_expediente($body["id_paciente"],$body["destinatario"],$body["remitente"],$body["fecha"],$body["observacion"]);
            echo json_encode("Envio de expediente Actualizado");
            break;
        //Para hacer un borrado lógico de un  un registro
        case "delete":
            //Solo el id
            $datos = $expediente -> delete_expediente($body["id"]);
            echo json_encode("Envio de expediente eliminado");
            break;
        //Para hacer un borrado físico de un  un registro
        case "kill":
            //Solo el id
            $datos = $expediente -> kill_expediente($body["id"]);
            echo json_encode("Envio de expediente eliminado completamente");
            break;
            
        case "getExpedientes":
            $datos = $paciente -> get_expedientes();
            //Una vez recuperados los datos, se les da formato json
            echo json_encode($datos); //
            break;
    }
?>