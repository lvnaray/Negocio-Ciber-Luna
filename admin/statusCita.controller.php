<?php
    require_once('sistema.controller.php');

    class StatusCita extends Sistema{
        var $id_statusCita;
        var $statusCita;
        
        function setId_statusCita($id){
            $this-> id_statusCita = $id;
 
        }
        function getId_statusCita(){
         return $this->id_statusCita;
        }
        function setstatusCita($statusCita){
         $this-> statusCita = $statusCita;
        }
        function getstatusCita(){
            return $this->statusCita;
        }


        function create($statusCita){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO statuscita(statusCita)
             VALUES (:statusCita)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':statusCita',$statusCita, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT * FROM statuscita");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_statusCita){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM statusCita where id_statusCita= :id_statusCita";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_statusCita',$id_statusCita, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_statusCita,$statusCita){
            $dbh = $this->Connect();
            $sentencia="UPDATE statuscita 
                            SET statusCita=:statusCita
                            where id_statusCita=:id_statusCita";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_statusCita',$id_statusCita, PDO::PARAM_STR);
            $stmt->bindParam(':statusCita',$statusCita, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_statusCita){
            $dbh=$this->Connect();
            $sentencia = "delete FROM statuscita where id_statusCita=:id_statusCita";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_statusCita',$id_statusCita, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
    }
    ?>