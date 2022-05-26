<form action="administrador.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  
<div class="form-group">
    <label for="exampleFormControlInput1">Usuario</label>
    <select name="administrador[id_usuario]" class="form-select">
      <?php 
      foreach($tipos7 as $key => $tipo):
        $selected='';
        if($tipo['id_usuario']== $datos[0]['id_usuario']){
          $selected=' selected';
        }
       ?>
      <option value="<?php echo($tipo['id_usuario']) ?>" <?php echo($selected); ?> ><?php echo($tipo['username']) ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  

  <div class="form-group">
  <input type="hidden" name="administrador[id_usuario]" value="<?php echo (isset($datos[0]['id_usuario']))?$datos[0]['id_usuario']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>