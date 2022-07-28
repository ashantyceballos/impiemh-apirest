<?php
    //Clase para establecer la conexión de la BD usando PDO
    class Conectar{
        protected $dbhost; //Es una variable protegida reconocida en su clase
        
        //Función para conectar la BD
        protected function conexion(){
            try{
                //$conectar = $this -> dbhost = new PDO("mysql:host=localhost; dbname=ferreteria_apirest", "root", "");
                $conectar = $this -> dbhost = new PDO("mysql:host=us-cdbr-east-06.cleardb.net; dbname=heroku_dbc165a5fd5435a", "bbcfd3f35b565b", "67a39ef0");
                return $conectar;
            } catch(Exception $e){
                print "!!!Error: ".$e -> getMessage()." <br> ";
                die();
            }
        }

        //Función para la codificación de caracteres UTF
        public function set_names(){
            return $this -> dbhost -> query("SET NAMES 'utf8'");
        }
    }
?>