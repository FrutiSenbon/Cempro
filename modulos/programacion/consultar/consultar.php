<?php 
include ("../../seguridad/comprobar_login.php");
/////PERMISOS////////////////
if (!isset($_SESSION['permisos']['programacion']['acceso'])){
	echo $_SESSION['msgsinacceso'];
	exit;
}
/////FIN  DE PERMISOS////////
include ("../../../librerias/php/variasfunciones.php");
require('../Programacion.class.php');

if (isset($_REQUEST['tipoVista']) && $_REQUEST['tipoVista'] !="") {
	if($_REQUEST['tipoVista']!="undefined"){
		$tipoVista = htmlentities($_REQUEST['tipoVista']);
	}else{
		$tipoVista="tabla";
	}
}else{
	$tipoVista="tabla";
}

if (isset($_REQUEST['papelera']) && $_REQUEST['papelera'] =="si") {
		$papelera=true;
}else{
	$papelera=false;
}
if (isset($_REQUEST['campoOrden']) && $_REQUEST['campoOrden'] !="") {
	if($_REQUEST['campoOrden']!="undefined"){
		$campoOrden = htmlentities($_REQUEST['campoOrden']);
	}else{
		$campoOrden="fecha";
	}
}else{
	$campoOrden="fecha";
}

if (isset($_REQUEST['orden']) && $_REQUEST['orden'] !="") {
	if($_REQUEST['orden']!="undefined"){
		$orden = htmlentities($_REQUEST['orden']);
	}else{
		$orden="DESC";
	}
}else{
	$orden="DESC";
}

if (isset($_REQUEST['cantidadamostrar']) && $_REQUEST['cantidadamostrar'] !="") {
	if($_REQUEST['cantidadamostrar']!="undefined"){
		$cantidadamostrar = htmlentities($_REQUEST['cantidadamostrar']);
	}else{
		$cantidadamostrar="20";
	}
}else{
	$cantidadamostrar="20";
}

if (isset($_REQUEST['paginacion']) && $_REQUEST['paginacion'] !="") {
$pg = htmlentities($_REQUEST['paginacion']);
}

if (isset($_REQUEST['busqueda']) && $_REQUEST['busqueda'] !="") {
$busqueda = htmlentities($_REQUEST['busqueda']);
// $busqueda=mysql_real_escape_string($busqueda);
}else{
	$busqueda ="";
}

//CODIGO DE PAGINACION (REQUIERE: "variasfunciones.php")
$inicial = $pg * $cantidadamostrar;
$Oprogramacion=new Programacion;
$resultado=$Oprogramacion->mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $busqueda, $papelera);
if ($resultado=="denegado"){
	echo $_SESSION['msgsinacceso'];
	exit;
}
$filasTotales = $Oprogramacion->contar($busqueda, $papelera);
// MOSTRAR LOS REGISTROS SEGUN EL RESULTADO DE LA CONSULTA




if ($tipoVista=="tabla"){ // Si se ha elegido el tipo tabla ?>
	<div class="box-body table-responsive no-padding"> <!-- /.box-body -->
    	<table class="table table-hover table-bordered">
        	<tr>
        		<th class="checksEliminar" width="10"><input id="seleccionarTodo" type="checkbox"  onclick="seleccionarTodo();"></th>
                <th class="columnaDecorada" style="background:#8f2f0e;"></th>
				<th class="CidProgramacion">ID</th>
				<th class="Cvendedor">Vendedor</th>
				<th class="Ccliente">Cliente</th>
				<th class="CtelCliente">Telefono cliente</th>
				<th class="CcorreoCliente">Correo Cliente</th>
				<th class="CtipoVialidad">Tipo Vialidad</th>
				<th class="Ccalle">Calle</th>
				<th class="Cnumero">Numero</th>
				<th class="Ccolonia">Colonia</th>
				<th class="Cresistencia">Resistencia</th>
				<th class="Caditivo">Aditivo</th>
				<th class="CvalorAditivo">Valor Aditivo</th>
				<th class="CmCubTotales">M3 TOTALES</th>
				<th class="Crevenimiento">Revenimiento</th>
				<th class="Cvertimiento">Vertimiento</th>
				<th class="Cfecha">Fecha</th>
				<th width="40"></th>
                <th width="40"></th>
      		</tr>
	<?php
	while ($filas=mysqli_fetch_array($resultado)) { ?>
      		<tr id="iregistro<?php echo $filas['idProgramacion'] ?>">
        		<td class="checksEliminar" width="30" valign="middle">
					<?php /////PERMISOS////////////////
                	if (isset($_SESSION['permisos']['programacion']['eliminar'])){ ?>
                		<?php if($filas['idProgramacion']!=0){ ?>
							<input id="registroEliminar<?php echo $filas['idProgramacion'] ?>" type="checkbox" name="registroEliminar[]"  value="<?php echo $filas['idProgramacion'] ?>" class="checkEliminar">
                    	<?php } ?>
					<?php 
					}
					?>
            	</td>
                <td class="columnaDecorada" style="background:#8f2f0e;"></td>
				<td class="CidProgramacion"><?php echo $filas['idProgramacion']; ?></td>
				<td class="Cvendedor"><?php echo $filas['vendedor']; ?></td>
				<td class="Ccliente"><?php echo $filas['cliente']; ?></td>
				<td class="CtelCliente"><?php echo $filas['telCliente']; ?></td>
				<td class="CcorreoCliente"><?php echo $filas['correoCliente']; ?></td>
				<td class="CtipoVialidad"><?php echo $filas['tipoVialidad']; ?></td>
				<td class="Ccalle"><?php echo $filas['calle']; ?></td>
				<td class="Cnumero"><?php echo $filas['numero']; ?></td>
				<td class="Ccolonia"><?php echo $filas['colonia']; ?></td>
				<td class="Cresistencia"><?php echo $filas['resistencia']; ?></td>
				<td class="Caditivo"><?php echo $filas['aditivo']; ?></td>
				<td class="CvalorAditivo"><?php echo $filas['valorAditivo']; ?></td>
				<td class="CmCubTotales"><?php echo $filas['mCubTotales']; ?></td>
				<td class="Crevenimiento"><?php echo $filas['revenimiento']; ?></td>
				<td class="Cvertimiento"><?php echo $filas['vertimiento']; ?></td>
				<?php
				$fechaNfecha=date_create($filas['fecha']);
				$nuevaFecha= date_format($fechaNfecha, 'd/m/Y');
				?>
				<td class="Cfecha"><?php echo $nuevaFecha; ?></td>
        		<td>
					<?php 
					if (!$papelera){
					?>
						<?php /////PERMISOS////////////////
						if (isset($_SESSION['permisos']['programacion']['eliminar'])){
						?>
							<?php if($filas['idProgramacion']==0){ ?>
								<a class="btn btn-danger btn-xs disabled"><i class="fa fa-trash-o"></i></a>
							<?php }else{ ?>
								<a class="btn btn-danger btn-xs" title="Eliminar" onclick="(eliminarIndividual(<?php echo $filas['idProgramacion'] ?>))"><li class="fa fa-trash"></li></a>
							<?php }?>
						<?php 
						}else{ ?>
							<a class="btn btn-danger btn-xs disabled"><i class="fa fa-trash-o"></i></a>
						<?php
						}
						?>
					<?php 
					}else{ ?>
							<a class="btn btn-primary btn-xs" title="Restaurar Registro" onclick="(restaurarIndividual(<?php echo $filas['idProgramacion'] ?>))"><li class="fa fa-recycle"></li></a>
					<?php
					}
					?>
                </td>
                <td>
                	<?php
                	/////PERMISOS////////////////
                	if (isset($_SESSION['permisos']['programacion']['modificar'])){
					?>
						<form action="../modificar/actualizar.php?n1=programacion&n2=consultarprogramacion" method="post">
                			<input type="hidden" name="id" value="<?php echo $filas['idProgramacion'] ?>"/>
                            <button type="submit" class="btn btn-success btn-xs" value="" title="Modificar"><li class="fa fa-pencil"></li></button>
                		</form>
                	<?php 
					}else{ ?>
                    	<a class="btn btn-success btn-xs disabled"><i class="fa fa-pencil"></i></a>
					<?php
                    }
					?>
                </td>
      		</tr>
    <?php
	}//Fin de while si es tabla ?>
		</table>
	</div><!-- /.box-body -->
<?php
}
else{ // Si se ha elegido el tipo lista ?>
	<div class="box-body">
    <?php
	while ($filas=mysqli_fetch_array($resultado)) {		
?>
	<div class="info-box" style="height:120px;" id="iregistro<?php echo $filas['idProgramacion'] ?>">
    	<span class="info-box-icon bg-red" style="background-color:#8f2f0e !important; height:120px; padding-top:15px;"><i class="fa fa-calendar"></i></span>
    	<div class="info-box-content">
    		<span class="info-box-text Ccliente" style="font-size:18px;">
				<span class="checksEliminar">
					<?php /////PERMISOS////////////////
					if (isset($_SESSION['permisos']['programacion']['eliminar'])){ ?>
						<?php if($filas['idProgramacion']!=0){ ?>
							<input id="registroEliminar<?php echo $filas['idProgramacion'] ?>" type="checkbox" name="registroEliminar[]"  value="<?php echo $filas['idProgramacion'] ?>" class="checkEliminar">
						<?php } ?>
					<?php
					}
					?>
				</span>
			<?php echo $filas['cliente'] ?>
            </span>
    		<span class="info-box-number Cfecha" style="font-weight:normal; color:#8f2f0e;"><?php echo $filas['fecha'] ?></span>
            <span class="info-box-number Ccomposicion" style="font-weight:normal; font-size:12px;">
				<?php 
				$composicion="";
				if (trim($filas['tipoVialidad'])!=""){
					$composicion=$composicion." ".$filas['tipoVialidad'];
				}
				if (trim($filas['calle'])!=""){
					$composicion=$composicion." ".$filas['calle'];
				}
				if (trim($filas['numero'])!=""){
					$composicion=$composicion." ".$filas['numero'];
				}
				if (trim($filas['colonia'])!=""){
					$composicion=$composicion." ".$filas['colonia'];
				}
				echo $composicion;
				?>
			</span>
			
            <table border="0">
             	<tr>
             		<td style=" padding-right:2px;">
						<?php 
						if (!$papelera){
						?>
							<?php /////PERMISOS////////////////
							if (isset($_SESSION['permisos']['programacion']['eliminar'])){ ?>
								<?php if($filas['idProgramacion']==0){ ?>
									<a class="btn btn-default disabled"><i class="fa fa-trash-o"></i></a>
								<?php }else{ ?>
									<a class="btn btn-default" onclick="(eliminarIndividual(<?php echo $filas['idProgramacion'] ?>))" title="Eliminar"><i class="fa fa-trash-o"></i></a>
								<?php } ?>
							<?php 
							}else{ ?>
								<a class="btn btn-default disabled"><i class="fa fa-trash-o"></i></a>
							<?php
							}
							?>
						<?php 
						}else{?>
								<a class="btn btn-default" onclick="(restaurarIndividual(<?php echo $filas['idProgramacion'] ?>))" title="Restaurar Resgistro"><i class="fa fa-recycle"></i></a>
						<?php 
						}
						?>
					</td>
					<td style=" padding-right:2px;">
						<?php /////PERMISOS////////////////
						if (isset($_SESSION['permisos']['programacion']['modificar'])){ ?>
							<form action="../modificar/actualizar.php?n1=programacion&n2=consultarprogramacion" method="post">
								<input type="hidden" name="id" value="<?php echo $filas['idProgramacion'] ?>"/>
								<button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i></button>
							</form>
						<?php 
						}else{ ?>
							<a class="btn btn-default disabled"><i class="fa fa-pencil"></i></a>
                        <?php
                        }
						?>
                	</td>
        	 	</tr>
             </table>  
            
    	</div><!-- /.info-box-content -->
    </div><!-- /.box -->
<?php 
		} //Fin de while
}// Fin de sis es lista
?>

</div>
<?php 
paginar($pg, $cantidadamostrar, $filasTotales, $campoOrden, $orden, $busqueda, $tipoVista);
//FIN DEL CODIGO DE PAGINACION
if(mysqli_num_rows($resultado)==0){
	include("../../../componentes/mensaje_no_hay_registros.php");
}
?>