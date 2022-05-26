<?php
    require('sistema.controller.php');

    class QuejaSug extends Sistema{
        var $id_quejaSu;
        var $correo;
        var $comentario;
        

        function setId_quejaSu($id){
            $this-> quejaSug = $id;
 
        }
        function getId_quejaSu(){
         return $this->id_quejaSu;
        }
        function setCorreo($correo){
         $this-> correo = $correo;
        }
        function getCorreo(){
         return $this->correo;
        }
        function setComentario($comentario){
         $this-> comentario = $comentario;
        }
        function getComentario(){
            return $this->comentario;
        }
     

        function create($correo,$comentario){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO quejasug(correo,comentario) VALUES (:correo,:comentario)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':correo',$correo, PDO::PARAM_STR);
            $stmt->bindParam(':comentario',$comentario, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT * FROM quejasug");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_quejaSu){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM quejasug where id_quejaSu= :id_quejaSu";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_quejaSu',$id_quejaSu, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_quejaSu, $correo, $comentario){
            $dbh = $this->Connect();
            $sentencia="UPDATE quejasug 
                            SET correo=:correo,
                                comentario=:comentario 
                            where id_quejaSu=:id_quejaSu";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_quejaSu',$id_quejaSu, PDO::PARAM_STR);
            $stmt->bindParam(':correo',$correo, PDO::PARAM_STR);
            $stmt->bindParam(':comentario',$comentario, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_quejaSu){
            $dbh=$this->Connect();
            $sentencia = "delete FROM quejasug where id_quejaSu=:id_quejaSu";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_quejaSu',$id_quejaSu, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }

     
    }
?>