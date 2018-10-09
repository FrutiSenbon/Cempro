<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/variasfunciones.php");
include ("recuperarValores.php");
?>
<!DOCTYPE html>
<html>
  <head>
	<?php include ("../../../componentes/cabecera.php")?><link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" /><link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../../plugins/fastclick/fastclick.min.js"></script>
<script src="../../../dist/js/app.min.js" type="text/javascript"></script>
<script src="js.js"></script><script src="../../../librerias/js/cookies.js"></script>

<script><?php echo "var idperfilSeleccionado='$idperfil';";?></script>

<script src="../../../librerias/js/validaciones.js"></script><script src="../../../librerias/js/Spry/SpryValidationTextField.js" type="text/javascript"></script>
</head>
  <body class="sidebar-mini <?php include("../../../componentes/skin.php");?>">
    <!-- Wrapper es el contenedor principal -->
    <div class="wrapper">
      
      <?php include("../../../componentes/menuSuperior.php");?>
      <?php include("../../../componentes/menuLateral.php");?>

      <!-- Contenido-->
      <div class="content-wrapper">
        <!-- Contenido de la cabecera -->
        <section class="content-header">
          <h1>Usuario<small>Modificar registro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Modificar usuario</a></li>
          </ol>
        </section>
		
		<!-- Contenido principal -->
        <section class="content">
		
		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['usuarios']['modificar']) or  !isset($_SESSION['permisos']['usuarios']['acceso'])){
			echo $_SESSION['msgsinacceso'];
			echo "
		</section><!-- /.content -->
       </div><!-- /.content-wrapper -->";
       include("../../../componentes/pie.php");
	   echo "
	</div><!-- ./wrapper -->
</body>
</html>";
			include ("../../../componentes/avisos.php");
			exit;
		}
	/////FIN  DE PERMISOS////////
    		?>
			
			<?php $herramientas="nuevo"; include("../componentes/herramientas.php"); ?>
			<?php include("../../../componentes/avisos.php");?>
        
          	<!-- Horizontal Form -->
            <div class="box box-info" style="border-color:#1c81f0">
              <div class="box-header with-border">
                <h3 class="box-title">Formulario de registro</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
			  <form class="form-horizontal" name="formulario" id="formulario" method="post" enctype="multipart/form-data" >
                <div class="box-body">
				<div class="form-group ">
                    <label for="cnombre" class="col-sm-2 control-label">Nombre completo:</label>
                    <div class="col-sm-5">
                    	<span id="Vnombre">
                        <input value="<?php echo $nombre; ?>" name="nombre" type="text" class="form-control" id="cnombre" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				<div class="form-group ">
                    <label for="cemail" class="col-sm-2 control-label">Correo electrónico:</label>
                    <div class="col-sm-5">
                    	<span id="Vemail">
                        <input value="<?php echo $email; ?>" name="email" type="text" class="form-control" id="cemail" />
            			<span class="textfieldInvalidFormatMsg">Formato no válido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				<div class="form-group ">
                	<label for="x" class="col-sm-2 control-label">Fotografía:</label>
                    <div class="col-sm-5">
                    	<div class="input-group">
                            <input type="file" name="fotoI" style="display:none;" id="cfotoI" accept=".jpg" onChange="fileinput('foto')"/>
                            <input value="<?php echo $foto; ?>" type="text" name="foto" id="cfoto" class="form-control" placeholder="Seleccionar Imagen" readonly >
                            <input value="<?php echo $foto; ?>" type="hidden" name="fotoEliminacion" id="cfotoEliminacion" >
							<span class="input-group-btn">
                                <a class="btn btn-success" onclick="$('#cfotoI').click();">&nbsp;&nbsp;&nbsp;Seleccionar Imagen</a>
                            </span>
                    	</div>        
                    </div>
                </div>
			
				<div class="form-group ">
                    <label for="cusuario" class="col-sm-2 control-label">Usuario:</label>
                    <div class="col-sm-3">
                    	<span id="Vusuario">
                        <input value="<?php echo $usuario; ?>" name="usuario" type="text" class="form-control" id="cusuario" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				<div class="form-group ">
                    <label for="ccontrasena" class="col-sm-2 control-label">Contraseña:</label>
                    <div class="col-sm-3">
                    	<span id="Vcontrasena">
                        <input value="" name="contrasena" type="password" class="form-control" id="ccontrasena" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				<div class="form-group hide">
                    <label for="cestado" class="col-sm-2 control-label"></label>
                    <div class="col-sm-5">
                    	
                        <input value="<?php echo $estado; ?>" name="estado" type="hidden" class="form-control" id="cestado" />
            			
						
                    </div>
                </div>
			
				<div class="form-group ">
                  	<label for="selectidperfil_ajax" class="col-sm-2 control-label">Perfil de permisos:</label>
                    <div class="col-sm-5">
                      <select id="idperfil_ajax" name="idperfil" class="form-control">
                      </select>
                    </div> 
                </div>
				<div class="form-group hide">
                    <label for="cempresa" class="col-sm-2 control-label"></label>
                    <div class="col-sm-5">
                    	
                        <input value="<?php echo $empresa; ?>" name="empresa" type="hidden" class="form-control" id="cempresa" />
            			
						
                    </div>
                </div>
			
				<div class="form-group ">
                    <label for="x" class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                    	<label>
							<?php 
								$checked="";
								if($controlaracceso=="si"){
									$checked="checked='checked'";
								}
							?>
                  			<input id="ccontrolaracceso" type="checkbox" name="controlaracceso" value="si" <?php echo $checked; ?>>
                  			Controlar acceso por horario
                 		</label>
                    </div>
                </div>
				<div class="form-group ">
                    <label for="chorainicio" class="col-sm-2 control-label">Hora de inicio:</label>
                    <div class="col-sm-2">
                    	
                        <input value="<?php echo $horainicio; ?>" name="horainicio" type="time" required class="form-control" id="chorainicio" />
            			
						
                    </div>
                </div>
			
				<div class="form-group ">
                    <label for="chorafin" class="col-sm-2 control-label">Hora de fin:</label>
                    <div class="col-sm-2">
                    	
                        <input value="<?php echo $horafin; ?>" name="horafin" type="time" required class="form-control" id="chorafin" />
            			
						
                    </div>
                </div>
			
				<div class="form-group hide">
                    <label for="cidregistrorelacionado" class="col-sm-2 control-label"></label>
                    <div class="col-sm-5">
                    	
                        <input value="<?php echo $idregistrorelacionado; ?>" name="idregistrorelacionado" type="hidden" class="form-control" id="cidregistrorelacionado" />
            			
						
                    </div>
                </div>
			
				<div class="form-group hide">
                    <label for="ctablarelacionada" class="col-sm-2 control-label"></label>
                    <div class="col-sm-5">
                    	
                        <input value="<?php echo $tablarelacionada; ?>" name="tablarelacionada" type="hidden" class="form-control" id="ctablarelacionada" />
            			
						
                    </div>
                </div>
			
				<div class="form-group ">
                    <label for="x" class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                    	<label>
							<?php 
								$checked="";
								if($bitacora=="si"){
									$checked="checked='checked'";
								}
							?>
                  			<input id="cbitacora" type="checkbox" name="bitacora" value="si" <?php echo $checked; ?>>
                  			Registrar en bitácora las acciones del usuario
                 		</label>
                    </div>
                </div>
			</div><!-- /.box-body -->
                
                <div class="box-footer">
				  <input name="idusuario" type="hidden" id="cidusuario" value="<?php echo $id;?>"/>
                  <button type="button" class="btn btn-default" id="botonCancelar" onclick="vaciarCampos();">Limpiar</button>
                  <button type="button" class="btn btn-primary pull-right" id="botonGuardar"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                </div><!-- /.box-footer -->
              </form>
              <div id="loading" class="overlay" style="display:none">
  					<i class="fa fa-cog fa-spin" style="color:#1c81f0"></i>
			  </div>
              
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <?php include("../../../componentes/pie.php");?>
    </div><!-- ./wrapper -->
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("Vnombre", "none", {validateOn:["blur"],  maxChars:100,  minChars:2});
				
var sprytextfield2 = new Spry.Widget.ValidationTextField("Vemail", "email", {validateOn:["blur"]});
				var sprytextfield3 = new Spry.Widget.ValidationTextField("Vusuario", "none", {validateOn:["blur"],  maxChars:15,  minChars:2});
				var sprytextfield4 = new Spry.Widget.ValidationTextField("Vcontrasena", "none", {validateOn:["blur"],  maxChars:12,  minChars:6});
				var sprytextfield1 = new Spry.Widget.ValidationTextField("Vnombre", "none", {validateOn:["blur"],  maxChars:100,  minChars:2});
				
var sprytextfield2 = new Spry.Widget.ValidationTextField("Vemail", "email", {validateOn:["blur"]});
				var sprytextfield3 = new Spry.Widget.ValidationTextField("Vusuario", "none", {validateOn:["blur"],  maxChars:15,  minChars:2});
				var sprytextfield4 = new Spry.Widget.ValidationTextField("Vcontrasena", "none", {validateOn:["blur"],  maxChars:12,  minChars:6});
				
</script>
</body>
</html>