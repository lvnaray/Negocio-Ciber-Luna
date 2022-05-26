<h1>Agregar/actualizar colonias</h1>
<form action="colonia.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Colonia</label>
    <input type="text" name="colonia[colonia]" value="<?php echo (isset($datos[0]['colonia']))?$datos[0]['colonia']:'';?>" class="form-control" id="colonia" placeholder="colonia" >
 
  </div>
  <div class="form-group">
  <input type="hidden" name="colonia[id_colonia]" value="<?php echo (isset($datos[0]['id_colonia']))?$datos[0]['id_colonia']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>