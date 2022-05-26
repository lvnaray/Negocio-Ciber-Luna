<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Soporte</title>
</head>
<body>
<form action="registroSoporte.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  <div class="text-center">
    <img src="../img/logo.jpg" alt="..." width="100" height="100">
  </div>
  <div class="form-group p-3">
    <i class="fas fa-audio-description"></i><label for="exampleFormControlInput1"> Descripcion del problema</label>
    <input type="text" name="soporte[descripProblem]" value="<?php echo (isset($datos[0]['descripProblem']))?$datos[0]['descripProblem']:'';?>" class="form-control" id="descripProblem" placeholder="descripProblem" >
  
  </div>
  <div class="form-group p-3">
    <i class="far fa-calendar-plus"></i><label for="exampleFormControlInput1"> Dia y hora preferido</label>
    <input type="datetime-local" name="soporte[diaYHoraPref]" value="<?php echo (isset($datos[0]['diaYHoraPref']))?$datos[0]['diaYHoraPref']:'';?>" class="form-control" id="diaYHoraPref" placeholder="diaYHoraPref">
  
  </div>


  <div class="form-group p-3">
  <input type="hidden" name="soporte[id_soporte]" value="<?php echo (isset($datos[0]['id_soporte']))?$datos[0]['id_soporte']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>
  <script src="https://kit.fontawesome.com/458c10fdf1.js" crossorigin="anonymous"></script>
</body>
</html>
