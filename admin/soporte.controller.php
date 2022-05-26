<?php
    require_once('sistema.controller.php');

    class Soporte extends Sistema{
        var $id_soporte;
        var $descripProblem;
        var $diaYHoraPref;
        var $id_cliente;
        var $id_statusSoporte;
        
        function setId_soporte($id){
            $this-> id_soporte = $id;
 
        }
        function getId_soporte(){
         return $this->id_soporte;
        }
        function setDescripProblem($descripProblem){
         $this-> descripProblem = $descripProblem;
        }
        function getDescripProblem(){
         return $this->descripProblem;
        }
        function setDiaYHoraPref($diaYHoraPref){
         $this-> diaYHoraPref = $diaYHoraPref;
        }
        function getDiaYHoraPref(){
            return $this->DiaYHoraPref;
        }
        
        function setId_statusSoporte($id_statusSoporte){
            $this-> id_statusSoporte = $id_statusSoporte;
           }
           function getId_statusSoporte(){
            return $this->id_statusSoporte;
        }
     

        function create($descripProblem,$diaYHoraPref,$id_cliente,$id_statusSoporte){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO soporte(descripProblem,diaYHoraPref,id_cliente,id_statusSoporte)
             VALUES (:descripProblem,:diaYHoraPref,:id_cliente,:id_statusSoporte)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':descripProblem',$descripProblem, PDO::PARAM_STR);
            $stmt->bindParam(':diaYHoraPref',$diaYHoraPref, PDO::PARAM_STR);
            $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(':id_statusSoporte',$id_statusSoporte, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT *,concat(nombre,' ',apaterno,' ',amaterno) as nombre FROM soporte join cliente using(id_cliente)");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_soporte){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM soporte where id_soporte= :id_soporte";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_soporte',$id_soporte, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_soporte,$descripProblem,$diaYHoraPref,$id_cliente,$id_statusSoporte){
            $dbh = $this->Connect();
            $sentencia="UPDATE soporte 
                            SET descripProblem=:descripProblem,
                                diaYHoraPref=:diaYHoraPref,
                                id_cliente=:id_cliente,
                                id_statusSoporte=:id_statusSoporte
                            where id_soporte=:id_soporte";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_soporte',$id_soporte, PDO::PARAM_STR);
            $stmt->bindParam(':descripProblem',$descripProblem, PDO::PARAM_STR);
            $stmt->bindParam(':diaYHoraPref',$diaYHoraPref, PDO::PARAM_STR);
            $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(':id_statusSoporte',$id_statusSoporte, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_soporte){
            $dbh=$this->Connect();
            $sentencia = "delete FROM soporte where id_soporte=:id_soporte";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_soporte',$id_soporte, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }

     
    }
?>