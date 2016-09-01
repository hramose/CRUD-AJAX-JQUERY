<?php
// Omitir errores
ini_set("display_errors", false);
// Incluimos nustro script php de funciones y conexión a la base de datos
include('includes/mainFunctions.inc.php');
if($errorDbConexion == false){
	// MAnda a llamar la función para mostrar la lista de usuarios
	$consultaUsuarios = consultaUsers($mysqli);
}
else
{
	// Regresa error en la base de datos
	$consultaUsuarios = '
		<tr id="sinDatos">
				<td colspan="5" class="centerTXT">ERROR AL CONECTAR CON LA BASE DE DATOS</td>
		</tr>
	';
}
?>
<!DOCTYPE html>

<html lang="es">
	
	<head>
		<title>Uso de usuarios</title>
		<meta charset="utf-8" />
		<link type="text/css" href="css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
		<link type="text/css" href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link type="text/css" href="css/master.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery_ui/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="js/jquery_ui/jquery-ui-1.8.23.custom.min.js"></script>
		<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery-validation-1.10.0/dist/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/jquery-validation-1.10.0/lib/jquery.metadata.js"></script>
		<script type="text/javascript" src="js/jquery-validation-1.10.0/localization/messages_es.js"></script>
		<script type="text/javascript" src="js/mainJavaScript.js"></script>
	</head>
	<body>
		<div class="hide" id="agregarUser" Title="Agregar Producto">
			<form action="" method="post" id="formUsers" name="formUsers">
				<fieldset id="ocultos">
					<input type="hidden" id="accion" name="accion" class="{required:true}"/>
					<input type="hidden" id="id_user" name="id_user" class="{required:true}" value="0"/>
				</fieldset>
				<fieldset id="datosUser">
					<p>NOMBRE DEL OPERADOR:</p>
					<span></span>
					<input type="text" id="usr_nombre" name="usr_nombre" placeholder="Nombre Completo" class="span3"/>
					<p>USER:</p>
					<span></span>
					<input type="text" id="usr_puesto" name="usr_puesto" placeholder="Codigo de Usuario" class="{required:true,maxlength:80} span3"/>
					<p>PASSWORD:</p>
					<span></span>
					<input type="text" id="usr_nick" name="usr_nick" placeholder="Password" class="{required:true,maxlength:25} span3"/>
					<p>ESTADO:</p>
					<span></span>
					<select id="usr_status" name="usr_status" class="{required:true} span3">
						<option value="">Seleccione Una Opción</option>
						<option value="Activo">Activo</option>
						<option value="Suspendido">Suspendido</option>
					</select>
					<fieldset id="btnAgregar" style="text-align:center;"><br>
						<input type="submit" id="continuar" value="Continuar" class="btn btn-success" />
					</fieldset>
					<fieldset id="ajaxLoader" class="ajaxLoader hide">
						<img src="images/default-loader.gif">
						<p>Espere un momento...</p>
					</fieldset>
				</form>
			</div>
			<div id="dialog-borrar" title="Eliminar registro" class="hide">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Este registro se borrará de forma permanente. ¿Esta seguro?</p>
			</div>
			
			<div id="wraper">
				<section id="content">
					<div id="btnAddUser" class="center addUser">
						<button id="goNuevoUser" class="btn btn-inverse btn-small"><i class="icon-plus"></i> Agregar Operador</button>
					</div>
					<div id="listaOrganizadores">
						<table id="listadoUsers" class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th>NOMBRE DEL OPERADOR</th>
									<th>USER</th>
									<th>PASSWORD</th>
									<th>ESTADO</th>
									<th>OPERACIONES</th>
								</tr>
							</thead>
							<tbody id="listaUsuariosOK">
								<?php echo $consultaUsuarios ?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
			<footer>
				ASAF MEXICO S.A DE C.V
			</footer>
		</body>
	</html>