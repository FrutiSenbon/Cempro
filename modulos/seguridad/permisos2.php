<?php
//Funciones disponibles para la entidad clientes
$entorno="
empresa/Empresas|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@almacenes/Sucursales|
	acceso:Acceso al modulo,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@caja/Caja|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	consultageneral:Mostrar cortes de caja generales,
	modificar:Modificar registros
@conceptosentradas/Conceptos de entradas de efectivo|
	acceso:Acceso al modulo,
	guardar:Registrar nuevos conceptos,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@entradas/Entradas de efectivo|
	acceso:Acceso al modulo,
	guardar:Registrar entradas de efectivo,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@conceptossalidas/Conceptos de salidas de efectivo|
	acceso:Acceso al modulo,
	guardar:Registrar nuevos conceptos,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@salidas/Salidas de efectivo|
	acceso:Acceso al modulo,
	guardar:Registrar salidas de efectivo,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@ventas/Ventas|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	modificarprecio:Modificar precio de venta,
	modificarfecha:Modificar fecha de venta,
	papelera:Acceso a la papelera de registros
@devoluciones/Devoluciones sobre venta|
	acceso:Acceso al modulo,
	guardar:Guardar nuevas devoluciones,
	guardarcambios:Guardar nuevos cambios de productos,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@ventasajuste/Ventas de Ajuste|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@pagos/Pagos y Cobranza|
	acceso:Acceso al modulo,
	guardar:Registrar pagos,
	eliminar:Eliminar pagos,
	consultar:Consultar registros,
	modificar:Modificar pagos
@saldosafavor/Saldos a Favor|
	acceso:Acceso al modulo,
	guardar:Registrar pagos,
	eliminar:Eliminar pagos,
	consultar:Consultar registros,
	modificar:Modificar saldos
@empleados/Empleados|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@clientes/Clientes|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	modificarcredito:Modificar saldo y limite de credito de los clientes,
	papelera:Acceso a la papelera de registros
@personas/Personas - Datos Fiscales|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@captacion/Metodos de captacion de clientes|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@movimientos/Movimientos de almacen|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	nuevaentrada:Registrar entradas de mercancia,
	nuevasalida:Registrar salidas de mercancia,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@productos/Productos|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	manipularprecios:Alterar los precios de los productos,
	papelera:Acceso a la papelera de registros
@perfiles/Perfiles|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	cancelar:Cancelar apartados,
	modificar:Modificar registros
@unidades/Unidades de medida|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@marcas/Marcas|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@tallas/Tallas|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@categorias/Categorias|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@listasprecios/Listas de precios|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	papelera:Tener acceso a la papelera de datos eliminados,
	consultar:Consultar registros,
	modificar:Modificar registros
@inventario/Inventario|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	papelera:Tener acceso a la papelera de datos eliminados,
	consultar:Consultar registros,
	consultarkardex:Consultar historiral de kardex,
	consultarrastreador:Permitir consultar el rastreador de productos,
	cambiarubicacion:Modificar stock y ubicaciones,
	modificar:Modificar inventario
@reportes/Reportes|
	acceso:Acceso al modulo,
	generalventas:Reporte General de Ventas,
	generalinventario:Reporte General de Inventarios,
	generalturnos:Reporte General de Cierres de Turnos
@configuracion/Configuracion|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	modificar:Modificar registros,
	sincronizar:Sincronizar bases de datos,
	consultar:Consultar registros
@bitacoracontrol/Bitacora de control|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	cambioprecios:Mostrar bitacora de cambio de precios,
	cambiocredito:Mostrar bitacora de cambio de credito de los clientes
@usuarios/Usuarios|
	acceso:Acceso al modulo de usuarios,
	guardar:Permitir crear nuevos usuarios,
	eliminar:Permitir eliminar usuarios,
	consultar:Consultar lista de usuarios,
	modificar:Permitir modificar los datos de los usuarios,
	bloquear:Permitir bloquear usuarios,
	email:Permitir enviar correos electrónicos";


$entorno= str_replace("\r","",$entorno);
$entorno= str_replace("\t","",$entorno);
$entorno= str_replace("\n","",$entorno);
?>