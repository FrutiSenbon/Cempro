<?php 
include ("../../seguridad/comprobar_login.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include ("../../../componentes/cabecera.php")?><link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../../plugins/fastclick/fastclick.min.js"></script>
<script src="../../../dist/js/app.min.js" type="text/javascript"></script>
<script src="js.js"></script><script src="../../../librerias/js/cookies.js"></script><script src="../../../librerias/js/validaciones.js"></script><script src="../../../librerias/js/Spry/SpryValidationTextField.js" type="text/javascript"></script>
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
          <h1>Programacion<small>Nuevo registro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Nuevo programacion</a></li>
          </ol>
        </section>
		
		<!-- Contenido principal -->
        <section class="content">
		
		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['programacion']['guardar']) or  !isset($_SESSION['permisos']['programacion']['acceso'])){
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
            <div class="box box-info" style="border-color:#8f2f0e">
              <div class="box-header with-border">
                <h3 class="box-title">Formulario de registro</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
			  <form class="form-horizontal" name="formulario" id="formulario" method="post">
                <div class="box-body">
				
				<div class="form-group ">
                    <label for="cvendedor" class="col-sm-2 control-label">Vendedor:</label>
                    <div class="col-sm-3">
                    	<span id="Vvendedor">
                        <input value="" name="vendedor" type="text" class="form-control" id="cvendedor" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="ccliente" class="col-sm-2 control-label">Cliente:</label>
                    <div class="col-sm-3">
                    	<span id="Vcliente">
                        <input value="" name="cliente" type="text" class="form-control" id="ccliente" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="ctelCliente" class="col-sm-2 control-label">Telefono cliente:</label>
                    <div class="col-sm-3">
                    	<span id="VtelCliente">
                        <input value="" name="telCliente" type="text" class="form-control" id="ctelCliente" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="ccorreoCliente" class="col-sm-2 control-label">Correo Cliente:</label>
                    <div class="col-sm-3">
                    	<span id="VcorreoCliente">
                        <input value="" name="correoCliente" type="text" class="form-control" id="ccorreoCliente" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				<div class="form-group ">
                  	<label for="ctipoVialidad" class="col-sm-2 control-label">Tipo Vialidad:</label>
                    <div class="col-sm-3">
                    	<select id="ctipoVialidad" name="tipoVialidad" class="form-control">
							<option value="CALLE">CALLE</option>
							<option value="AVENIDA">AVENIDA</option>
							<option value="CALZADA">CALZADA</option>
							<option value="LIBRAMIENTO">LIBRAMIENTO</option>
							<option value="PRIVADA">PRIVADA</option>
							<option value="ANDADOR">ANDADOR</option>
							<option value="CALLEJON">CALLEJON</option>
							<option value="KILOMETRO">KILOMETRO</option>
							<option value="PASEO">PASEO</option>
							<option value="CARRETERA">CARRETERA</option>
							<option value="BOULEVARD">BOULEVARD</option>
						</select>
                    </div> 
                </div>
				
				<div class="form-group ">
                    <label for="ccalle" class="col-sm-2 control-label">Calle:</label>
                    <div class="col-sm-3">
                    	<span id="Vcalle">
                        <input value="" name="calle" type="text" class="form-control" id="ccalle" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="cnumero" class="col-sm-2 control-label">Numero:</label>
                    <div class="col-sm-3">
                    	<span id="Vnumero">
                        <input value="" name="numero" type="text" class="form-control" id="cnumero" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="ccolonia" class="col-sm-2 control-label">Colonia:</label>
                    <div class="col-sm-3">
                    	<span id="Vcolonia">
                        <input value="" name="colonia" type="text" class="form-control" id="ccolonia" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="cresistencia" class="col-sm-2 control-label">Resistencia:</label>
                    <div class="col-sm-3">
                    	<span id="Vresistencia">
                        <input value="" name="resistencia" type="text" class="form-control" id="cresistencia" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="caditivo" class="col-sm-2 control-label">Aditivo:</label>
                    <div class="col-sm-3">
                    	<span id="Vaditivo">
                        <input value="" name="aditivo" type="text" class="form-control" id="caditivo" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="cvalorAditivo" class="col-sm-2 control-label">Valor Aditivo:</label>
                    <div class="col-sm-3">
                    	<span id="VvalorAditivo">
                        <input value="" name="valorAditivo" type="text" class="form-control" id="cvalorAditivo" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="cmCubTotales" class="col-sm-2 control-label">M3 TOTALES</label>
                    <div class="col-sm-3">
                    	
                        <input value="" name="mCubTotales" type="text" class="form-control" id="cmCubTotales" />
            			
						
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="crevenimiento" class="col-sm-2 control-label">Revenimiento:</label>
                    <div class="col-sm-3">
                    	<span id="Vrevenimiento">
                        <input value="" name="revenimiento" type="text" class="form-control" id="crevenimiento" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				<div class="form-group ">
                  	<label for="cvertimiento" class="col-sm-2 control-label">Vertimiento:</label>
                    <div class="col-sm-3">
                    	<select id="cvertimiento" name="vertimiento" class="form-control">
							<option value="DIRECTO">DIRECTO</option>
							<option value="BOMBA">BOMBA</option>
						</select>
                    </div> 
                </div>
				
				<div class="form-group ">
                    <label for="cfecha" class="col-sm-2 control-label">Fecha:</label>
                    <div class="col-sm-3">
                    	
                        <input value="<?php echo date('Y-m-d'); ?>" name="fecha" type="date" required="required" class="form-control" id="cfecha" />
            			
						
                    </div>
                </div>
			
				
				<div class="form-group hide">
                    <label for="cestatus" class="col-sm-2 control-label">Estatus:</label>
                    <div class="col-sm-5">
                    	
                        <input value="activo" name="estatus" type="hidden" class="form-control" id="cestatus" />
            			
						
                    </div>
                </div>
			
			</div><!-- /.box-body -->
                
                <div class="box-footer">
                  <button type="button" class="btn btn-default" id="botonCancelar" onclick="vaciarCampos();">Limpiar</button>
                  <button type="button" class="btn btn-primary pull-right" id="botonGuardar"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                </div><!-- /.box-footer -->
              </form>
              <div id="loading" class="overlay" style="display:none">
  					<i class="fa fa-cog fa-spin" style="color:#8f2f0e"></i>
			  </div>
              
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <?php include("../../../componentes/pie.php");?>
    </div><!-- ./wrapper -->
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("Vvendedor", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				var sprytextfield2 = new Spry.Widget.ValidationTextField("Vcliente", "none", {validateOn:["blur"],  maxChars:100,  minChars:1});
				var sprytextfield3 = new Spry.Widget.ValidationTextField("VtelCliente", "none", {validateOn:["blur"],  maxChars:30,  minChars:1});
				var sprytextfield4 = new Spry.Widget.ValidationTextField("VcorreoCliente", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				var sprytextfield5 = new Spry.Widget.ValidationTextField("Vcalle", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				var sprytextfield6 = new Spry.Widget.ValidationTextField("Vnumero", "none", {validateOn:["blur"],  maxChars:10,  minChars:1});
				var sprytextfield7 = new Spry.Widget.ValidationTextField("Vcolonia", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				var sprytextfield8 = new Spry.Widget.ValidationTextField("Vresistencia", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				var sprytextfield9 = new Spry.Widget.ValidationTextField("Vaditivo", "none", {validateOn:["blur"],  maxChars:30,  minChars:1});
				var sprytextfield10 = new Spry.Widget.ValidationTextField("VvalorAditivo", "none", {validateOn:["blur"],  maxChars:5,  minChars:1});
				var sprytextfield11 = new Spry.Widget.ValidationTextField("Vrevenimiento", "none", {validateOn:["blur"],  maxChars:5,  minChars:1});
				
</script>

</body>
</html>