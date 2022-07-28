<?php
    //Archivo que contiene los querys necesarios para realizar las transacciones en las tablas
    //Clase general para los pacientes
    class Paciente extends Conectar {

        //Método que recupera TODOS los pacientes de la tabla donde su estado es 1.
        public function get_paciente(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,nombre,apellidop,apellidom,sexo,servicio,lugarnac,fechanac,edad,calle,noext,noint,cp,antiguedad,municipio,entidadfed,colonia,seccion,ref,ubicacion,fotocasa FROM pacientes WHERE estado=1";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Método para recuperar UN solo registro de la tabla Paciente
        public function get_paciente_id($id_paciente){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,nombre,apellidop,apellidom,sexo,servicio,lugarnac,fechanac,edad,calle,noext,noint,cp,antiguedad,municipio,entidadfed,colonia,seccion,ref,ubicacion,fotocasa FROM pacientes WHERE estado=1 AND id=?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id_paciente);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Insertar un nuevo pacientes
        public function insert_paciente($nombre, $apellido, $apellidop, $apellidom, $sexo, $servicio, $lugarnac, $fechanac, $edad, $calle, $noext, $noint, $cp, $antiguedad, $municipio, $entidadfed, $colonia, $seccion, $ref, $ubicacion, $fotocasa){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO pacientes (id,nombre,apellidop,apellidom,sexo,servicio,lugarnac,fechanac,edad,calle,noext,noint,cp,antiguedad,municipio,entidadfed,colonia,seccion,ref,ubicacion,fotocasa) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $nombre);
            $sql -> bindValue(2, $apellidop);
            $sql -> bindValue(3, $apellidom);
            $sql -> bindValue(4, $sexo);
            $sql -> bindValue(5, $servicio);
            $sql -> bindValue(6, $lugarnac);
            $sql -> bindValue(7, $fechanac);
            $sql -> bindValue(8, $edad);
            $sql -> bindValue(9, $calle);
            $sql -> bindValue(10, $noext);
            $sql -> bindValue(11, $noint);
            $sql -> bindValue(12, $cp);
            $sql -> bindValue(13, $antiguedad);
            $sql -> bindValue(14, $municipio);
            $sql -> bindValue(15, $entidadfed);
            $sql -> bindValue(16, $colonia);
            $sql -> bindValue(17, $seccion);
            $sql -> bindValue(18, $ref);
            $sql -> bindValue(19, $ubicacion);
            $sql -> bindValue(20, $fotocasa);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Actualizar los datos de un paciente
        public function update_paciente($id, $nombre, $apellido, $apellidop, $apellidom, $sexo, $servicio, $lugarnac, $fechanac, $edad, $calle, $noext, $noint, $cp, $antiguedad, $municipio, $entidadfed, $colonia, $seccion, $ref, $ubicacion, $fotocasa){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE pacientes SET nombre=?,apellidop=?,apellidom=?,sexo=?,servicio=?,lugarnac=?,fechanac=?,edad=?,calle=?,noext=?,noint=?,cp=?,antiguedad=?,municipio=?,entidadfed=?,colonia=?,seccion=?,ref=?,ubicacion=?,fotocasa=? WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $nombre);
            $sql -> bindValue(2, $apellidop);
            $sql -> bindValue(3, $apellidom);
            $sql -> bindValue(4, $sexo);
            $sql -> bindValue(5, $servicio);
            $sql -> bindValue(6, $lugarnac);
            $sql -> bindValue(7, $fechanac);
            $sql -> bindValue(8, $edad);
            $sql -> bindValue(9, $calle);
            $sql -> bindValue(10, $noext);
            $sql -> bindValue(11, $noint);
            $sql -> bindValue(12, $cp);
            $sql -> bindValue(13, $antiguedad);
            $sql -> bindValue(14, $municipio);
            $sql -> bindValue(15, $entidadfed);
            $sql -> bindValue(16, $colonia);
            $sql -> bindValue(17, $seccion);
            $sql -> bindValue(18, $ref);
            $sql -> bindValue(19, $ubicacion);
            $sql -> bindValue(20, $fotocasa);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Borrar un paciente(cambio de estado de 1 a 0)
        //Borrado lógico
        public function delete_paciente($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE pacientes SET estado=0 WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Borrar físico
        public function kill_paciente($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE FROM pacientes WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_pacientes(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * FROM pacientes";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>