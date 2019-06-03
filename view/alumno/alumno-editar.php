<h1 class="page-header">
    <?php echo $alm->IdUsuario != null ? $alm->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Alumno">Alumnos</a></li>
  <li class="active"><?php echo $alm->IdUsuario != null ? $alm->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Alumno&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Contraseña</label>
        <input type="text" name="contrasena" value="<?php echo $alm->contrasena; ?>" class="form-control" placeholder="Ingrese su contraseña" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>claveApi</label>
        <input type="text" name="claveApi" value="<?php echo $alm->claveApi; ?>" class="form-control" placeholder="Ingrese su claveapi" data-validacion-tipo="requerido|min:3" />
    </div>

     <div class="form-group">
        <label>Correo</label>
        <input type="text" name="correo" value="<?php echo $alm->correo; ?>" class="form-control" placeholder="Ingrese su correo" data-validacion-tipo="requerido|min:3" />
    </div>
    

    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>