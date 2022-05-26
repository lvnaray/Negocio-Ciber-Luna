<?php
    require_once('sistema.controller.php');

    class Colonia extends Sistema{
        var $id_colonia;
        var $colonia;
        
        function setId_colonia($id){
            $this-> id_colonia = $id;
 
        }
        function getId_colonia(){
         return $this->id_colonia;
        }
        function setColonia($colonia){
         $this-> colonia = $colonia;
        }
        function getColonia(){
         return $this->colonia;
        }
     

        function create($colonia){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO colonia(colonia) VALUES (:colonia)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':colonia',$colonia, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT * FROM colonia");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_colonia){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM colonia where id_colonia= :id_colonia";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_colonia',$id_colonia, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_colonia, $colonia){
            $dbh = $this->Connect();
            $sentencia="UPDATE colonia 
                            SET colonia=:colonia
                            where id_colonia=:id_colonia";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_colonia',$id_colonia, PDO::PARAM_STR);
            $stmt->bindParam(':colonia',$colonia, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_colonia){
            $dbh=$this->Connect();
            $sentencia = "delete FROM colonia where id_colonia=:id_colonia";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_colonia',$id_colonia, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }

     
    }
?>