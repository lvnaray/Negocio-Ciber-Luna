<?php
    require('sistema.controller.php');

    class FichaPago extends Sistema{
        var $id_fichaPago;
        var $fechaLimite;
        var $id_cliente;
        
        function setId_fichaPago($id){
            $this-> id_fichaPago = $id;
 
        }
        function getId_fichaPago(){
         return $this->id_fichaPago;
        }
        function setFechaLimite($fechaLimite){
         $this-> fechaLimite = $fechaLimite;
        }
        function getFechaLimite(){
            return $this->fechaLimite;
        }

        function setId_cliente($id_cliente){
            $this-> id_cliente = $id_cliente;
        }
        
     

        function create($fechaLimite,$id_cliente){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO fichaPago(fechaLimite,id_cliente)
             VALUES (:fechaLimite,:id_cliente)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':fechaLimite',$fechaLimite, PDO::PARAM_STR);
            $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT *,concat(nombre,' ',apaterno,' ',amaterno) as nombre FROM fichaPago join cliente using(id_cliente)");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_fichaPago){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM fichaPago where id_fichaPago= :id_fichaPago";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_fichaPago',$id_fichaPago, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function readOneReport($id_cliente){
            $dbh = $this->Connect();
            $sentencia = "select concat(nombre,' ',apaterno,' ',amaterno) as nombre, calle, numeroVivienda, colonia, plan,precio,fechaLimite from cliente join colonia USING(id_colonia) join plan USING(id_plan) join fichapago using(id_cliente) where id_cliente=:id_cliente";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            return $resultado;
        }

        function update($id_fichaPago,$fechaLimite,$id_cliente){
            $dbh = $this->Connect();
            $sentencia="UPDATE fichaPago 
                            SET fechaLimite=:fechaLimite,
                                id_cliente=:id_cliente
                            where id_fichaPago=:id_fichaPago";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_fichaPago',$id_fichaPago, PDO::PARAM_STR);
            $stmt->bindParam(':fechaLimite',$fechaLimite, PDO::PARAM_STR);
            $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_fichaPago){
            $dbh=$this->Connect();
            $sentencia = "delete FROM fichaPago where id_fichaPago=:id_fichaPago";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_fichaPago',$id_fichaPago, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
    }
    ?>