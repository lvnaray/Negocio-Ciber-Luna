<h1>Crear/ actualizar citas</h1>
<form action="cita.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Dia y hora preferido</label>
    <input type="text" name="cita[diaYHoraPref]" value="<?php echo (isset($datos[0]['diaYHoraPref']))?$datos[0]['diaYHoraPref']:'';?>" class="form-control" id="diaYHoraPref" placeholder="diaYHoraPref">
  
  </div>
 
 
    <div class="form-group">
    <label for="exampleFormControlInput1">Cliente</label>
    <select name="cita[id_cliente]" class="form-select">
      <?php 
      foreach($tipos as $key => $tipo):
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
    <label for="exampleFormControlInput1">Plan</label>
    <select name="cita[id_statusCita]" class="form-select">
      <?php 
      foreach($tipos1 as $key => $tipo):
        $selected='';
        if($tipo['id_statusCita']== $datos[0]['id_statusCita']){
          $selected=' selected';
        }
       ?>
      <option value="<?php echo($tipo['id_statusCita']) ?>" <?php echo($selected); ?> ><?php echo($tipo['statusCita']) ?></option>
      <?php endforeach; ?>
    </select>
    </div>
    
  </div>
  <div class="form-group">
  <input type="hidden" name="cita[id_cita]" value="<?php echo (isset($datos[0]['id_cita']))?$datos[0]['id_cita']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>