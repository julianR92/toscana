<?php
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2020
@copyrigth
**/





include_once("../Frame/Header.htm");
require_once("../Motordb/Permisos.php");
//require_once("../Motordb/Procedimientos.php");

?>
<meta charset="utf-8" /> 
 <body onload="startTime()">
<header class="main-header" style="background-color: transparent;">
	<div id="cajauser" align="left">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="hidden-xs">
				<b style="color:#fff;"></b>
				<b style="color:#fff;"><?php UsuRol()?>:&#160&#160&#160&#160&#160<?php UsuNom()?> <?php UsuApe()?></b><br>
				<b style="color:#fff;">Ultima Sesión: <?php UltimaSession()?></b>
				<b style="color:#fff;"><br><?php echo "Hora local:";?> <b id="clock">&#160&#160&</b></b>
				
			</span>
		</a>
	</div>
	<nav class="navbar navbar-static-top" role="navigation" style="background-color: transparent;">
		<!-- Botón de navegación -->
		<div style="padding-top:15px;">
			<a id="sidebar-toggle" href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Toggle navigation</span></a>
		</div>
		<!-- perfil de usuario -->
		<div class="navbar-custom-menu jp_navi_right_btn_wrapper">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<!--<a href="../Externo/Login.php"><i class="fa fa-sign-in"></i>&nbsp; Ingresar</a>-->
				</li>
			</ul>
		</div>
	</nav>
</header>

<!--Aside-->
<aside id="aside" class="main-sidebar">
	<div style="height:60px;"></div>
	<section class="sidebar">
		<ul class="sidebar-menu">

			<li class="active">
				<form method="post" action="../controlador/controlador.php">
					<input type="hidden" name="Archivo" value="Main">
					<input type="hidden" name="Clase" value="Main">
					<input type="hidden" name="Funcion" value="HomeSistem">
					<input type="hidden" name="MP00" value="MP00">
					<a id="aMenu" href="#">
						<img style="width:22px;padding-bottom:10px;" src="../Frame/library/bower_components/Ionicons/png/512/ios7-home.png">
						<span style="color: black;"><button type="submit" name="Boton" id="BotonMAP" value="Boton" class="FuenteExtra">Página inicial</button></span>
					</a>
					<?php if ($_GET["MAP"] === "Retroceso"){ ?>
						<script type="text/javascript">document.getElementById('BotonMAP').click();</script><?php } ?>
				</form>
			</li>


			<li>
				<form method="post" action="../controlador/controlador.php"<?php permission(['DESARROLLADOR','ADMIN'])?>>
					<input type="hidden" name="Archivo" value="Usuarios">
					<input type="hidden" name="Clase" value="Usuarios">
					<input type="hidden" name="Funcion" value="ListarUsuarios">
					<input type="hidden" name="US14" value="<?php UsuRol();?>">
					<input type="hidden" name="US01" value="<?php ClienteId();?>">
					<input type="hidden" name="US15" value="true">
					<a id="aMenu" href="#">
						<img style="width:22px;" src="../Frame/library/bower_components/Ionicons/png/512/android-user-menu.png">
						<span id="spanMenu"><button type="submit" name="Boton" id="BotonUSU" value="Boton" class="FuenteExtra">Admin Usuarios</button></span>
					</a>
					<?php if ($_GET["USU"] === "Retroceso"){ ?>
						<script type="text/javascript">document.getElementById('BotonUSU').click();</script><?php } ?>
				</form>
			</li>

			<li>
				<form method="post" action="../controlador/controlador.php"<?php permission(['DESARROLLADOR','ADMIN', 'TECNICO'])?>>
					<input type="hidden" name="Archivo" value="Reservas">
					<input type="hidden" name="Clase" value="Reservas">
					<input type="hidden" name="Funcion" value="listarReservas">
					<input type="hidden" name="RV00" value="<?php UsuRol();?>">
					<input type="hidden" name="RV14" value="true">
					<a id="aMenu" href="#">
						<img style="width:22px;" src="../Frame/library/bower_components/Ionicons/png/512/beer.png">
						<span id="spanMenu"><button type="submit" name="Boton" id="BotonADR" value="Boton" class="FuenteExtra">Admin Reservas</button></span>
					</a>
					<?php if ($_GET["ADR"] === "Retroceso"){ ?>
						<script type="text/javascript">document.getElementById('BotonADR').click();</script><?php } ?>
				</form>
			</li>

			<li>
				<a name="Boton" id="BotonCerrarSesion" target="_blank" href="../_clases/Guia rapida gestion de reservas La Toscana.pdf">
					<img style="width:28px; padding-left: 10px;" src="../Frame/library/bower_components/Ionicons/png/512/android-book.png">&#160&#160&#160
					<span id="spanMenu">Manual de usuario</span></a>
				</form>
			</li>

			<li>
				<form method="post" action="../controlador/controlador.php">
					<input type="hidden" name="Archivo" value="Sesion">
					<input type="hidden" name="Clase" value="Sesion">
					<input type="hidden" name="Funcion" value="Logout">
					<input type="hidden" name="CS00" value="<?php User()?>">
					<a id="aMenu" href="#">
						<img style="width:28px;" src="../Frame/library/bower_components/Ionicons/png/512/log-out.png">
						<span id="spanMenu"><button type="submit" name="Boton" id="BotonCerrarSesion" value="Boton" class="FuenteExtra">Cerrar Sesión</button></span>
					</a>
				</form>
			</li>
		</ul>
	</section>
</aside>
</body>
<?php
include_once("../Frame/Footer.htm");
?> 
<script>
/*window.onload =  function() {
  inactivityTime(); 
  startTime();
}*/

function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    //Add a zero in front of numbers<10
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
</script>  