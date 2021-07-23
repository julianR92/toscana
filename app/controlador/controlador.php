<?php
header("Content-Type: text/html; charset=utf-8");
/**
Software:        Tu talento es lo que vale
Dependencia:     Despacho alcalde
Desarrolladores: Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2019
Oficina asesora de despacho OATIC
**/

/**
Controlador que me permite realizar el llamado de clases y crear objetos de la misma segun las funciones que se reuqiera utilizar
**/
require_once("../Frame/Header.htm");


/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/


if(isset($_POST["Boton"])){
	
	$Archivo = $_POST["Archivo"];
	$Clase   = $_POST["Clase"];
	$Funcion = $_POST["Funcion"];

	include_once("../_clases/".$Archivo.".php");
	$Objeto = new $Clase($_POST);
	$Objeto->$Funcion();

}elseif(isset($_GET["Parametro"])){
	
	$Archivo = $_GET["A"];
	$Clase   = $_GET["C"];
	$Funcion = $_GET["F"];

	include_once("../_clases/".$Archivo.".php");
	$Objeto = new $Clase($_GET);
	$Objeto->$Funcion();
# parametro GET SIRVE PARA PARA RECIBIR UN PARAMETRO DE LA CLASE APLICARoferta y enviar un correo 
}elseif(isset($_GET["ParametroID"])){ 
	
	$Archivo = $_GET["A"];
	$Clase   = $_GET["C"];
	$Funcion = $_GET["F"];

	include_once("../_clases/".$Archivo.".php");
	$Objeto = new $Clase($_GET);
	$Objeto->$Funcion();
}

require_once("../Frame/Footer.htm");
?>
