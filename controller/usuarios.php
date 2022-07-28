<?php

    //Encabezado para que PHP reconozca que se van a intercambiar archivos JSON
    header('Content-Type: application/json');
        
    //Este archivo será el controlador del API REST, aquí se van a hacer las operaciones del CRUD
    //CREATE, READ, UPDATE, DELETE
    require_once "../config/conexion.php";
    require_once "../models/Usuarios.php";

    //Para recibir solicitudes de la URI
    $body = json_decode(file_get_contents("php://input"),true);

    //Instanciar el objeto producto se usará para realizarlas acciones del API
    $usuario = new Usuario(); 

    switch($_GET["opcion"]){
        //)
        case "login":
            $datos = $usuario -> login();
            //Una vez recuperados los datos, se les da formato json
            echo json_encode($datos);
            break;
        //
        case "logout":
            $datos = $usuario -> logout($body["id"]); //Este id es el de la tabla a consultar
            echo json_encode($datos);
            break;
    }
?>