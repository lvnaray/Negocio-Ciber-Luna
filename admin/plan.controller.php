<?php
    require_once('sistema.controller.php');

    class Plan extends Sistema{
        var $id_plan;
        var $plan;
        var $precio;
        var $referencias;
        

        function setId_plan($id){
            $this-> id_plan = $id;
 
        }
        function getId_plan(){
         return $this->id_usuario;
        }
        function setPlan($plan){
         $this-> plan = $plan;
        }
        function getPlan(){
         return $this->username;
        }
        function setPrecio($precio){
         $this-> precio = $precio;
        }
        function getPrecio(){
            return $this->precio;
        }
        function setReferencias($referencias){
            $this-> referencias = $referencias;
           }
           function getReferencias(){
               return $this->referencias;
           }
     

        function create($plan,$precio,$referencias){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO plan(plan,precio,referencias) VALUES (:plan,:precio,:referencias)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':plan',$plan, PDO::PARAM_STR);
            $stmt->bindParam(':precio',$precio, PDO::PARAM_INT);
            $stmt->bindParam(':referencias',$referencias, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT * FROM plan");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_plan){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM plan where id_plan= :id_plan";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_plan',$id_plan, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_plan, $plan, $precio,$referencias){
            $dbh = $this->Connect();
            $sentencia="UPDATE plan 
                            SET plan=:plan,
                                precio=:precio,
                                referencias=:referencias 
                            where id_plan=:id_plan";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_plan',$id_plan, PDO::PARAM_STR);
            $stmt->bindParam(':plan',$plan, PDO::PARAM_STR);
            $stmt->bindParam(':precio',$precio, PDO::PARAM_INT);
            $stmt->bindParam(':referencias',$referencias, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_plan){
            $dbh=$this->Connect();
            $sentencia = "delete FROM plan where id_plan=:id_plan";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_plan',$id_plan, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }

     
    }
?>