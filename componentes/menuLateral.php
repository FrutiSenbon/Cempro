<?php
function checarLink($nivel,$base){
	if (isset($_GET[$nivel])){
		if ($base==$_GET[$nivel]){
			return 'active';
		}
	}else{
		return "";
	}
}
?>
    <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../../empresas/<?php echo $_SESSION["empresa"];?>/archivosSubidos/usuarios/<?php echo $_SESSION["foto"];?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info-box-text info">
              <p><?php echo $_SESSION["nombreusuario"];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">





             <li class="header">MENU PRINCIPAL</li>

						 <!-- Inicio de Bloque de Programacion -->
		 <?php
/////PERMISOS////////////////
if (isset($_SESSION['permisos']['programacion']['acceso'])){
?>
		 <li class="treeview <?php echo checarLink("n1","programacion"); ?>">
			 <a href="#">
				 <i class="fa fa-calendar"></i> <span>Programacion</span>
				 <i class="fa fa-angle-left pull-right"></i>
			 </a>
			 <ul class="treeview-menu">
				 <?php
 /////PERMISOS////////////////
 if (isset($_SESSION['permisos']['programacion']['guardar'])){
 ?>
				 <li class="<?php echo checarLink("n2","nuevoprogramacion"); ?>">
				 <a href="../../../modulos/programacion/nuevo/nuevo.php?n1=programacion&n2=nuevoprogramacion"><i class="fa fa-circle-o text-green"></i> Nueva programacion</a></li>
				 <?php }?>

				 <?php
	 /////PERMISOS////////////////
	 if (isset($_SESSION['permisos']['programacion']['consultar'])){
	 ?>
				 <li class="<?php echo checarLink("n2","consultarprogramacion"); ?>">
					 <a href="../../../modulos/programacion/consultar/vista.php?n1=programacion&n2=consultarprogramacion"><i class="fa fa-circle-o text-red"></i> Consultar programacion</i></a>
				 </li>
					<?php }?>
					 <?php
	 /////PERMISOS////////////////
	 if (isset($_SESSION['permisos']['programacion']['papelera'])){
	 ?>
				 <li class="<?php echo checarLink("n2","papeleraprogramacion"); ?>">
					 <a href="../../../modulos/programacion/consultar/vista.php?n1=programacion&n2=papeleraprogramacion&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de programacion</i></a>
				 </li>
					<?php }?>
			 </ul>
		 </li>
		 <?php }?>
<!-- Fin de Bloque de Programacion -->

                    <!-- Inicio de Bloque Almacén -->
					<?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['clientes']['acceso']) or isset($_SESSION['permisos']['domicilios']['acceso']) or isset($_SESSION['permisos']['datosfiscales']['acceso'])){
                    ?>
                     <li class="treeview <?php echo checarLink("n1","almacen"); ?>">
                      <a href="#">
                        <i class="fa fa-cubes"></i> <span>Almacén</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">


                     </ul><!-- fin de ul almacén -->
                    </li> <!-- fin de li almacén -->
                    <?php }?>


                  <!-- Inicio de Bloque catálogos -->
					<?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['clientes']['acceso']) or isset($_SESSION['permisos']['domicilios']['acceso']) or isset($_SESSION['permisos']['datosfiscales']['acceso'])){
                    ?>
                     <li class="treeview <?php echo checarLink("n1","catalogos"); ?>">
                      <a href="#">
                        <i class="fa fa-book"></i> <span>Catálogos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">


                    <li class="treeview <?php echo checarLink("n2","clientes"); ?>">
                      <a href="#">
                        <i class="fa fa-users"></i> <span>Clientes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">


                          <!-- Inicio de Bloque de Clientes -->
            <?php
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['clientes']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n3","clientes"); ?>">
              <a href="#">
                <i class="fa fa-users" style="color:#7d77d0"></i> <span>Clientes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['clientes']['guardar'])){
				?>
                <li class="<?php echo checarLink("n4","nuevoclientes"); ?>">
                <a href="../../../modulos/clientes/nuevo/nuevo.php?n1=catalogos&n2=clientes&n3=clientes&n4=nuevoclientes"><i class="fa fa-circle-o text-green"></i> Nuevo cliente</a></li>
                <?php }?>

                <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['clientes']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n4","consultarclientes"); ?>">
                  <a href="../../../modulos/clientes/consultar/vista.php?n1=catalogos&n2=clientes&n3=clientes&n4=consultarclientes"><i class="fa fa-circle-o text-red"></i> Consultar clientes</i></a>
                </li>
                 <?php }?>
                  <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['clientes']['papelera'])){
			  	?>
                <li class="<?php echo checarLink("n4","papeleraclientes"); ?>">
                  <a href="../../../modulos/clientes/consultar/vista.php?n1=catalogos&n2=clientes&n3=clientes&n4=papeleraclientes&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de clientes</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Clientes -->

             <!-- Inicio de Bloque de Datosfiscales -->
                        <?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['datosfiscales']['acceso'])){
                        ?>
                        <li class="<?php echo checarLink("n3","datosfiscales"); ?>">
                          <a href="#"><i class="fa fa-key"></i> Domiclios fiscales <i class="fa fa-angle-left pull-right"></i></a>
                          <ul class="treeview-menu">

                            <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['datosfiscales']['consultar'])){
                            ?>
                            <li class="<?php echo checarLink("n4","consultardatosfiscales"); ?>"><a href="../../../modulos/datosfiscales/consultar/vista.php?n1=catalogos&n2=clientes&n3=datosfiscales&n4=consultardatosfiscales"><i class="fa fa-circle-o text-red"></i> Consultar domicilios</a></li>
                            <?php }?>

                             <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['datosfiscales']['papelera'])){
                            ?>
                            <li class="<?php echo checarLink("n4","papeleradatosfiscales"); ?>"><a href="../../../modulos/datosfiscales/consultar/vista.php?n1=catalogos&n2=clientes&n3=datosfiscales&n4=papeleradatosfiscales&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera</a></li>
                            <?php }?>
                          </ul>
                        </li>
                        <?php }?>



                        </ul><!-- fin de ul clientes -->
                    </li> <!-- fin de li clientes -->


                    <!-- Inicio de Bloque de Aditivos -->
            <?php
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['aditivos']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n2","aditivos"); ?>">
              <a href="#">
                <i class="fa fa-eyedropper" style="color:#5fac53"></i> <span>Aditivos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['aditivos']['guardar'])){
				?>
                <li class="<?php echo checarLink("n3","nuevoaditivos"); ?>">
                <a href="../../../modulos/aditivos/nuevo/nuevo.php?n1=catalogos&n2=aditivos&n3=nuevoaditivos"><i class="fa fa-circle-o text-green"></i> Nueva aditivo</a></li>
                <?php }?>

                <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['aditivos']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n3","consultaraditivos"); ?>">
                  <a href="../../../modulos/aditivos/consultar/vista.php?n1=catalogos&n2=aditivos&n3=consultaraditivos"><i class="fa fa-circle-o text-red"></i> Consultar aditivos</i></a>
                </li>
                 <?php }?>
                  <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['aditivos']['papelera'])){
			  	?>
                <li class="<?php echo checarLink("n3","papeleraaditivos"); ?>">
                  <a href="../../../modulos/aditivos/consultar/vista.php?n1=catalogos&n2=aditivos&n3=papeleraaditivos&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de aditivos</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Aditivos -->

            <!-- Inicio de Bloque de Choferes -->
            <?php
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['choferes']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n2","choferes"); ?>">
              <a href="#">
                <i class="fa fa-car" style="color:#ba2e38"></i> <span>Choferes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['choferes']['guardar'])){
				?>
                <li class="<?php echo checarLink("n3","nuevochoferes"); ?>">
                <a href="../../../modulos/choferes/nuevo/nuevo.php?n1=catalogos&n2=choferes&n3=nuevochoferes"><i class="fa fa-circle-o text-green"></i> Nuevo chofer</a></li>
                <?php }?>

                <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['choferes']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n3","consultarchoferes"); ?>">
                  <a href="../../../modulos/choferes/consultar/vista.php?n1=catalogos&n2=choferes&n3=consultarchoferes"><i class="fa fa-circle-o text-red"></i> Consultar choferes</i></a>
                </li>
                 <?php }?>
                  <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['choferes']['papelera'])){
			  	?>
                <li class="<?php echo checarLink("n3","papelerachoferes"); ?>">
                  <a href="../../../modulos/choferes/consultar/vista.php?n1=catalogos&n2=choferes&n3=papelerachoferes&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de choferes</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Choferes -->


<!-- Inicio de Bloque -->
						<?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['empleados']['acceso'])){
                        ?>
                        <li class="treeview <?php echo checarLink("n2","empleados"); ?>">
                          <a href="#">
                            <i class="fa fa-male"></i> <span>Empleados</span>
                            <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="treeview-menu">
                            <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['empleados']['guardar'])){
                            ?>
                            <li class="<?php echo checarLink("n3","nuevoempleados"); ?>">
                            <a href="../../../modulos/empleados/nuevo/nuevo.php?n1=catalogos&n2=empleados&n3=nuevoempleados"><i class="fa fa-circle-o text-green"></i> Nuevo empleado</a></li>
                            <?php }?>
                            <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['empleados']['consultar'])){
                            ?>
                            <li class="<?php echo checarLink("n3","consultarempleados"); ?>">
                              <a href="../../../modulos/empleados/consultar/vista.php?n1=catalogos&n2=empleados&n3=consultarempleados"><i class="fa fa-circle-o text-red"></i> Consultar empleados</i></a>
                            </li>
                            <?php }?>
                            <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['empleados']['papelera'])){
                            ?>
                            <li class="<?php echo checarLink("n3","papeleraempleados"); ?>">
                              <a href="../../../modulos/empleados/consultar/vista.php?n1=catalogos&n2=empleados&n3=papeleraempleados&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de empleados</i></a>
                            </li>
                             <?php }?>
                          </ul>
                        </li>
                        <?php }?>
                        <!-- fin de empleados -->

                        <!-- Inicio de Bloque de Productos -->
            <?php
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['productos']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n2","productos"); ?>">
              <a href="#">
                <i class="fa fa-cubes" style="color:#cccc00"></i> <span>Productos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['productos']['guardar'])){
				?>
                <li class="<?php echo checarLink("n3","nuevoproductos"); ?>">
                <a href="../../../modulos/productos/nuevo/nuevo.php?n1=catalogos&n2=productos&n3=nuevoproductos"><i class="fa fa-circle-o text-green"></i> Nuevo producto</a></li>
                <?php }?>

                <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['productos']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n3","consultarproductos"); ?>">
                  <a href="../../../modulos/productos/consultar/vista.php?n1=catalogos&n2=productos&n3=consultarproductos"><i class="fa fa-circle-o text-red"></i> Consultar productos</i></a>
                </li>
                 <?php }?>
                  <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['productos']['papelera'])){
			  	?>
                <li class="<?php echo checarLink("n3","papeleraproductos"); ?>">
                  <a href="../../../modulos/productos/consultar/vista.php?n1=catalogos&n2=productos&n3=papeleraproductos&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de productos</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Productos -->

            <!-- Inicio de Bloque de Resistencia -->
            <?php
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['resistencia']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n2","resistencia"); ?>">
              <a href="#">
                <i class="fa fa-certificate" style="color:#188305"></i> <span>Resistencia</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['resistencia']['guardar'])){
				?>
                <li class="<?php echo checarLink("n3","nuevoresistencia"); ?>">
                <a href="../../../modulos/resistencia/nuevo/nuevo.php?n1=catalogos&n2=resistencia&n3=nuevoresistencia"><i class="fa fa-circle-o text-green"></i> Nueva resistencia</a></li>
                <?php }?>

                <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['resistencia']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n3","consultarresistencia"); ?>">
                  <a href="../../../modulos/resistencia/consultar/vista.php?n1=catalogos&n2=resistencia&n3=consultarresistencia"><i class="fa fa-circle-o text-red"></i> Consultar resistencia</i></a>
                </li>
                 <?php }?>
                  <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['resistencia']['papelera'])){
			  	?>
                <li class="<?php echo checarLink("n3","papeleraresistencia"); ?>">
                  <a href="../../../modulos/resistencia/consultar/vista.php?n1=catalogos&n2=resistencia&n3=papeleraresistencia&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de resistencia</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Resistencia -->

            <!-- Inicio de Bloque de Revolvedora -->
            <?php
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['revolvedora']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n2","revolvedora"); ?>">
              <a href="#">
                <i class="fa fa-bus" style="color:#0c28af"></i> <span>Revolvedora</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['revolvedora']['guardar'])){
				?>
                <li class="<?php echo checarLink("n3","nuevorevolvedora"); ?>">
                <a href="../../../modulos/revolvedora/nuevo/nuevo.php?n1=catalogos&n2=revolvedora&n3=nuevorevolvedora"><i class="fa fa-circle-o text-green"></i> Nueva revolvedora</a></li>
                <?php }?>

                <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['revolvedora']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n3","consultarrevolvedora"); ?>">
                  <a href="../../../modulos/revolvedora/consultar/vista.php?n1=catalogos&n2=revolvedora&n3=consultarrevolvedora"><i class="fa fa-circle-o text-red"></i> Consultar revolvedora</i></a>
                </li>
                 <?php }?>
                  <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['revolvedora']['papelera'])){
			  	?>
                <li class="<?php echo checarLink("n3","papelerarevolvedora"); ?>">
                  <a href="../../../modulos/revolvedora/consultar/vista.php?n1=catalogos&n2=revolvedora&n3=papelerarevolvedora&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de revolvedora</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Revolvedora -->

            <!-- Inicio de Bloque de Vendedores -->
            <?php
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['vendedores']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n2","vendedores"); ?>">
              <a href="#">
                <i class="fa fa-user-secret" style="color:#2fbdd7"></i> <span>Vendedores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['vendedores']['guardar'])){
				?>
                <li class="<?php echo checarLink("n3","nuevovendedores"); ?>">
                <a href="../../../modulos/vendedores/nuevo/nuevo.php?n1=catalogos&n2=vendedores&n3=nuevovendedores"><i class="fa fa-circle-o text-green"></i> Nuevo vendedor</a></li>
                <?php }?>

                <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['vendedores']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n3","consultarvendedores"); ?>">
                  <a href="../../../modulos/vendedores/consultar/vista.php?n1=catalogos&n2=vendedores&n3=consultarvendedores"><i class="fa fa-circle-o text-red"></i> Consultar vendedores</i></a>
                </li>
                 <?php }?>
                  <?php
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['vendedores']['papelera'])){
			  	?>
                <li class="<?php echo checarLink("n3","papeleravendedores"); ?>">
                  <a href="../../../modulos/vendedores/consultar/vista.php?n1=catalogos&n2=vendedores&n3=papeleravendedores&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de vendedores</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Vendedores -->






                       </ul><!-- fin de ul catálogos -->
                    </li> <!-- fin de li catálogos -->
                    <?php }?>


                   <!-- Inicio de Bloque Utilerias -->
					<?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['clientes']['acceso']) or isset($_SESSION['permisos']['domicilios']['acceso']) or isset($_SESSION['permisos']['datosfiscales']['acceso'])){
                    ?>
                     <li class="treeview <?php echo checarLink("n1","utilerias"); ?>">
                      <a href="#">
                        <i class="fa fa-thumbs-up"></i> <span>Utilerias</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">




                     </ul><!-- fin de ul utilerías -->
                    </li> <!-- fin de li utilerias -->
                    <?php }?>


                       <!-- Inicio de Bloque Reportes -->
					<?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['clientes']['acceso']) or isset($_SESSION['permisos']['domicilios']['acceso']) or isset($_SESSION['permisos']['datosfiscales']['acceso'])){
                    ?>
                     <li class="treeview <?php echo checarLink("n1","reporte"); ?>">
                      <a href="#">
                        <i class="fa fa-calculator"></i> <span>Reportes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">


                     </ul><!-- fin de ul reportes -->
                    </li> <!-- fin de li resportes -->
                    <?php }?>






                    <li class="treeview <?php echo checarLink("n1","configuracion"); ?>">
                      <a href="#">
                        <i class="fa fa-cog"></i> <span>Configuración</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">


                         <!-- Inicio de Bloque cuentas de usuarios-->
						<?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['usuarios']['acceso']) or isset($_SESSION['permisos']['perfiles']['acceso'])){
                        ?>
                        <li class="treeview <?php echo checarLink("n2","usuarios"); ?>">
                          <a href="#">
                            <i class="fa fa-users"></i> <span>Cuentas de usuarios</span>
                            <i class="fa fa-angle-left pull-right"></i>
                          </a>

                          <ul class="treeview-menu">
                            <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['usuarios']['acceso'])){
                            ?>
                            <li class="<?php echo checarLink("n3","usuarios"); ?>">
                              <a href="#"><i class="fa fa-child"></i> Usuarios <i class="fa fa-angle-left pull-right"></i></a>
                              <ul class="treeview-menu">
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['usuarios']['guardar'])){
                                ?>
                                <li class="<?php echo checarLink("n4","nuevousuario"); ?>"><a href="../../../modulos/usuarios/nuevo/nuevo.php?n1=configuracion&n2=usuarios&n3=usuarios&n4=nuevousuario"><i class="fa fa-circle-o text-green"></i> Nuevo usuario</a></li>
                                <?php }?>
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['usuarios']['consultar'])){
                                ?>
                                <li class="<?php echo checarLink("n4","consultarusuarios"); ?>"><a href="../../../modulos/usuarios/consultar/vista.php?n1=configuracion&n2=usuarios&n3=usuarios&n4=consultarusuarios"><i class="fa fa-circle-o text-red"></i> Consultar usuarios</a></li>
                                <?php }?>
                              </ul>
                            </li>
                            <?php }?>
                            <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['perfiles']['acceso'])){
                            ?>
                            <li class="<?php echo checarLink("n3","perfiles"); ?>">
                              <a href="#"><i class="fa fa-key"></i> Perfiles <i class="fa fa-angle-left pull-right"></i></a>
                              <ul class="treeview-menu">
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['perfiles']['guardar'])){
                                ?>
                                <li class="<?php echo checarLink("n4","nuevoperfil"); ?>"><a href="../../../modulos/perfiles/nuevo/nuevo.php?n1=configuracion&n2=usuarios&n3=perfiles&n4=nuevoperfil"><i class="fa fa-circle-o text-green"></i> Nuevo perfil</a></li>
                                <?php }?>
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['perfiles']['consultar'])){
                                ?>
                                <li class="<?php echo checarLink("n4","consultarperfiles"); ?>"><a href="../../../modulos/perfiles/consultar/vista.php?n1=configuracion&n2=usuarios&n3=perfiles&n4=consultarperfiles"><i class="fa fa-circle-o text-red"></i> Consultar perfiles</a></li>
                                <?php }?>
                              </ul>
                            </li>
                            <?php }?>
                          </ul>
                        </li>
                        <?php }?>
                      <!-- fin de cuentas de usuario -->


                            <!-- Inicio de Bloque de Empresa -->
							<?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['empresa']['acceso'])){
                            ?>
                            <li class="treeview <?php echo checarLink("n2","empresa"); ?>">
                              <a href="#">
                                <i class="fa fa-building" style="color:#414141"></i> <span>Empresa</span>
                                <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['empresa']['guardar'])){
                                ?>
                                <li class="<?php echo checarLink("n3","nuevoempresa"); ?>">
                                <a href="../../../modulos/empresa/nuevo/nuevo.php?n1=configuracion&n2=empresa&n3=nuevoempresa"><i class="fa fa-circle-o text-green"></i> Nueva empresa</a></li>
                                <?php }?>

                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['empresa']['consultar'])){
                                ?>
                                <li class="<?php echo checarLink("n3","consultarempresa"); ?>">
                                  <a href="../../../modulos/empresa/consultar/vista.php?n1=configuracion&n2=empresa&n3=consultarempresa"><i class="fa fa-circle-o text-red"></i> Consultar empresa</i></a>
                                </li>
                                 <?php }?>
                                  <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['empresa']['papelera'])){
                                ?>
                                <li class="<?php echo checarLink("n3","papeleraempresa"); ?>">
                                  <a href="../../../modulos/empresa/consultar/vista.php?n1=configuracion&n2=empresa&n3=papeleraempresa&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de empresa</i></a>
                                </li>
                                 <?php }?>
                              </ul>
                            </li>
                            <?php }?>
                            <!-- Fin de Bloque de Empresa -->


                             <!-- Inicio de Bloque de Cuentascorreo -->
							<?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['cuentascorreo']['acceso'])){
                            ?>
                            <li class="treeview <?php echo checarLink("n2","cuentascorreo"); ?>">
                              <a href="#">
                                <i class="fa fa-envelope-square" style="color:#243aa4"></i> <span>Cuentas de correo</span>
                                <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['cuentascorreo']['guardar'])){
                                ?>
                                <li class="<?php echo checarLink("n3","nuevocuentascorreo"); ?>">
                                <a href="../../../modulos/cuentascorreo/nuevo/nuevo.php?n1=configuracion&n2=cuentascorreo&n3=nuevocuentascorreo"><i class="fa fa-circle-o text-green"></i> Nueva cuenta</a></li>
                                <?php }?>

                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['cuentascorreo']['consultar'])){
                                ?>
                                <li class="<?php echo checarLink("n3","consultarcuentascorreo"); ?>">
                                  <a href="../../../modulos/cuentascorreo/consultar/vista.php?n1=configuracion&n2=cuentascorreo&n3=consultarcuentascorreo"><i class="fa fa-circle-o text-red"></i> Consultar cuentas</i></a>
                                </li>
                                 <?php }?>
                                  <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['cuentascorreo']['papelera'])){
                                ?>
                                <li class="<?php echo checarLink("n3","papeleracuentascorreo"); ?>">
                                  <a href="../../../modulos/cuentascorreo/consultar/vista.php?n1=configuracion&n2=cuentascorreo&n3=papeleracuentascorreo&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de cuentas</i></a>
                                </li>
                                 <?php }?>
                              </ul>
                            </li>
                            <?php }?>
                            <!-- Fin de Bloque de Cuentascorreo -->


                                <!-- Inicio de Bloque -->
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['plantillasmensajes']['acceso'])){
                                ?>
                                <li class="<?php echo checarLink("n2","plantillasmensajes"); ?>">
                                  <a href="#"><i class="fa fa-newspaper-o"></i> Plantillas de correo <i class="fa fa-angle-left pull-right"></i></a>
                                  <ul class="treeview-menu">
                                    <?php
                                    /////PERMISOS////////////////
                                    if (isset($_SESSION['permisos']['plantillasmensajes']['guardar'])){
                                    ?>
                                    <li class="<?php echo checarLink("n3","nuevoplantillasmensajes"); ?>">
                                    <a href="../../../modulos/plantillasmensajes/nuevo/nuevo.php?n1=configuracion&n2=plantillasmensajes&n3=nuevoplantillasmensajes"><i class="fa fa-circle-o text-green"></i> Nueva plantilla</a></li>
                                    </li>
                                    <?php }?>
                                    <?php
                                    /////PERMISOS////////////////
                                    if (isset($_SESSION['permisos']['plantillasmensajes']['consultar'])){
                                    ?>
                                    <li class="<?php echo checarLink("n3","consultarplantillasmensajes"); ?>">
                                    <a href="../../../modulos/plantillasmensajes/consultar/vista.php?n1=configuracion&n2=plantillasmensajes&n3=consultarplantillasmensajes"><i class="fa fa-circle-o text-red"></i> Ver plantillas</i></a>
                                    </li>
                                    <?php }?>

                                  </ul>
                                </li>
                                <?php }?>


                    <!-- Inicio de Bloque -->
                    <?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['reportes']['acceso'])){
                    ?>
                    <li class="treeview <?php echo checarLink("n1","reportes"); ?>">
                      <a href="#">
                        <i class="fa fa-files-o" style="color:#5095AB"></i> <span>Reportes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">

                        <?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['bitacoracontrol']['acceso'])){
                        ?>
                        <li class="<?php echo checarLink("n2","bitacoras"); ?>">
                        <a href="../../../modulos/reportes/bitacoras/vista.php?n1=reportes&n2=bitacoras"><i class="fa fa-history text-red"></i> Bitácora</a></li>
                        </i>
                        <?php }?>
                      </ul>
                    </li>
                    <?php }?>



                    <!-- Inicio de Bloque -->
                    <?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['configuracion']['acceso'])){
                    ?>
                    <li class="treeview <?php echo checarLink("n1","configuracion"); ?>">
                      <a href="#">
                        <i class="fa fa-gear"></i> <span>Ajustes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['configuracion']['modificar'])){
                        ?>
                        <li class="<?php echo checarLink("n2","configuracion"); ?>">
                            <a href="../../../modulos/configuracion/modificar/actualizar.php?n1=configuracion&n2=configuracion"><i class="fa fa-wrench text-yellow"></i> <span>Configuración</span></a>
                        </i>
                        <?php
                        }?>

                        <?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['configuracion']['sincronizar'])){
                        ?>
                        <li class="<?php echo checarLink("n2","sincronizar"); ?>">
                            <a href="../../../modulos/configuracion/copiaseguridad/sincronizar.php?n1=configuracion&n2=sincronizar"><i class="fa fa-refresh text-green"></i> <span>Respaldar</span></a>
                        </i>
                        <?php
                        }?>

                      </ul>
                    </li>
                    <?php }?>

                      </ul><!-- fin de ul Configuración -->
                    </li> <!-- fin de li Configuración-->


                      <!-- Inicio de Bloque Ayuda -->
					<?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['clientes']['acceso']) or isset($_SESSION['permisos']['domicilios']['acceso']) or isset($_SESSION['permisos']['datosfiscales']['acceso'])){
                    ?>
                     <li class="treeview <?php echo checarLink("n1","ayuda"); ?>">
                      <a href="#">
                        <i class="fa fa-life-ring"></i> <span>Ayuda</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">


                     </ul><!-- fin de ul ayuda -->
                    </li> <!-- fin de li ayua -->
                    <?php }?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->
