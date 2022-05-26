<h1>Estatus de citas</h1>
<form action="statusCita.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Status de cita</label>
    <input type="text" name="statuscita[statusCita]" value="<?php echo (isset($datos[0]['statusCita']))?$datos[0]['statusCita']:'';?>" class="form-control" id="statusCita" placeholder="statusCita">
  
  </div>
  

  <div class="form-group">
  <input type="hidden" name="statuscita[id_statusCita]" value="<?php echo (isset($datos[0]['id_statusCita']))?$datos[0]['id_statusCita']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>