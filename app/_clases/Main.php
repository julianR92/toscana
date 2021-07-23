<?php 
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2020
@copyrigth
**/

#Clase para realizar el rastreo y segumiento de un vehiculo en tiempo real

class Main{

	protected $Parametro;
	
	public function __construct($Parametro){
		
		$this->Parametro = $Parametro["MP00"];

	}

	public function HomeSistem(){

		try {

			if ($this->Parametro==true){

					include_once("../Forms/Main.php");
	
			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error al cargar la página principal, inicia session nuevamente');</script>";
				echo "<script>window.location.href='../index.htm';</script>";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}
	}#Fin de la funcion Seguimiento
}#Fin de la clase Rastreo

?>