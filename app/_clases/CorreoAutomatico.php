<?php 
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2019
@copyrigth
**/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

 require_once('../Frame/library/PHPMailer/src/Exception.php');
 require_once('../Frame/library/PHPMailer/src/PHPMailer.php');
 require_once('../Frame/library/PHPMailer/src/SMTP.php');

   require_once("../Motordb/conexiondb.php");

  

         $Campos = "SELECT R.IdReserva, 
                          R.ResNom,
					      R.ResApe,
					      R.ResTipDoc,
					      R.ResNumDoc,
					      R.ResNumCel,
					      R.ResEmail,
					      R.ResNumPer,
					      R.ResObs,
					      R.ResFec,
					      R.ResHorIni,
					      R.ReservaEstado,
					      R.ResFecReg,
					      R.ResHorReg,
					      R.IdReserva
					      FROM reservas as R
					          WHERE (R.ReservaEstado = 'RESERVADO' OR R.ReservaEstado = 'EN ATENCION') 
					               AND 	R.ResFec = CURDATE()		                 
					                  ORDER BY R.IdReserva ASC";

			$QueryCampos = mysqli_query($conexion,$Campos);
			$QueryCount  = mysqli_num_rows($QueryCampos);

			while ($Row = mysqli_fetch_array($QueryCampos)) {

                     require("../Forms/PlantillaRecordatorio.php"); 
					                    
                      $mail = new PHPMailer(true);               
                 	  $mail->SMTPDebug = 0;                      // Enable verbose debug output
		              $mail->isSMTP();                                            // Send using SMTP
		              $mail->Host       = 'smtp.gmail.com';
		              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		              $mail->Username   = 'reservas.restaurantetoscana@gmail.com';                     // SMTP username
		              $mail->Password   = 'Toscana2020';                               // SMTP password
		              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 
		              $mail->Port       = 587;                                    // TCP port to connect to
		             $mail->setFrom('reservas.restaurantetoscana@gmail.com', 'La Toscana Restaurante');
		              $mail->addAddress($Row[6], $Row[1]." ".$Row[2]);     // Add a recipient
		              $mail->isHTML(true);                                  // Set email format to HTML
		              $mail->Subject = 'Recordatorio Reserva';
		              $mail->Body    = $correo;
		              $mail->CharSet = 'UTF-8';
		              $mail->send();




		         }


 ?>