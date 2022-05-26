<?php
    require_once('sistema.controller.php');

    class StatusSoporte extends Sistema{
        var $id_statusSoporte;
        var $statusSoporte;
        
        function setId_statusSoporte($id){
            $this-> id_statusSoporte = $id;
 
        }
        function getId_statusSoporte(){
         return $this->id_statusSoporte;
        }
        function setstatusSoporte($statusSoporte){
         $this-> statusSoporte = $statusSoporte;
        }
        function getStatusSoporte(){
            return $this->statusSoporte;
        }


        function create($statusSoporte){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO statussoporte(statusSoporte)
             VALUES (:statusSoporte)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':statusSoporte',$statusSoporte, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT * FROM statusSoporte");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_statusSoporte){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM statussoporte where id_statusSoporte= :id_statusSoporte";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_statusSoporte',$id_statusSoporte, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_statusSoporte,$statusSoporte){
            $dbh = $this->Connect();
            $sentencia="UPDATE statussoporte 
                            SET statusSoporte=:statusSoporte
                            where id_statusSoporte=:id_statusSoporte";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_statusSoporte',$id_statusSoporte, PDO::PARAM_INT);
            //print_r($id_statusSoporte);
            $stmt->bindParam(':statusSoporte',$statusSoporte, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_statusSoporte){
            $dbh=$this->Connect();
            $sentencia = "delete FROM statussoporte where id_statusSoporte=:id_statusSoporte";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_statusSoporte',$id_statusSoporte, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
    }
    ?>