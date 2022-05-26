<form action="quejaSug.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Correo</label>
    <input type="text" name="quejasug[correo]" value="<?php echo (isset($datos[0]['correo']))?$datos[0]['correo']:'';?>" class="form-control" id="correo" placeholder="correo" >
  
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Comentario</label>
    <input type="text" name="quejasug[comentario]" value="<?php echo (isset($datos[0]['comentario']))?$datos[0]['comentario']:'';?>" class="form-control" id="comentario" placeholder="comentario">
  
  </div>
  
    
  </div>
  <div class="form-group">
  <input type="hidden" name="quejasug[id_quejaSu]" value="<?php echo (isset($datos[0]['id_quejaSu']))?$datos[0]['id_quejaSu']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>