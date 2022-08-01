<?php
    //Archivo que contiene los querys necesarios para realizar las transacciones en las tablas
    //Clase general para los expedientes
    class Expediente extends Conectar {

        //Método que recupera TODOS los expedientes de la tabla donde su estado es 1.
        public function get_expediente(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,id_paciente,destinatario,remitente,fecha,observacion FROM expedientes WHERE estado=1";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Método para recuperar UN solo registro de la tabla Expediente
        public function get_expediente_id($id_expediente){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,id_paciente,destinatario,remitente,fecha,observacion FROM expedientes WHERE estado=1 AND id=?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id_expediente);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Insertar un nuevo expediente
        public function insert_expediente($id_paciente, $destinatario, $remitente, $fecha, $observacion){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO expedientes (id_paciente,destinatario,remitente,fecha,observacion) VALUES (NULL, ?, ?, ?, ?, ?)";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id_paciente);
            $sql -> bindValue(2, $destinatario);
            $sql -> bindValue(3, $remitente);
            $sql -> bindValue(4, $fecha);
            $sql -> bindValue(5, $observacion);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Actualizar los datos de un expediente
        public function update_expediente($id, $id_paciente, $destinatario, $remitente, $fecha, $observacion){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE expedientes SET id_paciente=?,destinatario=?,remitente=?,fecha=?,observacion=? WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id_paciente);
            $sql -> bindValue(2, $destinatario);
            $sql -> bindValue(3, $remitente);
            $sql -> bindValue(4, $fecha);
            $sql -> bindValue(5, $observacion);
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Borrar un expediente(cambio de estado de 1 a 0)
        //Borrado lógico
        public function delete_expediente($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE expedientes SET estado=0 WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Borrar físico
        public function kill_expediente($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE FROM expedientes WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function get_expedientes(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * FROM expedientes";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>