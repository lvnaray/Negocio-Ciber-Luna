<?php
    require_once('sistema.controller.php');

    class Cliente extends Sistema{
        var $id_cliente;
        var $nombre;
        var $apaterno;
        var $amaterno;
        var $nacimiento;
        var $telefono;
        var $calle;
        var $numeroVivienda;
        var $descripcionVivienda;
        var $id_usuario;
        var $id_colonia;
        var $id_plan;
        

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
        function setId_usuario($id_usuario){
            $this-> id_usuario = $id_usuario;
        }
         
        function setId_colonia($id_colonia){
            $this-> id_colonia = $id_colonia;
        }
           function getId_colonia(){
               return $this->id_colonia;
        }
        function setId_plan($id_plan){
            $this-> id_plan = $id_plan;
        }
           function getId_plan(){
               return $this->id_plan;
        }
     

        function create($nombre,$apaterno,$amaterno,$nacimiento,$telefono,$calle,$numeroVivienda,$descripcionVivienda,$id_usuario,$id_colonia,$id_plan){
            $dbh = $this->Connect();
            $foto=$this->guardarfotografia();
            if($foto){
                $sentencia = "INSERT INTO cliente(nombre,apaterno,amaterno,nacimiento,telefono,calle,numeroVivienda,descripcionVivienda,fotografia,id_usuario,id_colonia,id_plan)
             VALUES (:nombre,:apaterno,:amaterno,:nacimiento,:telefono,:calle,:numeroVivienda,:descripcionVivienda,:fotografia,:id_usuario,:id_colonia,:id_plan)";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':fotografia',$foto, PDO::PARAM_STR);
            }else{
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
            $stmt->bindParam(':numeroVivienda',$numeroVivienda, PDO::PARAM_STR);
            $stmt->bindParam(':descripcionVivienda',$descripcionVivienda, PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':id_colonia',$id_colonia, PDO::PARAM_INT);
            $stmt->bindParam(':id_plan',$id_plan, PDO::PARAM_INT);
            $resultado = $stmt->execute();
            return $resultado;
        }
        function read(){
            $dbh = $this->Connect();
            $sentencia = ("SELECT * FROM cliente join usuario using(id_usuario) join plan using(id_plan) join colonia using(id_colonia)");
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

        function update($id_cliente,$nombre,$apaterno,$amaterno,$nacimiento,$telefono,$calle,$numeroVivienda,$descripcionVivienda,$id_usuario,$id_colonia,$id_plan){
            $dbh = $this->Connect();
            $foto=$this->guardarfotografia();
            if($foto){
                $sentencia="UPDATE cliente 
                            SET nombre=:nombre,
                                apaterno=:apaterno,
                                amaterno=:amaterno,
                                nacimiento=:nacimiento,
                                telefono=:telefono,
                                calle=:calle,
                                numeroVivienda=:numeroVivienda,
                                descripcionVivienda=:descripcionVivienda,
                                fotografia=:fotografia,
                                id_usuario=:id_usuario,
                                id_colonia=:id_colonia,
                                id_plan=:id_plan
                            where id_cliente=:id_cliente";
            $stmt = $dbh->prepare($sentencia);
            $stmt->bindParam(':fotografia',$foto, PDO::PARAM_STR);
            }else{
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

            }
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


    /*
            Este metodo nos sirve para crear un paciente JSON
            Parámetros String @nombre recibe el nombre del paciente
                    String @apaterno recibe el apellido paterno del paciente
                    String @amaterno recibe el apellido materno del paciente
                    String @nacimiento recibe la fecha de nacimiento del pacinte
                    String @domicilio recibe la direccion donde vive el paciente
            Returns integer de los registros afectados           
                    
            */
            function insert($data){
                $cliente = json_decode($data, true);
                $dbh=$this->Connect();
                $dbh-> beginTransaction();
                $info = array();
                try{
                    $sentencia ="INSERT INTO usuario(correo,contrasena) VALUES(:correo,:contrasena)";
                    $stmt = $dbh->prepare($sentencia);
                    $contrasena= md5($cliente['contrasena']);
                    $stmt -> bindParam(':correo',$cliente['correo'], PDO::PARAM_STR);
                    $stmt -> bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
                    $resultado= $stmt -> execute();
                    
                    $sentencia = "SELECT * FROM usuario WHERE correo = :correo";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt -> bindParam(':correo',$cliente['correo'], PDO::PARAM_STR);
                    $stmt -> execute();
                    $rows = $stmt -> fetchAll();
                    $id_usuario = $rows[0]['id_usuario'];
    
                if(is_numeric($id_usuario)){
                    $sentencia = "INSERT INTO usuario_rol(id_usuario,id_rol) VALUE(:id_usuario, 2)";
                    $stmt= $dbh -> prepare($sentencia);
                    $stmt-> bindParam(':id_usuario',$id_usuario, PDO::PARAM_INT);
                    $resultado= $stmt -> execute(); 
                
                    $sentencia = "INSERT INTO cliente(nombre,apaterno,amaterno,nacimiento,telefono,calle,numeroVivienda,descripcionVivienda,id_usuario,id_colonia,id_plan) 
                    VALUES (:nombre,:apaterno,:amaterno,:nacimiento,:telefono,:calle,:numeroVivienda,:descripcionVivienda,:id_usuario,:id_colonia,:id_plan)";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt->bindParam(':nombre',$cliente['nombre'], PDO::PARAM_STR);
                    $stmt->bindParam(':apaterno',$cliente['apaterno'], PDO::PARAM_STR);
                    $stmt->bindParam(':amaterno',$cliente['amaterno'], PDO::PARAM_STR);
                    $stmt->bindParam(':nacimiento',$cliente['nacimiento'], PDO::PARAM_STR);
                    $stmt->bindParam(':telefono',$cliente['telefono'], PDO::PARAM_INT);
                    $stmt->bindParam(':calle',$cliente['calle'], PDO::PARAM_STR);
                    $stmt->bindParam(':numeroVivienda',$cliente['numeroVivienda'], PDO::PARAM_INT);
                    $stmt->bindParam(':descripcionVivienda',$cliente['descripcionVivienda'], PDO::PARAM_STR);
                    $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_INT);
                    $stmt->bindParam(':id_colonia',$cliente['id_colonia'], PDO::PARAM_INT);
                    $stmt->bindParam(':id_plan',$cliente['id_plan'], PDO::PARAM_INT);
                    $resultado=$stmt -> execute();
                    
                    
                
                    if($resultado){
                        $sentencia = "SELECT * FROM cliente WHERE id_usuario = :id_usuario";
                        $stmt = $dbh->prepare($sentencia);
                        $stmt -> bindParam(':id_usuario',$id_usuario, PDO::PARAM_STR);
                        $stmt -> execute();
                        $rows = $stmt -> fetchAll();

                        $id_cliente = $rows[0]['id_cliente'];
                        
                        $sentencia ="INSERT INTO cita(diaYHoraPref,id_cliente,id_statusCita) VALUES(:diaYHoraPref,:id_cliente,2)";
                        $stmt = $dbh->prepare($sentencia);
                        $stmt -> bindParam(':diaYHoraPref',$cliente['diaYHoraPref'], PDO::PARAM_STR);
                        $stmt -> bindParam(':id_cliente',$id_cliente, PDO::PARAM_INT);
                        $stmt->execute();

                        $sentencia ="INSERT INTO fichaPago(fechaLimite,id_cliente) VALUES('2021-07-15',:id_cliente)";
                        $stmt = $dbh->prepare($sentencia);
                        $stmt -> bindParam(':id_cliente',$id_cliente, PDO::PARAM_INT);
                        $resultado = $stmt->execute();
                    
                    }
                        $dbh->commit();
                        
                        $info['status']=200;
                        $info['message']='cliente dado de alta';
                        $this->printJSON($info);
                    
                    }
                }
                catch(Exception $e){
                    echo 'Excepcion capturada: ', $e->getMessage(), "\n";
                    $dbh -> rollBack();
                    $info['status']=403;
                    $info['message']='Error al dar de alta el cliente';
                    $this->printJSON($info);  
                }
                    $dbh -> rollBack();
                    $info['status']=403;
                    $info['message']='Error al dar de alta el cliente';
                    $this->printJSON($info);
                }
    
                    /*
                Este metodo nos sirve para poder obtener uno solo paciente por JSON
                params int @id_paciente ID del paciente
                Returns Array
                
                */
                function exportarOne($id_cliente) {
    
                    $dbh = $this->connect();
                    $sentencia = "SELECT u.correo, u.contrasena, p.nombre, p.apaterno, p.amaterno, p.nacimiento, p.calle, p.numeroVivienda, p.descripcionVivienda
                                FROM cliente p JOIN usuario u ON u.id_usuario = p.id_usuario 
                                WHERE p.id_cliente = :id_cliente";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                    $stmt->execute();
                    
                    $resultado = array();
                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $key => $cliente) {
                        array_push($resultado, $cliente);
                    }
    
                    $this->printJSON($resultado);
                }
                /*
                Este metodo nos sirve para poder obtener los pacientes
                Returns Array
                
                */   
                function exportar() {
    
                    $dbh = $this->connect();
                    $sentencia = "SELECT p.id_cliente, u.correo, p.nombre, p.apaterno, p.amaterno, p.nacimiento,  p.calle, p.numeroVivienda, p.descripcionVivienda
                                FROM cliente p JOIN usuario u ON u.id_usuario = p.id_usuario ORDER BY apaterno, amaterno, nombre";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt->execute();
                    
                    $resultado = array();
                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $key => $cliente) {
                        array_push($resultado, $cliente);
                    }
    
                    $this->printJSON($resultado);
                }
    
                function deleteJson($id_cliente){
                    $dbh = $this->connect();
    
                    try{
                        $dbh-> beginTransaction();
                        /*eliminar cita y ficha de pago*/

                    $sentencia = "select id_usuario from cliente where id_cliente=:id_cliente";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                    $stmt->execute();
                        $fila = $stmt->fetchAll();

                        if (empty($fila)) {
                            $id_usuario = 0;
                        }else{
                            $id_usuario = $fila[0]['id_usuario'];
                        }


                    $sentencia = "delete from fichaPago where id_cliente=:id_cliente";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                    $stmt->execute();

                    $sentencia = "delete from cita where id_cliente=:id_cliente";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                    $stmt->execute();

    
                    $sentencia = "delete from cliente where id_cliente=:id_cliente";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                    $stmt->execute();

                    $sentencia = "delete from usuario_rol where id_usuario=:id_usuario";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $stmt->execute();

                    $sentencia = "delete from usuario where id_usuario=:id_usuario";
                    $stmt = $dbh->prepare($sentencia);
                    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $stmt->execute();

                    $dbh->commit();
                    $info['status']=200;
                    $info['message']='cliente borrado';
                    $this->printJSON($info);
    
                    }
                    catch(Exception $e){
                        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
                        $dbh -> rollBack();
                        $info['status']=403;
                        $info['message']='Error al borrar paciente';
                        $this->printJSON($info);  
                    }
                        $dbh -> rollBack();
                        $info['status']=403;
                        $info['message']='Error al borrar paciente';
                        $this->printJSON($info);
    
    
                }
                
                /*
                Metodo para actualizar pacientes por JSON
                Params int @id_paciente
                        String @nombre recibe el nombre del paciente
                        String @apaterno recibe el apellido paterno del paciente
                        String @amaterno recibe el apellido materno del paciente
                        String @nacimiento recibe la fecha de nacimiento del pacinte
                        String @domicilio recibe la direccion donde vive el paciente
                Returns  integer       
                */
                function updateJson($data,$id_cliente)
                {
                    $dbh=$this->connect();
                    $info=array();
                    try
                    {
                        $cliente = json_decode($data, true);
                        $dbh->beginTransaction();

                        $sentencia = "UPDATE usuario set correo=:correo,contrasena=:contrasena where correo=:correo";
                        $stmt = $dbh->prepare($sentencia);
                        $contrasena= md5($cliente['contrasena']);
                        $stmt->bindParam(':correo', $cliente['correo'], PDO::PARAM_STR);
                        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                        $stmt->execute();

                        $sentencia = "SELECT * FROM usuario WHERE correo = :correo";
                        $stmt = $dbh->prepare($sentencia);
                        $stmt -> bindParam(':correo',$cliente['correo'], PDO::PARAM_STR);
                        $stmt -> execute();
                        $rows = $stmt -> fetchAll();
                        $id_usuario = $rows[0]['id_usuario'];
                        

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
                        $stmt->bindParam(':nombre', $cliente['nombre'], PDO::PARAM_STR);
                        $stmt->bindParam(':apaterno', $cliente['apaterno'], PDO::PARAM_STR);
                        $stmt->bindParam(':amaterno', $cliente['amaterno'], PDO::PARAM_STR);
                        $stmt->bindParam(':nacimiento', $cliente['nacimiento'], PDO::PARAM_STR);
                        $stmt->bindParam(':telefono', $cliente['telefono'], PDO::PARAM_STR);
                        $stmt->bindParam(':calle', $cliente['calle'], PDO::PARAM_STR);
                        $stmt->bindParam(':numeroVivienda', $cliente['numeroVivienda'], PDO::PARAM_STR);
                        $stmt->bindParam(':descripcionVivienda', $cliente['descripcionVivienda'], PDO::PARAM_STR);
                        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
                        $stmt->bindParam(':id_colonia', $cliente['id_colonia'], PDO::PARAM_STR);
                        $stmt->bindParam(':id_plan', $cliente['id_plan'], PDO::PARAM_STR);
                        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                        $stmt->execute();
                        
                        $sentencia ="UPDATE cita set diaYHoraPref=:diaYHoraPref where id_cliente=:id_cliente";
                        $stmt = $dbh->prepare($sentencia);
                        $stmt -> bindParam(':diaYHoraPref',$cliente['diaYHoraPref'], PDO::PARAM_STR);
                        $stmt -> bindParam(':id_cliente',$id_cliente, PDO::PARAM_INT);
                        $stmt->execute();


                        $dbh->commit();
                        $info['status']=200;
                        $info['message']='cliente Actualizado';
                        $this->printJSON($info);
                    }
                    catch(Exception $sauf)
                    {
                        echo("Cancelado");
                        $dbh->rollBack();
                        $info['status']=403;
                        $info['message']='Error al actualizar';
                        $this->printJSON($info);
                    }
                    $dbh->rollBack();
                    $info['status']=403;
                    $info['message']='Error al actualizar';
                    $this->printJSON($info);
                }
    
    }
?>