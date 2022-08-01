<?php
    //Archivo que contiene los querys necesarios para realizar las transacciones en las tablas
    //Clase general para los pacientes
    class Paciente extends Conectar {

        //Método que recupera TODOS los pacientes de la tabla donde su estado es 1.
        public function get_paciente(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,noexpediente,nombre,apellidop,apellidom,sexo,servicio,lugarnac,fechanac,edad,calle,noext,noint,cp,antiguedad,municipio,entidadfed,colonia,seccion,ref,fotocasa,telefono,escolaridad,estadocivil,religion,numhijos,servmedico,nomservmed,nombrecontactoem,parentesco,telefonopar FROM pacientes WHERE estado=1";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Método para recuperar UN solo registro de la tabla Paciente
        public function get_paciente_id($id_paciente){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT id,noexpediente,nombre,apellidop,apellidom,sexo,servicio,lugarnac,fechanac,edad,calle,noext,noint,cp,antiguedad,municipio,entidadfed,colonia,seccion,ref,fotocasa,telefono,escolaridad,estadocivil,religion,numhijos,servmedico,nomservmed,nombrecontactoem,parentesco,telefonopar FROM pacientes WHERE estado=1 AND id=?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $id_paciente);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Insertar un nuevo pacientes
        public function insert_paciente($noexpediente, $nombre, $apellidop, $apellidom, $sexo, $servicio, $lugarnac, $fechanac, $edad, $calle, $noext, $noint, $cp, $antiguedad, $municipio, $entidadfed, $colonia, $seccion, $ref, $fotocasa, $telefono, $escolaridad, $estadocivil, $religion, $numhijos, $servmedico, $nomservmed, $nombrecontactoem, $parentesco, $telefonopar){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO pacientes (id, noexpediente, nombre,apellidop,apellidom,sexo,servicio,lugarnac,fechanac,edad,calle,noext,noint,cp,antiguedad,municipio,entidadfed,colonia,seccion,ref,fotocasa,telefono,escolaridad,estadocivil,religion,numhijos,servmedico,nomservmed,nombrecontactoem,parentesco,telefonopar) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $noexpediente);
            $sql -> bindValue(2, $nombre);
            $sql -> bindValue(3, $apellidop);
            $sql -> bindValue(4, $apellidom);
            $sql -> bindValue(5, $sexo);
            $sql -> bindValue(6, $servicio);
            $sql -> bindValue(7, $lugarnac);
            $sql -> bindValue(8, $fechanac);
            $sql -> bindValue(9, $edad);
            $sql -> bindValue(10, $calle);
            $sql -> bindValue(11, $noext);
            $sql -> bindValue(12, $noint);
            $sql -> bindValue(13, $cp);
            $sql -> bindValue(14, $antiguedad);
            $sql -> bindValue(15, $municipio);
            $sql -> bindValue(16, $entidadfed);
            $sql -> bindValue(17, $colonia);
            $sql -> bindValue(18, $seccion);
            $sql -> bindValue(19, $ref);
            $sql -> bindValue(20, $fotocasa);
            $sql -> bindValue(21, $telefono);
            $sql -> bindValue(22, $escolaridad);
            $sql -> bindValue(23, $estadocivil);
            $sql -> bindValue(24, $religion);
            $sql -> bindValue(25, $numhijos);
            $sql -> bindValue(26, $servmedico);
            $sql -> bindValue(27, $nomservmed);
            $sql -> bindValue(28, $nombrecontactoem);
            $sql -> bindValue(29, $parentesco);
            $sql -> bindValue(30, $telefonopar);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        //Actualizar los datos de un paciente
        public function update_paciente($id, $noexpediente, $nombre, $apellidop, $apellidom, $sexo, $servicio, $lugarnac, $fechanac, $edad, $calle, $noext, $noint, $cp, $antiguedad, $municipio, $entidadfed, $colonia, $seccion, $ref, $fotocasa, $telefono, $escolaridad, $estadocivil, $religion, $numhijos, $servmedico, $nomservmed, $nombrecontactoem, $parentesco, $telefonopar){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE pacientes SET noexpediente=?,nombre=?,apellidop=?,apellidom=?,sexo=?,servicio=?,lugarnac=?,fechanac=?,edad=?,calle=?,noext=?,noint=?,cp=?,antiguedad=?,municipio=?,entidadfed=?,colonia=?,seccion=?,ref=?,fotocasa=?,telefono=?,escolaridad=?,estadocivil=?,religion=?,numhijos=?,servmedico=?,nomservmed=?,nombrecontactoem=?,parentesco=?,telefonopar=?) WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $noexpediente);
            $sql -> bindValue(2, $nombre);
            $sql -> bindValue(3, $apellidop);
            $sql -> bindValue(4, $apellidom);
            $sql -> bindValue(5, $sexo);
            $sql -> bindValue(6, $servicio);
            $sql -> bindValue(7, $lugarnac);
            $sql -> bindValue(8, $fechanac);
            $sql -> bindValue(9, $edad);
            $sql -> bindValue(10, $calle);
            $sql -> bindValue(11, $noext);
            $sql -> bindValue(12, $noint);
            $sql -> bindValue(13, $cp);
            $sql -> bindValue(14, $antiguedad);
            $sql -> bindValue(15, $municipio);
            $sql -> bindValue(16, $entidadfed);
            $sql -> bindValue(17, $colonia);
            $sql -> bindValue(18, $seccion);
            $sql -> bindValue(19, $ref);
            $sql -> bindValue(20, $fotocasa);
            $sql -> bindValue(21, $telefono);
            $sql -> bindValue(22, $escolaridad);
            $sql -> bindValue(23, $estadocivil);
            $sql -> bindValue(24, $religion);
            $sql -> bindValue(25, $numhijos);
            $sql -> bindValue(26, $servmedico);
            $sql -> bindValue(27, $nomservmed);
            $sql -> bindValue(28, $nombrecontactoem);
            $sql -> bindValue(29, $parentesco);
            $sql -> bindValue(30, $telefonopar);
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