<?php
/**
Autor:   Hugo Andres Pedroza Rodriguez
Software: Sistema de riego con técnicas de automatización y control
Versión: 1.0:
Tipo de proyecto: Tesis de grado
Todos los derechos reservados 2020
Institución: Corporación universitaria de ciencia y desarrollo Uniciencia
**/
#Archivo: conexiondb
header("Content-Type: text/html; charset=utf-8");

date_default_timezone_set('America/Bogota');

$SysFecReg  = date('Y-m-d');
$IntFegReg  = strtotime($SysFecReg);

$SysHorReg  = date('H:i:s');
$IntHorReg  = strtotime($SysHorReg);

$servername = "localhost";
$username   = "root";
$password   = "toscana2020";
$URLRoute   = "http://localhost/app";

$conexion   = mysqli_connect($servername,$username,$password);
$BaseDatos  = mysqli_select_db($conexion,'toscana');
$QueryCampos = mysqli_query($conexion,"SET NAMES 'utf8'");

if ($conexion === false) {

    echo "<script>alert('! ERROR 001 - CONEXION DB ¡ El sistema no pudo realizar la conexion con el servidor de base de datos, por favor comuniquese con el administrador del sistema para restablecer la conexion con el servidor');</script>"; 
    echo "<script>window.location.href='$URLRoute';</script>";

}

if ($BaseDatos === false) {

    echo "<script>alert('! ERROR 002 - SELECCION DB ¡ El sistema no pudo realizar la Seleccion de base de datos, por favor comuniquese con el administrador del sistema para restablecer la conexion con el servidor');</script>"; 
    echo "<script>window.location.href='$URLRoute';</script>";

}

/**
$host = "localhost";
$puerto = "3306";
$usuario = "andres.pedroza";
$contrasena = "91078541";

if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))){

    echo "Error conectando a la base de datos.<br>"; 
    exit(); 

}else{

       #echo "Listo, estamos conectados.<br>";
     }

if (!mysqli_select_db($link,'riego')){

    echo "Error seleccionando la base de datos.<br>"; 
    exit();
    
}else{

       #echo "Obtuvimos la base de datos $baseDeDatos sin problema.<br>";
       
     }
**/       
?>