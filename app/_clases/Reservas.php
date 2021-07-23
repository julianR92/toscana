<?php 
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2019
@copyrigth
**/
header('Content-Type: text/html; charset=utf-8');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

 require_once('../Frame/library/PHPMailer/src/Exception.php');
 require_once('../Frame/library/PHPMailer/src/PHPMailer.php');
 require_once('../Frame/library/PHPMailer/src/SMTP.php');	
	    
class Reservas{

	protected $IdReserva;
	protected $ResNom;
	protected $ResApe;
	protected $ResTipDoc;
	protected $ResNumDoc;
	protected $ResNumCel;
	protected $ResEmail;
	protected $ResNumPer;
	protected $ResObs;
	protected $ResFec;
	protected $ResHorIni;
	protected $ReservaEstado;
	protected $ResFecReg;
	protected $ResHorReg;
	
	public function __construct($Parametro){

		$this->IdReserva = $Parametro["RV00"];
		$this->ResNom    = $Parametro["RV01"];
		$this->ResApe    = $Parametro["RV02"];
		$this->ResTipDoc = $Parametro["RV03"];
		$this->ResNumDoc = $Parametro["RV04"];
		$this->ResNumCel = $Parametro["RV05"];
		$this->ResEmail  = $Parametro["RV06"];
		$this->ResNumPer = $Parametro["RV07"];
		$this->ResObs    = $Parametro["RV10"];
		$this->ResFec    = $Parametro["RV08"];
		$this->ResHorIni = $Parametro["RV09"];
		$this->ResEstado = $Parametro["RV11"];
		$this->ResFecReg = $Parametro["RV12"];
		$this->ResHorReg = $Parametro["RV13"];

		$this->UsuarioRol= $Parametro["RV00"];
		$this->MetodoRow = $Parametro["RV14"];
		$this->MetodoIns = $Parametro["RV15"];
		$this->MetodoUpd = $_GET["MetodoUpd"];
		$this->MetodoSel = $_GET["MetodoSel"];
		$this->MetodoCancel = $_GET["MetodoCancel"];
		$this->MetodoTra = $_GET["MetodoTra"];
		$this->Parametro = $_GET["Parametro"];
		$this->MetodoAtend = $_GET["MetodoAtend"];

	}

	public function insertReserva(){

		$Campos = "INSERT INTO `reservas`(`ResNom`,
					                      `ResApe`,
					                      `ResTipDoc`,
					                      `ResNumDoc`,
					                      `ResNumCel`,
					                      `ResEmail`,
					                      `ResNumPer`,
					                      `ResObs`,
					                      `ResFec`,
					                      `ResHorIni`,
					                      `ReservaEstado`,
					                      `ResFecReg`,
					                      `ResHorReg`)
					                       VALUES ('$this->ResNom',
					                               '$this->ResApe',
					                               '$this->ResTipDoc',
					                               '$this->ResNumDoc',
					                               '$this->ResNumCel',
					                               '$this->ResEmail',
					                               '$this->ResNumPer',
					                               '$this->ResObs',
					                               '$this->ResFec',
					                               '$this->ResHorIni',
					                               'RESERVADO',
					                                CURDATE(),
					                                CURTIME())";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);

		try {

			if ($QueryCampos==true && $this->MetodoIns == null){

				$NombresMail = $this->ResNom.' '.$this->ResApe;
				$Nombres = $this->ResNom;
				$Fecha = $this->ResFec;
				$Hora = $this->ResHorIni;
				$Personas = $this->ResNumPer;
				$NumTel  = $this->ResNumCel;

				$SegHora   = strtotime($Hora);
                $Seg       = "14400";

                $SegSum = $SegHora+$Seg;

                $SegSumA = date(strtotime($SegSum));

                  /**Sus visajes de fechas**/
                  $date  = date_create($Fecha);
                  $hour  = date_create($Hora);
                  $HoraFin= date_create($SegSumA);

                  $date1 = date_format($date,"Ymd");
                  $hour1 = date_format($hour,"His");
                  $hour2 = date_format($HoraFin,"His");
                  include_once("../Forms/PlantillaCorreo.php"); 
                  $mail = new PHPMailer(true);


                  try {
$ical_content = 'BEGIN:VCALENDAR
PRODID:-//Microsoft Corporation//Outlook 10.0 MIMEDIR//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-MS-OLK-FORCEINSPECTOROPEN:TRUE
BEGIN:VTIMEZONE
TZID:SA Pacific Standard Time
BEGIN:STANDARD
DTSTART:16010101T000000
TZOFFSETFROM:-0500
TZOFFSETTO:-0500
END:STANDARD
END:VTIMEZONE
BEGIN:VEVENT
CLASS:PUBLIC
CREATED:20191203T124654Z
DESCRIPTION:Cumbre LATAM 2019\n
DTEND;TZID="SA Pacific Standard Time":'.$date1.'T'.$hour2.'\r\n
DTSTAMP:20191203T124654Z
DTSTART;TZID="SA Pacific Standard Time":'.$date1.'T'.$hour1.'\r\n
LAST-MODIFIED:20191203T124654Z
LOCATION: Avenida el Jardin Casa 1A, Bucaramanga
PRIORITY:5
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY;LANGUAGE=es:Reserva Restaurante la Toscana
TRANSP:OPAQUE
ORGANIZER;CN=LA Toscana Restaurante:mailto:info@toscanarestaurante.co
ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE;CN=Bob Miller;X-NUM-GUESTS=0:mailto:'.$NombresMail.'
UID:040000008200E00074C5B7101A82E00800000000A06260CDADA9D501000000000000000
    010000000FC95C5664F74B04B8AEB1601B7F04AD6
X-ALT-DESC;FMTTYPE=text/html:<html xmlns:v="urn:schemas-microsoft-com:vml" 
    xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-mic
    rosoft-com:office:word" xmlns:m="http://schemas.microsoft.com/office/2004/
X-MICROSOFT-CDO-BUSYSTATUS:BUSY
X-MICROSOFT-CDO-IMPORTANCE:1
X-MICROSOFT-DISALLOW-COUNTER:FALSE
X-MS-OLK-AUTOFILLLOCATION:FALSE
X-MS-OLK-CONFTYPE:0
BEGIN:VALARM
TRIGGER:-PT15M
ACTION:DISPLAY
DESCRIPTION:Reminder
END:VALARM
END:VEVENT
END:VCALENDAR';

		              $mail->SMTPDebug = 0;                      // Enable verbose debug output
		              $mail->isSMTP();                                            // Send using SMTP
		              $mail->Host       = 'smtp.gmail.com';
		              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		              $mail->Username   = 'reservas.restaurantetoscana@gmail.com';                     // SMTP username
		              $mail->Password   = 'Toscana2020';                               // SMTP password
		              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 
		              $mail->Port       = 587;                                    // TCP port to connect to
		              $mail->setFrom('reservas.restaurantetoscana@gmail.com', 'La Toscana Restaurante');
		              $mail->addAddress($this->ResEmail, $NombresMail);     // Add a recipient
		              $mail->isHTML(true);                                  // Set email format to HTML
		              $mail->Subject = 'Confirmacion de Reserva';
		              $mail->Body    =  $correo;
		              $mail->CharSet = 'UTF-8';
		              $mail->addStringAttachment($ical_content,'ical.ics','base64','text/calendar');
		              $mail->send();
		              
		          } catch (Exception $e) {
		                   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		            }

		             // aca empieza

		          include_once("../Forms/PlantillaCorreoAviso.php"); 
                 $mail = new PHPMailer(true);
                 try {
                 	$mail->SMTPDebug = 0;                      // Enable verbose debug output
		              $mail->isSMTP();                                            // Send using SMTP
		              $mail->Host       = 'smtp.gmail.com';
		              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		              $mail->Username   = 'avisos.reservastoscana@gmail.com';                     // SMTP username
		              $mail->Password   = 'toscana2020';                               // SMTP password
		              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 
		              $mail->Port       = 587;                                    // TCP port to connect to
		          $mail->setFrom('avisos.reservastoscana@gmail.com', 'La Toscana Restaurante');
		          $mail->addAddress('info@toscanarestaurante.com', 'Administradores la Toscana');
		          $mail->addAddress('alfonsopema@hotmail.com', 'Administradores la Toscana');
		          $mail->addAddress('Monacha69@hotmail.com', 'Administradores la Toscana');     
		          // Add a recipient
		              $mail->isHTML(true);                                  // Set email format to HTML
		              $mail->Subject = 'Aviso de nueva reserva';
		              $mail->Body    = $correo;
		              $mail->CharSet = 'UTF-8';
		              $mail->send();

                 	
                 } catch (Exception $e) {
                 	  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                 }
                 

              // aca termina


		             $MensajeUno = ' Señor(a)'.' '.$Nombres.' Ha sido registrada su reserva exitosamente en el sistema, muy pronto serás contactado por nosotros para validar la información de tu reserva.';

		            echo'<script>document.addEventListener("DOMContentLoaded", function(event) {
					swal({
		       		type: "success",
		       		title: "'.$MensajeUno.'",
		       		showConfirmButton: true,
		       		confirmButtonColor: "#faa323",
		       		confirmButtonText: "Siguiente"
		       		}).then(function(result){
		                  if (result.value) {
		                  	top.location.href = "../../index.html"; } }) })</script>';



				//echo "<script>alert('Ha sido registrada su reserva de manera exitosa en el sistema, muy pronto serás contactado por nosotros para validar tu solicitud');</script>";
				//echo "<script>window.location.href='../../index.html';</script>";
				
			}else if($QueryCampos==true && $this->MetodoIns =='true' ){


	$NombresMail = $this->ResNom.' '.$this->ResApe;
				$Nombres = $this->ResNom;
				$Fecha = $this->ResFec;
				$Hora = $this->ResHorIni;
				$Personas = $this->ResNumPer;

				$SegHora   = strtotime($Hora);
                $Seg       = "14400";

                $SegSum = $SegHora+$Seg;

                $SegSumA = date(strtotime($SegSum));

                  /**Sus visajes de fechas**/
                  $date  = date_create($Fecha);
                  $hour  = date_create($Hora);
                  $HoraFin= date_create($SegSumA);

                  $date1 = date_format($date,"Ymd");
                  $hour1 = date_format($hour,"His");
                  $hour2 = date_format($HoraFin,"His");
                  include_once("../Forms/PlantillaCorreo.php"); 
                  $mail = new PHPMailer(true);


                  try {
$ical_content = 'BEGIN:VCALENDAR
PRODID:-//Microsoft Corporation//Outlook 10.0 MIMEDIR//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-MS-OLK-FORCEINSPECTOROPEN:TRUE
BEGIN:VTIMEZONE
TZID:SA Pacific Standard Time
BEGIN:STANDARD
DTSTART:16010101T000000
TZOFFSETFROM:-0500
TZOFFSETTO:-0500
END:STANDARD
END:VTIMEZONE
BEGIN:VEVENT
CLASS:PUBLIC
CREATED:20191203T124654Z
DESCRIPTION:Cumbre LATAM 2019\n
DTEND;TZID="SA Pacific Standard Time":'.$date1.'T'.$hour2.'\r\n
DTSTAMP:20191203T124654Z
DTSTART;TZID="SA Pacific Standard Time":'.$date1.'T'.$hour1.'\r\n
LAST-MODIFIED:20191203T124654Z
LOCATION: Avenida el Jardin Casa 1A, Bucaramanga
PRIORITY:5
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY;LANGUAGE=es:Reserva Restaurante la Toscana
TRANSP:OPAQUE
ORGANIZER;CN=LA Toscana Restaurante:mailto:info@toscanarestaurante.co
ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE;CN=Bob Miller;X-NUM-GUESTS=0:mailto:'.$NombresMail.'
UID:040000008200E00074C5B7101A82E00800000000A06260CDADA9D501000000000000000
    010000000FC95C5664F74B04B8AEB1601B7F04AD6
X-ALT-DESC;FMTTYPE=text/html:<html xmlns:v="urn:schemas-microsoft-com:vml" 
    xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-mic
    rosoft-com:office:word" xmlns:m="http://schemas.microsoft.com/office/2004/
X-MICROSOFT-CDO-BUSYSTATUS:BUSY
X-MICROSOFT-CDO-IMPORTANCE:1
X-MICROSOFT-DISALLOW-COUNTER:FALSE
X-MS-OLK-AUTOFILLLOCATION:FALSE
X-MS-OLK-CONFTYPE:0
BEGIN:VALARM
TRIGGER:-PT15M
ACTION:DISPLAY
DESCRIPTION:Reminder
END:VALARM
END:VEVENT
END:VCALENDAR';

		              $mail->SMTPDebug = 0;                      // Enable verbose debug output
		              $mail->isSMTP();                                            // Send using SMTP
		              $mail->Host       = 'smtp.gmail.com';
		              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		              $mail->Username   = 'reservas.restaurantetoscana@gmail.com';                     // SMTP username
		              $mail->Password   = 'Toscana2020';                               // SMTP password
		              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 
		              $mail->Port       = 587;                                    // TCP port to connect to
		              $mail->setFrom('reservas.restaurantetoscana@gmail.com', 'La Toscana Restaurante');
		              $mail->addAddress($this->ResEmail, $NombresMail);     // Add a recipient
		              $mail->isHTML(true);                                  // Set email format to HTML
		              $mail->Subject = 'Confirmacion de Reserva';
		              $mail->Body    =  $correo;
		              $mail->CharSet = 'UTF-8';
		              $mail->addStringAttachment($ical_content,'ical.ics','base64','text/calendar');
		              $mail->send();
		              
		          } catch (Exception $e) {
		                   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		            }



				echo "<script>alert('Ha sido registrada su reserva de manera exitosa en el sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADC=Retroceso';</script>";


			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función crear Reservas');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?MAP=Retroceso';</script>";
			}
		} catch (Exception $e) {

			echo $e->getMessage();
			die();
		}
		


	}#Fin de la funcion InsertClinetes

	public function listarReservas(){

		if ($this->UsuarioRol=='ADMIN' || $this->UsuarioRol=='DESARROLLADOR' || $this->UsuarioRol=='TECNICO' || $this->Parametro== "true") {
			$this->ResNumDoc="%";
		}else{
			$this->ResNumDoc=$this->ResNumDoc;
		}

		$Campos = "SELECT R.ResNom,
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
					          WHERE R.ResNumDoc like '$this->ResNumDoc'
					               AND R.ReservaEstado='RESERVADO'
					                  ORDER BY R.ResFec,R.ResHorIni ASC";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);
		$QueryCount  = mysqli_num_rows($QueryCampos);

		try {

			if ($QueryCampos==true && $this->MetodoRow=="true"){

				include_once("../Forms/AdminReservas.php");
				while ($Row = mysqli_fetch_array($QueryCampos)) {
					return;
				}
				
			} else if ($QueryCampos==true && $this->MetodoSel=="true"){


                include_once("../Forms/AdminReservas.php");
				while ($Row = mysqli_fetch_array($QueryCampos)) {
					return;			

                    }

			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función listar Reservas');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADR=Retroceso';</script>";
				//echo "$Campos";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}

	}#Fin de la funcion listar clientes

	public function selectReservas(){

		$Campos="SELECT R.IdReserva,
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
				        R.ResHorReg
				        FROM reservas as R
				            WHERE R.IdReserva='$this->Parametro'";

	    include_once("../Motordb/conexiondb.php");
	    $QueryCampos = mysqli_query($conexion,$Campos);

	    try {

			if ($QueryCampos==true && $this->MetodoUpd=="true"){

				while ($Row = mysqli_fetch_array($QueryCampos)) {

					include_once("../Forms/AdminReservas.php");
				}
				
			}else{
				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función listar Reservas para editar');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADC=Retroceso';</script>";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}

	    
	}#Fin de la funcion SelectCliente

	public function UpDateReserva(){

		$Campos = "UPDATE `reservas` SET `ResNom`    = '$this->ResNom',
										 `ResApe`    = '$this->ResApe',
										 `ResTipDoc` = '$this->ResTipDoc',
										 `ResNumDoc` = '$this->ResNumDoc',
										 `ResNumCel` = '$this->ResNumCel',
										 `ResEmail`  = '$this->ResEmail ',
										 `ResNumPer` = '$this->ResNumPer',
										 `ResObs`    = '$this->ResObs',
									     `ResFec`    = '$this->ResFec',
										 `ResHorIni` = '$this->ResHorIni',
										 `ReservaEstado` = '$this->ResEstado'
		                                  WHERE `IdReserva`=$this->IdReserva";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);

		try {

			if ($QueryCampos==true){

				echo "<script>alert('Se ha actualizado la reserva de manera exitosa en el sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADR=Retroceso';</script>";
				
			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función para actualizar clientes');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADC=Retroceso';</script>";
				#echo "$Campos";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}

	}

	public function deleteReservas(){

		$Campos = "DELETE FROM `reservas` WHERE `IdReserva`='$this->Parametro'";
		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);

		try {

			if ($QueryCampos==true){

				echo "<script>alert('Se ha eliminado la reserva exitosamente del sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADR=Retroceso';</script>";
				
			}else{
				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función para eliminar reservas');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADR=Retroceso';</script>";
				#echo "$Campos";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}
	}

	public function gestionReserva(){

	    $Campos = "UPDATE `reservas` SET `ReservaEstado` = '$this->ResEstado' WHERE `IdReserva`=$this->IdReserva";
	    $Campos2= "INSERT INTO `gestion_reservas`(`ReservaId`,
	    										  `GesObs`,
											      `GestionEstado`,
											      `GesFecReg`,
											      `GesHorReg`)
											       VALUES('$this->IdReserva',
											              '$this->ResObs',
									                      '$this->ResEstado',
									                       CURDATE(),
									                       CURTIME())";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);
		$QueryCampos2 = mysqli_query($conexion,$Campos2);

		try {

			if ($QueryCampos==true && $QueryCampos2==true){

				echo "<script>alert('Se ha gestionado la reserva de manera exitosa en el sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADR=Retroceso';</script>";
				
			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función para gestionar reservas');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADC=Retroceso';</script>";
				
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}
	}

	public function trazabilidadReserva(){

		$Campos = "SELECT GR.ReservaId,
						  GR.GesObs,
						  GR.GestionEstado,
						  GR.GesFecReg,
						  GR.GesHorReg
						  FROM gestion_reservas as GR
						      WHERE ReservaId=$this->Parametro";

	    include_once("../Motordb/conexiondb.php");
	    $QueryCampos = mysqli_query($conexion,$Campos);

	    try {

			if ($QueryCampos==true && $this->MetodoTra=="true"){

				include_once("../Forms/AdminReservas.php");
				while ($Row = mysqli_fetch_array($QueryCampos)) {

					return;
				}
				
			}else{
				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función listar trazabilidad reservas');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?MAP=Retroceso';</script>";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}
	}
	public function SelectAtendidos(){


		$Campos = "SELECT R.ResNom,
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
					          WHERE R.ReservaEstado='EN ATENCION' OR R.ReservaEstado ='PENDIENTE'
					                  ORDER BY R.ResFec,R.ResHorIni ASC";

	 include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);
		$QueryCount  = mysqli_num_rows($QueryCampos);

		try {

			if ($QueryCampos==true && $this->MetodoAtend=="true"){

				//echo "Logrado";

				include_once("../Forms/AdminReservas.php");
				while ($Row = mysqli_fetch_array($QueryCampos)) {
					return;
				}
				
			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función listar reservas atendidos');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADR=Retroceso';</script>";
				#echo "$Campos";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}




	} #Fin funcion selectAtendidos

	public function SelectCancelados(){


		$Campos = "SELECT R.ResNom,
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
					          WHERE R.ReservaEstado='CANCELADO'
					                  ORDER BY R.ResFec,R.ResHorIni ASC";

	 include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);
		$QueryCount  = mysqli_num_rows($QueryCampos);

		try {

			if ($QueryCampos==true && $this->MetodoCancel=="true"){

				//echo "Logrado";

				include_once("../Forms/AdminReservas.php");
				while ($Row = mysqli_fetch_array($QueryCampos)) {
					return;
				}
				
			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función listar reservas canceladas');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADR=Retroceso';</script>";
				#echo "$Campos";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}




	} #Fin funcion selectCancelada
}#Fin de la clase Clientes