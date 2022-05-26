<h1>Agregar/actualizar fichas de pago</h1>
<form action="fichaPago.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Fecha limite</label>
    <input type="text" name="fichapago[fechaLimite]" value="<?php echo (isset($datos[0]['fechaLimite']))?$datos[0]['fechaLimite']:'';?>" class="form-control" id="fechaLimite" placeholder="fechaLimite">
  
  </div>
  
    <div class="form-group">
    <label for="exampleFormControlInput1">Cliente</label>
    <select name="fichapago[id_cliente]" class="form-select">
      <?php 
      foreach($tipos3 as $key => $tipo):
        $selected='';
        if($tipo['id_cliente']== $datos[0]['id_cliente']){
          $selected=' selected';
        }
       ?>
      <option value="<?php echo($tipo['id_cliente']) ?>" <?php echo($selected); ?> ><?php echo($tipo['nombre']) ?></option>
      <?php endforeach; ?>
    </select>
    </div>

  <div class="form-group">
  <input type="hidden" name="fichapago[id_fichaPago]" value="<?php echo (isset($datos[0]['id_fichaPago']))?$datos[0]['id_fichaPago']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>