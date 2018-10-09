<?php
include("../../../componentes/herramientasup.php");
if ($herramientas=="nuevo"){
	include("../../../componentes/herramientasnuevo.php");
}
if ($herramientas=="consultar"){
	include("../../../componentes/herramientasconsultar.php"); ?>
		<?php /////PERMISOS////////////////
        if (isset($_SESSION['permisos']['programacion']['eliminar'])){
		?>
		<li class="btn-default border-right botonEliminar" title="Eliminar varios registros"><a href="#"><i class="fa fa-trash-o"></i><span class="visible-xs-inline">&nbsp;&nbsp;Eliminar</span></a></li>
    	<?php
		}
		?>
		<li class="dropdown btn-defaul border-right" style="background:#F4F4F4;" title="Visualización y ordenamiento">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-eye"></i><span class="visible-xs-inline">&nbsp;&nbsp;Visualización y ordenamiento</span></a>
          <ul class="dropdown-menu dropdown-menu-form" style="min-width:250px;;">
            <li><span class="titulo-herramientas">Resultados por hoja:</span></li>
            <li><a>
            	<select id="cantidadamostrar" class="form-control input-sm">
                	<option value="1">1</option>
                	<option value="2">2</option>
                    <option value="5">5</option>
                    <option value="20">20</option>
                	<option value="30">30</option>
                	<option value="50">50</option>
                	<option value="100">100</option>
                    <option value="200">200</option>
                </select>
                </a></li>
            <li role="separator" class="divider"></li>
            <li><span class="titulo-herramientas">Ordenar por:</span></li>
            <li><a>
            	<select id="campoOrden" class="form-control input-sm">
									<option value="vendedor">Vendedor</option>
									<option value="cliente">Cliente</option>
									<option value="fecha">Fecha</option>
                </select>
                </a>
    		</li>
            <li><a><input id="asc" type="radio" name="orden" value="asc" checked="checked"><label for="asc">&nbsp;&nbsp;Ascendente</label></a></li>
            <li><a><input id="desc" type="radio" name="orden" value="desc"><label for="desc">&nbsp;&nbsp;Descendente</label></a></li>
            <li role="separator" class="divider"></li>
            <li><span class="titulo-herramientas">Mostrar / Ocultar campos</span></li>
				<div style="padding:10px; color:#666; max-height:200px !important; overflow:scroll;">
				<li><a><input id="CheckIdProgramacion" name="kidProgramacion" value="si" checked="checked" type="checkbox"/><label for="CheckIdProgramacion">&nbsp;&nbsp;ID</label></a></li>
			
				<li><a><input id="CheckVendedor" name="kvendedor" value="si" checked="checked" type="checkbox"/><label for="CheckVendedor">&nbsp;&nbsp;Vendedor</label></a></li>
			
				<li><a><input id="CheckCliente" name="kcliente" value="si" checked="checked" type="checkbox"/><label for="CheckCliente">&nbsp;&nbsp;Cliente</label></a></li>
			
				<li><a><input id="CheckTelCliente" name="ktelCliente" value="si" checked="checked" type="checkbox"/><label for="CheckTelCliente">&nbsp;&nbsp;Telefono Cliente</label></a></li>
			
				<li><a><input id="CheckCorreoCliente" name="kcorreoCliente" value="si" checked="checked" type="checkbox"/><label for="CheckCorreoCliente">&nbsp;&nbsp;Correo cliente</label></a></li>
			
				<li><a><input id="CheckTipoVialidad" name="ktipoVialidad" value="si" checked="checked" type="checkbox"/><label for="CheckTipoVialidad">&nbsp;&nbsp;Tipo vialidad</label></a></li>
			
				<li><a><input id="CheckCalle" name="kcalle" value="si" checked="checked" type="checkbox"/><label for="CheckCalle">&nbsp;&nbsp;Calle</label></a></li>
			
				<li><a><input id="CheckNumero" name="knumero" value="si" checked="checked" type="checkbox"/><label for="CheckNumero">&nbsp;&nbsp;Numero</label></a></li>
			
				<li><a><input id="CheckColonia" name="kcolonia" value="si" checked="checked" type="checkbox"/><label for="CheckColonia">&nbsp;&nbsp;Colonia</label></a></li>
			
				<li><a><input id="CheckResistencia" name="kresistencia" value="si" checked="checked" type="checkbox"/><label for="CheckResistencia">&nbsp;&nbsp;Resistencia</label></a></li>
			
				<li><a><input id="CheckAditivo" name="kaditivo" value="si" checked="checked" type="checkbox"/><label for="CheckAditivo">&nbsp;&nbsp;Aditivo</label></a></li>
			
				<li><a><input id="CheckValorAditivo" name="kvalorAditivo" value="si" checked="checked" type="checkbox"/><label for="CheckValorAditivo">&nbsp;&nbsp;Valor aditivo</label></a></li>
			
				<li><a><input id="CheckMCubTotales" name="kmCubTotales" value="si" checked="checked" type="checkbox"/><label for="CheckMCubTotales">&nbsp;&nbsp;M3</label></a></li>
			
				<li><a><input id="CheckRevenimiento" name="krevenimiento" value="si" checked="checked" type="checkbox"/><label for="CheckRevenimiento">&nbsp;&nbsp;Revenimiento</label></a></li>
			
				<li><a><input id="CheckVertimiento" name="kvertimiento" value="si" checked="checked" type="checkbox"/><label for="CheckVertimiento">&nbsp;&nbsp;Vertimiento</label></a></li>
			
				<li><a><input id="CheckFecha" name="kfecha" value="si" checked="checked" type="checkbox"/><label for="CheckFecha">&nbsp;&nbsp;Fecha</label></a></li>
			
            	<li><a><input id="CheckComposicion" name="kcomposicion" value="si" type="checkbox" checked="checked"/><label for="CheckComposicion">&nbsp;&nbsp;Datos inferiores</label></a></li>
          	</div>
		  
		  </ul>
        </li>
<?php    
}
include("../../../componentes/herramientasdown.php");
?>