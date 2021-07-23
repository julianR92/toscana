<?php
/**
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
**/

include_once("../Motordb/conexiondb.php");
$Parametro = $_POST["Parametro"];
$Campos = "SELECT U.UsuNumDoc, U.IdUsuario FROM `usuarios` as U WHERE U.UsuNumDoc='$Parametro'";

$QueryCampos = mysqli_query($conexion,$Campos);
$QueryCount  = mysqli_num_rows($QueryCampos);

if ($QueryCount>0) {

	     echo "<script>alert('El Usuario $Parametro ya se encuentra registrado en el sistema');</script>";
         echo "<script>window.location.href='../Forms/MenuPrincipal.php?MAP=Retroceso';</script>";

}
?>