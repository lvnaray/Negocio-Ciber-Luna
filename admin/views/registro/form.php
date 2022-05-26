<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registro de cliente</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">REGISTRO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="../img/logo.jpg" alt="logo" width="40" height="40"> <!-- me quedé aquí -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="text-center" style="color: indianred;">
        <img src="../img/logo.jpg" alt="imagenLogo" width="100" height="100">
        <h6>Conectando lo importante</h6>
        <h3>LLENA LA INFORMACIÓN CORRESPONDIENTE A SU CITA, GRACIAS :)</h3>
    </div>
    <div class="modal-dialog text-center">
        <div class="col-sm-12 main-section">
            <div class="modal-content">
                <div class="d-flex flex-column align-items-center">
                    <div class="w-100 p-3 text-center" style="background-color: #eee;font-size: 23px;">
                        <form action="registro.php?action=<?php echo (isset($datos)) ? 'update' : 'save'; ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-user"></i> Nombre</label>
                                <input type="text" name="cliente[nombre]" value="<?php echo (isset($datos[0]['nombre'])) ? $datos[0]['nombre'] : ''; ?>" class="form-control" id="nombre" placeholder="nombre">
                            </div>
                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-user"></i> Apellido paterno</label>
                                <input type="text" name="cliente[apaterno]" value="<?php echo (isset($datos[0]['apaterno'])) ? $datos[0]['apaterno'] : ''; ?>" class="form-control" id="apaterno" placeholder="apaterno">
                            </div>
                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-user"></i> Apellido materno</label>
                                <input type="text" name="cliente[amaterno]" value="<?php echo (isset($datos[0]['amaterno'])) ? $datos[0]['amaterno'] : ''; ?>" class="form-control" id="amaterno" placeholder="amaterno">
                            </div>
                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-calendar-week"></i> Nacimiento</label>
                                <input type="date" name="cliente[nacimiento]" value="<?php echo (isset($datos[0]['nacimiento'])) ? $datos[0]['nacimiento'] : ''; ?>" class="form-control" id="nacimiento" placeholder="nacimiento">
                            </div>
                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-phone-square-alt"></i> Telefono</label>
                                <input type="text" name="cliente[telefono]" value="<?php echo (isset($datos[0]['telefono'])) ? $datos[0]['telefono'] : ''; ?>" class="form-control" id="telefono" placeholder="telefono">
                            </div>
                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-at"></i> correo</label>
                                <input type="text" name="cliente[correo]" value="<?php echo (isset($datos[0]['correo'])) ? $datos[0]['correo'] : ''; ?>" class="form-control" id="correo" placeholder="correo">
                            </div>

                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-lock"></i> Contraseña su cuenta</label>
                                <input type="text" name="cliente[contrasena]" value="<?php echo (isset($datos[0]['contrasena'])) ? $datos[0]['contrasena'] : ''; ?>" class="form-control" id="contrasena" placeholder="contrasena">
                            </div>

                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-house-user"></i> Calle</label>
                                <input type="text" name="cliente[calle]" value="<?php echo (isset($datos[0]['calle'])) ? $datos[0]['calle'] : ''; ?>" class="form-control" id="calle" placeholder="calle">
                            </div>

                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-house-user"></i> numero de vivienda</label>
                                <input type="text" name="cliente[numeroVivienda]" value="<?php echo (isset($datos[0]['numeroVivienda'])) ? $datos[0]['numeroVivienda'] : ''; ?>" class="form-control" id="numeroVivienda" placeholder="numeroVivienda">
                            </div>

                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-house-user"></i> descripcion de vivienda</label>
                                <input type="text" name="cliente[descripcionVivienda]" value="<?php echo (isset($datos[0]['descripcionVivienda'])) ? $datos[0]['descripcionVivienda'] : ''; ?>" class="form-control" id="descripcionVivienda" placeholder="descripcionVivienda">
                            </div>

                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-clock"></i> Día y hora preferida</label>
                                <input type="datetime-local" name="cliente[diaYHoraPref]" value="<?php echo (isset($datos[0]['diaYHoraPref'])) ? $datos[0]['diaYHoraPref'] : ''; ?>" class="form-control" id="diaYHoraPref" placeholder="yyyy/mm/dd h/m/s">
                            </div>

                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-camera"></i> Fotografia(opcional)</label>
                                <input type="file" name="fotografia" class="form-control" id="domicilio" placeholder="Domicilio">
                            </div>

                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-map-marker-alt"></i> Colonia</label>
                                <select name="cliente[id_colonia]" class="form-select">
                                    <?php
                                    foreach ($colonias as $key => $colonia) :
                                        $selected = '';
                                        if ($colonia['id_colonia'] == $colonias[0]['id_colonia']) {
                                            $selected = ' selected';
                                        }
                                    ?>
                                        <option value="<?php echo ($colonia['id_colonia']) ?>" <?php echo ($selected); ?>><?php echo ($colonia['colonia']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group p-3">
                                <label for="exampleFormControlInput1"><i class="fas fa-wifi"></i> Plan</label>
                                <select name="cliente[id_plan]" class="form-select">
                                    <?php
                                    foreach ($planes as $key => $plan) :
                                        $selected = '';
                                        if ($plan['id_plan'] == $datos[0]['id_plan']) {
                                            $selected = ' selected';
                                        }
                                    ?>
                                        <option value="<?php echo ($plan['id_plan']) ?>" <?php echo ($selected); ?>><?php echo ($plan['plan']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group p-3">
                                <input type="hidden" name="cliente[id_cliente]" value="<?php echo (isset($datos[0]['id_cliente'])) ? $datos[0]['id_cliente'] : ''; ?>">
                                <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/458c10fdf1.js" crossorigin="anonymous"></script>
</body>

</html>