<?php
    require_once('sistema.controller.php');

    class Administrador extends Sistema{
        var $id_usuario;
        
        function setId_usuario($id){
            $this-> id_statusCita = $id;
 
        }
        

        function create($id_usuario){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO administrador(id_usuario)
             VALUES (:id_usuario)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT * FROM administrador");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_usuario){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM administrador where id_usuario= :id_usuario";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_usuario){
            $dbh = $this->Connect();
            $sentencia="UPDATE administrador 
                            SET id_usuario=:id_usuario
                            where id_usuario=:id_usuario";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_usuario){
            $dbh=$this->Connect();
            $sentencia = "delete FROM administrador where id_usuario=:id_usuario";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
    }
    ?>