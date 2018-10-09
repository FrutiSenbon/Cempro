<?php
//Funciones disponibles para la entidad clientes
$entorno="
email/Email|
	acceso:Acceso al modulo de correo electronico,
	guardar:Permitir el envio de correo electronico

@perfiles/Perfiles|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	cancelar:Cancelar apartados,
	modificar:Modificar registros
@usuarios/Usuarios|
	acceso:Acceso al modulo de usuarios,
	guardar:Permitir crear nuevos usuarios,
	eliminar:Permitir eliminar usuarios,
	consultar:Consultar lista de usuarios,
	modificar:Permitir modificar los datos de los usuarios,
	bloquear:Permitir bloquear usuarios,
	email:Permitir enviar correos electrónicos
@datosfiscales/Datosfiscales|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@aditivos/Aditivos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@choferes/Choferes|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@programacion/Programacion|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@empleados/Empleados|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@resistencia/Resistencia|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@revolvedora/Revolvedora|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@productos/Productos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@vendedores/Vendedores|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@clientes/Clientes|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@empresa/Empresa|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@cuentascorreo/Cuentascorreo|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
";


$entorno= str_replace("\r","",$entorno);
$entorno= str_replace("\t","",$entorno);
$entorno= str_replace("\n","",$entorno);
?>
