<?php
    require_once('sistema.controller.php');

    class Cita extends Sistema{
        var $id_cita;
        var $diaYHoraPref;
        var $id_cliente;
        var $id_statusCita;
        
        
        function setId_cita($id){
            $this-> id_cita = $id;
 
        }
        function getId_cita(){
         return $this->id_cita;
        }
        function setDiaYHoraPref($diaYHoraPref){
         $this-> diaYHoraPref = $diaYHoraPref;
        }
        function getDiaYHoraPref(){
            return $this->diaYHoraPref;
        }
        
          
        function setId_statusCita($id_statusCita){
            $this-> id_statusCita = $id_statusCita;
           }
           function getId_statusCita(){
            return $this->Id_statusCita;
        }
     

        function create($diaYHoraPref,$id_cliente,$id_statusCita){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO cita(diaYHoraPref,id_cliente,id_statusCita)
             VALUES (:diaYHoraPref,:id_cliente,:id_statusCita)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':diaYHoraPref',$diaYHoraPref, PDO::PARAM_STR);
            $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(':id_statusCita',$id_statusCita, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT *, concat(nombre,' ',apaterno,' ',amaterno) as nombre FROM cita join cliente using(id_cliente) join statusCita using(id_statusCita)");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_cita){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM cita where id_cita= :id_cita";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_cita',$id_cita, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_cita,$diaYHoraPref,$id_cliente,$id_statusCita){
            $dbh = $this->Connect();
            $sentencia="UPDATE cita 
                            SET diaYHoraPref=:diaYHoraPref,
                                id_cliente=:id_cliente,
                                id_statusCita=:id_statusCita
                            where id_cita=:id_cita";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_cita',$id_cita, PDO::PARAM_STR);
            $stmt->bindParam(':diaYHoraPref',$diaYHoraPref, PDO::PARAM_STR);
            $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(':id_statusCita',$id_statusCita, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_cita){
            $dbh=$this->Connect();
            $sentencia = "delete FROM cita where id_cita=:id_cita";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_cita',$id_cita, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }

     
    }
?>