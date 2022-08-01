<?php
    //Archivo que contiene los querys necesarios para realizar las transacciones en las tablas
    //Clase general para los expedientes
    class Llamada extends Conectar {

        //Método que recupera TODOS los expedientes de la tabla donde su estado es 1.
        public function get_llamada(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,edad,escolaridad,numero,comentarios FROM llamadas WHERE estado=1";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Método para recuperar UN solo registro de la tabla Expediente
        public function get_llamada_id($id_llamada){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,edad,escolaridad,numero,comentarios FROM llamadas WHERE estado=1 AND id=?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id_llamada);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Insertar un nuevo expediente
        public function insert_llamada($edad, $escolaridad, $numero, $comentarios){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO llamadas (id,edad,escolaridad,numero,comentarios) VALUES (NULL, ?, ?, ?, ?)";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $edad);
            $sql -> bindValue(2, $escolaridad);
            $sql -> bindValue(3, $numero);
            $sql -> bindValue(4, $comentarios);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Actualizar los datos de un expediente
        public function update_llamada($id, $edad, $escolaridad, $numero, $comentarios){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE llamadas SET edad=?,escolaridad=?,numero=?,comentarios=? WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $edad);
            $sql -> bindValue(2, $escolaridad);
            $sql -> bindValue(3, $numero);
            $sql -> bindValue(4, $comentarios);
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Borrar un expediente(cambio de estado de 1 a 0)
        //Borrado lógico
        public function delete_llamada($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE llamadas SET estado=0 WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Borrar físico
        public function kill_llamada($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE FROM llamadas WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function get_llamadas(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * FROM llamadas";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>