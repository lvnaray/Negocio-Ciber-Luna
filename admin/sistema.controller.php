<?php   
        session_start();
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        require '../vendor/autoload.php';
        class Sistema{
            var $dsn= 'mysql:host=localhost;dbname=proyecto';
            var $user = 'proyecto';
            var $pass= '12345';

            function Connect(){
                $dbh = new PDO($this->dsn,$this->user,$this->pass);
                return $dbh;
            }

            /*validar usuario*/
            function validateUser($correo, $contrasena){
                $contrasena=md5($contrasena);
                $dbh= $this-> connect();
                $query = "SELECT * FROM usuario where correo = :correo and contrasena = :contrasena";
                $stmt = $dbh->prepare($query);
                $stmt->bindParam(':correo',$correo, PDO::PARAM_STR);
                $stmt->bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
                $stmt->execute();
                $rows = $stmt->fetchAll();
               return isset($rows[0]['correo'])? true: false;

            }
            function ValidateEmail($correo){
                return (false !== filter_var($correo, FILTER_VALIDATE_EMAIL));
            }

            function GetRoles($correo){
                $dbh= $this-> connect();
                $query = "SELECT r.id_rol,r.rol FROM usuario u 
                join usuario_rol ur on u.id_usuario = ur.id_usuario 
                join rol r on ur.id_rol = r.id_rol where u.correo=:correo";
                $stmt = $dbh->prepare($query);
                $stmt->bindParam(':correo',$correo, PDO::PARAM_STR);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $roles = array();
                foreach($rows as $key =>$value):
                    array_push($roles,$value['rol']);
                endforeach;
                return $roles;
            }

            function getId_Usuario($correo){
                $dbh = $this ->Connect();
                $sentencia = "SELECT id_usuario FROM usuario WHERE correo= :correo";
                $stmt = $dbh -> prepare($sentencia);
                $stmt -> bindParam(':correo',$correo,PDO::PARAM_STR);
                $stmt -> execute();
                $dato = $stmt -> fetchAll();
                if(isset($dato[0]['id_usuario'])){
                    return $dato[0]['id_usuario'];
                }else{
                    return null;
                }
            }

            function getId_cliente($id_usuario){
                $dbh = $this ->Connect();
                $sentencia = "SELECT id_cliente FROM cliente join usuario using (id_usuario) WHERE id_usuario= :id_usuario";
                $stmt = $dbh -> prepare($sentencia);
                $stmt -> bindParam(':id_usuario',$id_usuario,PDO::PARAM_STR);
                $stmt -> execute();
                $dato = $stmt -> fetchAll();
                if(isset($dato[0]['id_cliente'])){
                    return $dato[0]['id_cliente'];
                }else{
                    return null;
                }
            }

            function getId_status($id_cliente){
                $dbh = $this ->Connect();
                $sentencia = "SELECT statusCita FROM cliente join cita using(id_cliente) join statuscita USING(id_statusCita)WHERE id_cliente=:id_cliente";
                $stmt = $dbh -> prepare($sentencia);
                $stmt -> bindParam(':id_cliente',$id_cliente,PDO::PARAM_STR);
                $stmt -> execute();
                $dato = $stmt -> fetchAll();
                if(isset($dato[0]['statusCita'])){
                    return $dato[0]['statusCita'];
                }else{
                    return null;
                }
            }

            function verificarRoles($rol)
            {
                $this->verificarSesion();
                $roles = $_SESSION['roles'];
                if(!in_array($rol,$roles)){
                echo 'Rol no adecuado';
                include('../login/views/header.php');
                include('../login/login.php');
                include('../login/views/footer.php');
                die();
                
                }

            }

            function validarRoles($rol){
                $this->verificarSesion();
                $roles = $_SESSION['roles'];
                if(in_array($rol,$roles)){
                return true;
            }
            return false; 
            }

            function verificarSesion(){
                if(!isset($_SESSION['validado'])){
                    header('Location: http://localhost/proyecto1/login/login.php');
                    die();
                }
            }

            function changePass($correo){
                $id_usuario=$this->getId_Usuario($correo);
                if(!is_null($id_usuario)){
    
                    $token= substr(crypt(sha1(hash('sha512',md5(rand(1,9999)).$id_usuario)),'cruz azul campeon'),1,10);
                    $dbh = $this ->Connect();
                    $sentencia = "UPDATE usuario SET token = :token WHERE id_usuario= :id_usuario";
                    $stmt = $dbh -> prepare($sentencia);
                    $stmt -> bindParam(':token',$token,PDO::PARAM_STR);
                    $stmt -> bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
                    $stmt -> execute();
                    echo 'un correo llegará a su correo electronico';
    
                    require '/xampp/htdocs/proyecto1/vendor/autoload.php';
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPDebug = SMTP::DEBUG_OFF;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->SMTPAuth = true;
                    $mail->Username = '18031084@itcelaya.edu.mx';
                    $mail->Password = 'Lunettoo89';
                    $mail->setFrom('18031084@itcelaya.edu.mx', 'WISH LUNA');
                    $mail->addReplyTo('18031084@itcelaya.edu.mx', 'WISH LUNA');
                    $mail->addAddress($correo,$correo);
                    $mail->Subject = 'Recuperacion de contraseña de WISH LUNA';
                    $cuerpo= "Estimado usuario por favor presione la siguiente liga para cambiar de contraseña:<br><a href='http://localhost/proyecto1/login/login.php?action=changePass&correo=".$correo."&token=".$token."'>Recuperar Contrasena</a>";
                    $mail->msgHTML($cuerpo);
                    $mail->AltBody = 'Mensaje alternativo';
                    if (!$mail->send()) {
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        echo 'Message sent!';
                    }
    
                }
            }

            function validateToken($correo, $token)
            {
                $dbh= $this-> connect();
                if(!is_null($token)){
                $query = "SELECT * FROM usuario where correo = :correo and token = :token";
                $stmt = $dbh->prepare($query);
                $stmt->bindParam(':correo',$correo, PDO::PARAM_STR);
                $stmt->bindParam(':token',$token, PDO::PARAM_STR);
                $stmt->execute();
                $rows = $stmt->fetchAll();
               return isset($rows[0]['correo'])? true: false;
                }
                
            }

            function resetPassword($correo,$token,$contrasena){
                if($this->ValidateEmail($correo)){
                    if($this ->validateToken($correo,$token)){
                        $dbh= $this-> connect();
                        if(!is_null($token)){
                            $contrasena= md5($contrasena);
                            $query = "UPDATE usuario SET contrasena =:contrasena, token =null WHERE correo=:correo";
                            $stmt = $dbh->prepare($query);
                            $stmt->bindParam(':correo',$correo, PDO::PARAM_STR);
                            $stmt->bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
                            $rows=$stmt->execute();
                            if($rows){
                                return true;
                            }
                            return false;
                           return isset($rows[0]['correo'])? true: false;
                            }

                    }
                }
                return false;

            }

            function printJSON($info){
                $info= json_encode($info,true);
                echo $info;
                header('Content-Type: application/json');
                die();
    
    
              }

        }
    //$sistema = new Sistema();
    //$resultado = $sistema -> validateUser('lvnaray@gmail.com','123');
    //print_r($resultado);
?>