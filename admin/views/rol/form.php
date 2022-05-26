<h1>Agregar/actualizar roles</h1>
<form action="rol.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Status de cita</label>
    <input type="text" name="rol[rol]" value="<?php echo (isset($datos[0]['rol']))?$datos[0]['rol']:'';?>" class="form-control" id="statusCita" placeholder="rol">
  
  </div>
  

  <div class="form-group">
  <input type="hidden" name="rol[id_rol]" value="<?php echo (isset($datos[0]['id_rol']))?$datos[0]['id_rol']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>
  </form>