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
          <h1>Archivo<small>Modificar registro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Modificar archivo</a></li>
          </ol>
        </section>
		
		<!-- Contenido principal -->
        <section class="content">
		
		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['archivos']['modificar']) or  !isset($_SESSION['permisos']['archivos']['acceso'])){
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
            <div class="box box-info" style="border-color:#f3d66d">
              <div class="box-header with-border">
                <h3 class="box-title">Formulario de registro</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
			  <form class="form-horizontal" name="formulario" id="formulario" method="post" enctype="multipart/form-data" >
                <div class="box-body">
				<div class="form-group ">
                    <label for="cnombre" class="col-sm-2 control-label">Nombre del archivo:</label>
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
                	<label for="x" class="col-sm-2 control-label">Archivo:</label>
                    <div class="col-sm-5">
                    	<div class="input-group">
                            <input type="file" name="archivoI" style="display:none;" id="carchivoI" accept=".jpg,.doc,.docx,.xls,.xlsx,.csv,.pdf,.rar,.zip,.txt" onChange="fileinput('archivo')"/>
                            <input value="<?php echo $archivo; ?>" type="text" name="archivo" id="carchivo" class="form-control" placeholder="Seleccionar Archivo" readonly >
                            <input value="<?php echo $archivo; ?>" type="hidden" name="archivoEliminacion" id="carchivoEliminacion" >
							<span class="input-group-btn">
                                <a class="btn btn-warning" onclick="$('#carchivoI').click();">&nbsp;&nbsp;&nbsp;Seleccionar Archivo</a>
                            </span>
                    	</div>        
                    </div>
                </div>
			
				<div class="form-group hide">
                    <label for="cfechamodificacion" class="col-sm-2 control-label">Fecha de modificación:</label>
                    <div class="col-sm-5">
                    	
                        <input value="<?php echo $fechamodificacion; ?>" name="fechamodificacion" type="hidden" class="form-control" id="cfechamodificacion" />
            			
						
                    </div>
                </div>
			
				<div class="form-group ">
                    <label for="cidregistro" class="col-sm-2 control-label">Asignación</label>
                    <div class="col-sm-5">
                    	
                        <input value="<?php echo $idregistro; ?>" name="idregistro" type="text" class="form-control" id="cidregistro" />
            			
						
                    </div>
                </div>
			
			</div><!-- /.box-body -->
                
                <div class="box-footer">
				  <input name="idarchivo" type="hidden" id="cidarchivo" value="<?php echo $id;?>"/>
                  <button type="button" class="btn btn-default" id="botonCancelar" onclick="vaciarCampos();">Limpiar</button>
                  <button type="button" class="btn btn-primary pull-right" id="botonGuardar"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                </div><!-- /.box-footer -->
              </form>
              <div id="loading" class="overlay" style="display:none">
  					<i class="fa fa-cog fa-spin" style="color:#f3d66d"></i>
			  </div>
              
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <?php include("../../../componentes/pie.php");?>
    </div><!-- ./wrapper -->
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("Vnombre", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				var sprytextfield1 = new Spry.Widget.ValidationTextField("Vnombre", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				
</script>
</body>
</html>