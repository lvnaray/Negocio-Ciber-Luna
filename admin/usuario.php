<?php   
    include('usuario.controller.php');
    include('rol.controller.php');
    $sistema = new Sistema;
    $sistema -> verificarRoles('Administrador');
    $usuarios = new Usuario;
    $rol = new Rol;
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    include('views/header.php');

    switch($action)
    {
        case 'rol':
            $id_usuario = $_GET['id_usuario'];
            $roles = $rol -> getRolesUserAvailable($id_usuario);
            include('views/asignar_roles/form.php');
            break;

        case 'no_rol':
            $id_usuario = $_GET['id_usuario'];
            $roles = $rol -> getRolesUser($id_usuario);
            include('views/asignar_roles/form.php');
            break;
        case 'assign_rol':
            $rol_user = $_POST['rol'];
            $resultado = $rol -> assignRol($rol_user['id_usuario'], $rol_user['id_rol']);
            $datos = $usuarios -> read();
            include('views/usuario/index.php');
            break;

        case 'delete_rol':
            $rol_user = $_POST['rol'];
            $resultado = $rol -> deleteRol($rol_user['id_usuario'], $rol_user['id_rol']);
            $datos = $usuarios -> read();
            include('views/usuario/index.php');
            break;

        case 'create':
            include('views/usuario/form.php');
            break;
        case 'save':
            $usuario = $_POST['usuario'];
            $resultado = $usuarios -> create($usuario['correo'], $usuario['contrasena']);
            $datos = $usuarios -> read();
            include('views/usuario/index.php');
            break;
        case 'delete':
            $id_usuario = $_GET['id_usuario'];
            $resultado = $usuarios -> delete($id_usuario);
            $datos = $usuarios -> read();
            include('views/usuario/index.php');
            break;
        case 'show':
            $id_usuario = $_GET['id_usuario'];
            $datos = $usuarios -> readOne($id_usuario);
            include('views/usuario/form.php');
            break;
        case 'update':
            $usuario = $_POST['usuario'];
            $resultado=$usuarios -> update($usuario['correo'], $usuario['id_usuario']);
            $datos = $usuarios -> read();
            include('views/usuario/index.php');
            break;
        default:
            $datos = $usuarios->read();
            include('views/usuario/index.php');
    }
    include('views/footer.php');
?>