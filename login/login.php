<?php
    include_once('../admin/sistema.controller.php');
    $sistema = new Sistema;
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    include('views/header.php');
    $mensaje='';
    switch($action){
        
        case 'validate':
            if(isset($_POST['enviar'])){
                $correo = $_POST['correo'];
                $contrasena= $_POST['contrasena'];
                if($sistema->ValidateEmail($correo)){
                   
                    if($sistema ->ValidateUser($correo,$contrasena)){
                        $roles= $sistema-> GetRoles($correo);
                        $id_usuario = $sistema ->getId_Usuario($correo);
                        $id_cliente = $sistema ->getId_cliente($id_usuario);
                        $statusCita = $sistema ->getId_status($id_cliente);
                        $_SESSION['validado']=true;
                        $_SESSION['roles']=$roles;
                        $_SESSION['correo']= $correo;
                        $_SESSION['id_usuario']= $id_usuario;
                        $_SESSION['id_cliente']=$id_cliente;
                        $_SESSION['statusCita']=$statusCita;
                        if(isset($_SESSION)){
                            if($_SESSION['roles'][0]=='cliente'){
                                if($_SESSION['statusCita']=='En proceso'){
                                    $mensaje= 'Su instalación está en proceso';
                                    include('views/login.php');
                                }else{
                                header('Location: ../admin/index_cliente.php');
                                }
                            }else{
                                header('Location: ../admin/index_administrador.php');
                            }
                        }
                        
                    }else{
                        $mensaje= 'usuario o contraseña incorrecto';
                        include('views/login.php'); 
                    }
                }
            }
            break;

            case 'forget':
                $mensaje= 'Ha salido del sistema.';
                include('views/forget_pass.php');
            break;

            case 'sendPass':
                $correo= $_POST['correo'];
                if($sistema->ValidateEmail($correo)){
                    $sistema->changePass($correo);
                    
                }
                break;
            case 'changePass':
            $correo = $_GET['correo'];
            $token= $_GET['token'];
            if($sistema->validateToken($correo,$token)){
                include('../Login/views/changePass.php');
            }else{
                header('Location: http://www.gmail.com');
            }
            break;
            case 'savePass':
                $correo = $_POST['correo'];
                $token = $_POST['token'];
                $contrasena = $_POST['contrasena'];
                if($sistema->resetPassword($correo,$token,$contrasena)){
                    echo 'La contraseña ha sido modificada correctamente';
                    include('../Login/views/login.php');   
                }else{
                    echo 'Ha ocurrido un error';
                    include('../Login/views/login.php');
    
                }
    
                break;

                case 'logout':
                    unset($_SESSION);
                    session_destroy();
                    $mensaje= 'Ha salido del sistema.';
                    include('views/login.php');
        
                break;
        default:
        include('views/login.php');   
    }
    
    include('views/footer.php');
?>
