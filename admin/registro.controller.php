<?php
    require_once('sistema.controller.php');

    class Registro extends Sistema{
        var $id_cliente;
        var $nombre;
        var $apaterno;
        var $amaterno;
        var $nacimiento;
        var $telefono;
        var $calle;
        var $numeroVivienda;
        var $descripcionVivienda;
        

        function setId_cliente($id){
            $this-> id_cliente = $id;
 
        }
        
        function setNombre($nombre){
         $this-> nombre = $nombre;
        }
        function getNombre(){
         return $this->nombre;
        }
        function setApaterno($apaterno){
         $this-> apaterno = $apaterno;
        }
        function getApaterno(){
            return $this->apaterno;
        }
        function setAmaterno($amaterno){
            $this-> amaterno = $amaterno;
           }
           function getAmaterno(){
            return $this->amaterno;
        }
        function setNacimiento($nacimiento){
            $this-> nacimiento = $nacimiento;
           }
           function getNacimiento(){
            return $this->nacimiento;
        }
        function setDireccion($direccion){
            $this-> direccion = $direccion;
        }
           function getDireccion(){
            return $this->direccion;
        }
        function setTelefono($telefono){
            $this-> telefono = $telefono;
        }
           function getTelefono(){
            return $this->telefono;
        }
        
        function setCalle($calle){
            $this-> calle = $calle;
        }
           function getCalle(){
               return $this->calle;
        }
        function setNumeroVivienda($numeroVivienda){
            $this-> numeroVivienda = $numeroVivienda;
        }
           function getNumeroVivienda(){
               return $this->numeroVivienda;
        }
        function setDescripcionVivienda($descripcionVivienda){
            $this-> descripcionVivienda = $descripcionVivienda;
        }
           function getDescripcionVivienda(){
               return $this->descripcionVivienda;
        }
        

        function create($nombre,$apaterno,$amaterno,$nacimiento,$telefono,$calle,$numeroVivienda,$descripcionVivienda,$diaYHoraPref,$correo,$contrasena,$id_colonia,$id_plan){
            $dbh = $this->Connect();
            $dbh-> beginTransaction();
            try{
            $foto = $this->guardarFotografia();
            $sentencia ="INSERT INTO usuario(correo,contrasena) VALUES(:correo,:contrasena)";
            $stmt = $dbh->prepare($sentencia);
            $stmt -> bindParam(':correo',$correo, PDO::PARAM_STR);
            $contrasena = md5($contrasena);
            $stmt -> bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
            $stmt -> execute();
    
            $sentencia = "SELECT * FROM usuario WHERE correo = :correo";
            $stmt = $dbh->prepare($sentencia);
            $stmt -> bindParam(':correo',$correo, PDO::PARAM_STR);
            $stmt -> execute();
            $rows = $stmt -> fetchAll();

            $id_usuario = $rows[0]['id_usuario'];
            if(is_numeric($id_usuario)){
                $sentencia = "INSERT INTO usuario_rol(id_usuario,id_rol) VALUE(:id_usuario, 2)";
                $stmt= $dbh -> prepare($sentencia);
                $stmt-> bindParam(':id_usuario',$id_usuario, PDO::PARAM_INT);
                $stmt -> execute(); 
                //print_r($id_doctor);
                if($foto)
            {
                $sentencia = "INSERT INTO cliente(nombre,apaterno,amaterno,nacimiento,telefono,calle,numeroVivienda,descripcionVivienda,fotografia,id_usuario,id_colonia,id_plan) 
                VALUES (:nombre,:apaterno,:amaterno,:nacimiento,:telefono,:calle,:numeroVivienda,:descripcionVivienda,:fotografia,:id_usuario,:id_colonia,:id_plan)";
                $stmt = $dbh->prepare($sentencia);
                $stmt->bindParam(':fotografia',$foto,PDO::PARAM_STR);
            }else
            {
                $sentencia = "INSERT INTO cliente(nombre,apaterno,amaterno,nacimiento,telefono,calle,numeroVivienda,descripcionVivienda,id_usuario,id_colonia,id_plan) 
                VALUES (:nombre,:apaterno,:amaterno,:nacimiento,:telefono,:calle,:numeroVivienda,:descripcionVivienda,:id_usuario,:id_colonia,:id_plan)";
                $stmt = $dbh->prepare($sentencia);
            }
            $stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apaterno',$apaterno, PDO::PARAM_STR);
            $stmt->bindParam(':amaterno',$amaterno, PDO::PARAM_STR);
            $stmt->bindParam(':nacimiento',$nacimiento, PDO::PARAM_STR);
            $stmt->bindParam(':telefono',$telefono, PDO::PARAM_INT);
            $stmt->bindParam(':calle',$calle, PDO::PARAM_STR);
            $stmt->bindParam(':numeroVivienda',$numeroVivienda, PDO::PARAM_INT);
            $stmt->bindParam(':descripcionVivienda',$descripcionVivienda, PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':id_colonia',$id_colonia, PDO::PARAM_INT);
            $stmt->bindParam(':id_plan',$id_plan, PDO::PARAM_INT);
            $stmt->execute();
            
            $sentencia = "SELECT * FROM cliente WHERE id_usuario = :id_usuario";
            $stmt = $dbh->prepare($sentencia);
            $stmt -> bindParam(':id_usuario',$id_usuario, PDO::PARAM_STR);
            $stmt -> execute();
            $rows = $stmt -> fetchAll();

            $id_cliente = $rows[0]['id_cliente'];
            $sentencia ="INSERT INTO cita(diaYHoraPref,id_cliente,id_statusCita) VALUES(:diaYHoraPref,:id_cliente,2)";
            $stmt = $dbh->prepare($sentencia);
            $stmt -> bindParam(':diaYHoraPref',$diaYHoraPref, PDO::PARAM_STR);
            $stmt -> bindParam(':id_cliente',$id_cliente, PDO::PARAM_INT);
            $stmt->execute();

            $sentencia ="INSERT INTO fichaPago(fechaLimite,id_cliente) VALUES('2021-07-15',:id_cliente)";
            $stmt = $dbh->prepare($sentencia);
            $stmt -> bindParam(':id_cliente',$id_cliente, PDO::PARAM_INT);
            $resultado = $stmt->execute();

            $dbh->commit();
            return $resultado;
                }
            }
            catch(Exception $e){
                echo 'Excepcion capturada: ', $e->getMessage(), "\n";
                $dbh -> rollBack();  
            }
                $dbh -> rollBack();
            }
            
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT * FROM cliente");
            $stmt = $dbh->prepare($sentencia);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }
        function readOne($id_cliente){
            $dbh = $this->Connect();
            $sentencia = "SELECT * FROM cliente where id_cliente= :id_cliente";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }

        function update($id_cliente,$nombre,$apaterno,$amaterno,$nacimiento,$telefono,$correo,$calle,$numeroVivienda,$descripcionVivienda,$id_usuario,$id_colonia,$id_plan){
            $dbh = $this->Connect();
            $sentencia="UPDATE cliente 
                            SET nombre=:nombre,
                                apaterno=:apaterno,
                                amaterno=:amaterno,
                                nacimiento=:nacimiento,
                                telefono=:telefono,
                                calle=:calle,
                                numeroVivienda=:numeroVivienda,
                                descripcionVivienda=:descripcionVivienda,
                                id_usuario=:id_usuario,
                                id_colonia=:id_colonia,
                                id_plan=:id_plan
                            where id_cliente=:id_cliente";
            $stmt = $dbh->prepare($sentencia); 
            $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apaterno',$apaterno, PDO::PARAM_STR);
            $stmt->bindParam(':amaterno',$amaterno, PDO::PARAM_STR);
            $stmt->bindParam(':nacimiento',$nacimiento, PDO::PARAM_STR);
            $stmt->bindParam(':telefono',$telefono, PDO::PARAM_INT);
            $stmt->bindParam(':calle',$calle, PDO::PARAM_STR);
            $stmt->bindParam(':numeroVivienda',$numeroVivienda, PDO::PARAM_STR);
            $stmt->bindParam(':descripcionVivienda',$descripcionVivienda, PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_STR);
            $stmt->bindParam(':id_colonia',$id_colonia, PDO::PARAM_STR);
            $stmt->bindParam(':id_plan',$id_plan, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
            
        }

        function delete($id_cliente){
            $dbh=$this->Connect();
            $sentencia = "delete FROM cliente where id_cliente=:id_cliente";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }

        function guardarFotografia()
    {
        $archivo= $_FILES['fotografia'];
        $tipos = array('image/jpge','image/png','image/gif');
        if($archivo['error']==0)
        {
            if(in_array($archivo['type'],$tipos))
            {
                if($archivo['size']<=2097152)
                {
                    $a= explode('/',$archivo['type']);
                    $nuevoNombre = md5(time()).'.'.$a[1];
                    if(move_uploaded_file($archivo['tmp_name'],'archivos/'.$nuevoNombre))
                    {
                    return $nuevoNombre;
                    }
                }
            }
         }
        return false;
    }
    }
?>