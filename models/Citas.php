<?php
    //Archivo que contiene los querys necesarios para realizar las transacciones en las tablas
    //Clase general para las citas
    class Cita extends Conectar {

        //Método que recupera TODOS las citas de la tabla donde su estado es 1.
        public function get_cita(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,dia,hora,tipo,psicologa,nombrep,apellidopp,apellidomp,id_paciente FROM citas WHERE estado=1";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Método para recuperar UN solo registro de la tabla Citas
        public function get_cita_id($id_cita){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,dia,hora,tipo,psicologa,nombrep,apellidopp,apellidomp,id_paciente FROM citas WHERE estado=1 AND id=?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id_paciente);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Insertar una nueva cita
        public function insert_cita($dia, $hora, $tipo, $psicologa, $nombrep, $apellidop, $apellidom, $id_paciente){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO citas (id,dia,hora,tipo,psicologa,nombrep,apellidopp,apellidomp,id_paciente) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $dia);
            $sql -> bindValue(2, $hora);
            $sql -> bindValue(3, $tipo);
            $sql -> bindValue(4, $psicologa);
            $sql -> bindValue(5, $nombrep);
            $sql -> bindValue(6, $apellidopp);
            $sql -> bindValue(7, $apellidomp);
            $sql -> bindValue(8, $id_paciente);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Actualizar los datos de una cita
        public function update_cita($id, $dia, $hora, $tipo, $psicologa, $nombrep, $apellidop, $apellidom, $id_paciente){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE citas SET dia=?,hora=?,tipo=?,psicologa=?,nombrep=?,apellidopp=?,apellidomp=?,id_paciente=? WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $dia);
            $sql -> bindValue(2, $hora);
            $sql -> bindValue(3, $tipo);
            $sql -> bindValue(4, $psicologa);
            $sql -> bindValue(5, $nombrep);
            $sql -> bindValue(6, $apellidopp);
            $sql -> bindValue(7, $apellidomp);
            $sql -> bindValue(8, $id_paciente);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Borrar una cita(cambio de estado de 1 a 0)
        //Borrado lógico
        public function delete_cita($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE citas SET estado=0 WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Borrar físico
        public function kill_cita($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE FROM citas WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_citas(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * FROM citas";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>