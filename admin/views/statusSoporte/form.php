<h1>Estatus de soporte</h1>
<form action="statusSoporte.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Status de soporte</label>
    <input type="text" name="statussoporte[statusSoporte]" value="<?php echo (isset($datos[0]['statusSoporte']))?$datos[0]['statusSoporte']:'';?>" class="form-control" id="statusSoporte" placeholder="statusSoporte">
  
  </div>
  

  <div class="form-group">
  <input type="hidden" name="statussoporte[id_statusSoporte]" value="<?php echo (isset($datos[0]['id_statusSoporte']))?$datos[0]['id_statusSoporte']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>