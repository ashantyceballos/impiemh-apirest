<?php
    //Encabezado para que PHP reconozca que se van a intercambiar archivos JSON
    header('Content-Type: application/json');
    
    //Este archivo será el controlador del API REST, aquí se van a hacer las operaciones del CRUD
    //CREATE, READ, UPDATE, DELETE
    require_once "../config/conexion.php";
    require_once "../models/Citas.php";

    //Para recibir solicitudes de la URI
    $body = json_decode(file_get_contents("php://input"),true);

    //Instanciar el objeto producto se usará para realizarlas acciones del API
    $cita = new Cita(); 

    //Crear el Web service que realice las acciones del CRUD por medio de la API REST, el switch será el encargado de atender las peticiones
    switch($_GET["opcion"]){
        //Este caso, recupera todos los datos de la tabla citas, la información recuperada de lo que indica el archivo models->Citas.php -> método get_cita()
        case "getAll":
            $datos = $cita -> get_cita();
            //Una vez recuperados los datos, se les da formato json
            echo json_encode($datos);
            break;
        //Para recuperar un registro se ocupa get, que tiene el id de la cita
        case "get":
            $datos = $cita -> get_cita_id($body["id"]); //Este id es el de la tabla a consultar
            echo json_encode($datos);
            break;
        //Para insertar un registro se deben mandar los campos en el json
        case "insert":
            //Datos a insertar en la tabla
            $datos = $cita -> insert_cita($body["dia"],$body["hora"],$body["tipo"],$body["psicologa"],$body["nombrep"],$body["apellidopp"],$body["apellidomp"],$body["id_paciente"],$body["tema"]);
            echo json_encode("Expediente Ingresado");
            break;
        //Para actualizar un registro se deben mandar los campos en el json
        case "update":
            //Datos a actualizar en la tabla
            $datos = $cita -> update_cita($body["dia"],$body["hora"],$body["tipo"],$body["psicologa"],$body["nombrep"],$body["apellidopp"],$body["apellidomp"],$body["id_paciente"],$body["tema"]);
            echo json_encode("Cita Actualizado");
            break;
        //Para hacer un borrado lógico de un registro
        case "delete":
            //Solo el id
            $datos = $cita -> delete_cita($body["id"]);
            echo json_encode("Cita eliminada");
            break;
        //Para hacer un borrado físico de un registro
        case "kill":
            //Solo el id
            $datos = $cita -> kill_cita($body["id"]);
            echo json_encode("Cita eliminada completamente");
            break;

        case "getCitas":
            $datos = $cita -> get_citas();
            //Una vez recuperados los datos, se les da formato json
            echo json_encode($datos); //
            break;
    }
?>