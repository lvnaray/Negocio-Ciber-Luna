<?php
    require_once('sistema.controller.php');

    class Rol extends Sistema{
        var $id_rol;
        var $rol;
        
        function setId_rol($id){
            $this-> id_rol = $id;
 
        }
        function getId_rol(){
         return $this->id_rol;
        }
        function setRol($rol){
         $this-> rol = $rol;
        }
        function getRol(){
            return $this->rol;
        }


        function create($rol){
            $dbh = $this->Connect();
            $sentencia = "INSERT INTO rol(rol)
             VALUES (:rol)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':rol',$rol, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT * FROM rol");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_rol){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM rol where id_rol= :id_rol";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_rol',$id_rol, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_rol,$rol){
            $dbh = $this->Connect();
            $sentencia="UPDATE rol 
                            SET rol=:rol
                            where id_rol=:id_rol";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_rol',$id_rol, PDO::PARAM_STR);
            $stmt->bindParam(':rol',$rol, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_rol){
            $dbh=$this->Connect();
            $sentencia = "delete FROM rol where id_rol=:id_rol";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_rol',$id_rol, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }

        /*
        * Método para obtener los roles de un usuario
        * Params Integer @id recibe el id del usuario
        * Return Arreglo con los roles de un usuario
        */
        function getRolesUser($id){
            $dbh = $this ->Connect();
            $query = "SELECT r.rol, r.id_rol FROM usuario u 
                            JOIN usuario_rol ur ON u.id_usuario = ur.id_usuario 
                            JOIN rol r ON ur.id_rol = r.id_rol 
                      WHERE u.id_usuario = :id_usuario";
            $stmt = $dbh ->prepare($query);
            $stmt -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
            $stmt -> execute();
            $filas=$stmt->fetchAll();
            return $filas;
        }

       /*
        * Método para obtener los roles disponibles de un usuario
        * Params Integer @id recibe el id del usuario
        * Return Arreglo con los roles disponibles de un usuario
        */
        function getRolesUserAvailable($id){
            $dbh = $this ->Connect();
            $query = "SELECT id_rol, rol FROM rol 
                      WHERE id_rol NOT IN(SELECT r.id_rol FROM usuario u 
                                            JOIN usuario_rol ur ON u.id_usuario = ur.id_usuario 
                                            JOIN rol r ON ur.id_rol = r.id_rol 
                                          WHERE ur.id_usuario = :id_usuario)";
            $stmt = $dbh ->prepare($query);
            $stmt -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
            $stmt -> execute();
            $fila = $stmt -> fetchAll();
            return $fila;
        }

       /*
        * Método para asignar un rol a un usuario
        * Params Integer @id_usuario recibe el id del usuario
        * Params Integer @id_rol recibe el id del rol
        * Return Integer con los registros afectados
        */
        function assignRol($id_usuario, $id_rol){
            $dbh = $this -> Connect();
            $sentencia = 'INSERT INTO usuario_rol(id_usuario, id_rol) VALUES(:id_usuario, :id_rol)';
            $stmt = $dbh -> prepare($sentencia);
            $stmt -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $stmt -> bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
            $resultado = $stmt -> execute();
            return $resultado;
        }

       /*
        * Método para eliminar un rol de un usuario
        * Params Integer @id_usuario recibe el id del usuario
        * Params Integer @id_rol recibe el id del rol
        * Return Integer con los registros afectados
        */
        function deleteRol($id_usuario, $id_rol){
            $dbh = $this -> Connect();
            $sentencia = 'DELETE FROM usuario_rol WHERE id_usuario = :id_usuario AND id_rol = :id_rol';
            $stmt = $dbh -> prepare($sentencia);
            $stmt -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $stmt -> bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
            $resultado = $stmt -> execute();
            return $resultado;
        }

    }
    ?>