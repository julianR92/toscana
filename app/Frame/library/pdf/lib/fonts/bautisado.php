<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
clearstatcache();

if(!isset($_SESSION['id'])){
  header('Location:../index.php');
}
require_once('../conexion.php');




$id=$_GET['id'];



if(isset($_POST['crearnota'])){
    $nota=$_POST['nota'];
    $fecha = date("Y-m-d");
    $id_usuario=$_SESSION['id'];
    $tipo="Bautismo";
    $insertar= mysqli_query($mysqli,"INSERT INTO Nota VALUES 
    (NULL,'$id','$nota','$fecha','$id_usuario','$tipo' )") ;
}     

if(isset($_POST['eliminar'])){
  $eliminar = $mysqli->query("DELETE FROM Nota WHERE id_sacramento = '$id' AND tipo = 'Bautismo' ");
  $eliminar2 = $mysqli->query("DELETE FROM Bautismo WHERE id_bautismo = '$id' ");
  header('Location:bautismos');
}   

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $lugar_nacimiento = $_POST['lugar_nacimiento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $madre = $_POST['madre'];
    $padre = $_POST['padre'];
    $padrino = $_POST['padrino'];
    $iglesia = $_POST['iglesia'];
    $direccion = $_POST['direccion'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $observaciones = $_POST['observaciones'];
    $zip = $_POST['zip'];
    $fecha = $_POST['fecha'];
    $reverendo = $_POST['reverendo'];

    
    $actualizar= mysqli_query($mysqli,"UPDATE Bautismo SET numero_libro = '$numero' , nombre  = '$nombre'
                                  , lugar_nacimiento = '$lugar_nacimiento' , fecha_nacimiento = '$fecha_nacimiento'
                                  , nombre_madre = '$madre' , nombre_padre = '$padre'
                                  , padrino = '$padrino' , iglesia = '$iglesia', fecha_sacramento = '$fecha'
                                  , direccion_sacramento = '$direccion'
                                  , estado_sacramento = '$estado'
                                  , ciudad_sacramento = '$ciudad'
                                  , pais_sacramento = '$pais'
                                  , zip_sacramento = '$zip'
                                  , observaciones = '$observaciones'
                                  , padre = '$reverendo'
                                  WHERE id_bautismo = '$id' ");
    }




    if(isset($_POST['generar'])){
      $hoy = date("F j, Y");
        $consulta=$mysqli->query("SELECT * FROM Bautismo WHERE id_bautismo = '$id' ");
      $resultado=$consulta->fetch_assoc();
      
      require_once 'pdf/src/Autoloader.php';
      Dompdf\Autoloader::register();

      // reference the Dompdf namespace
    
      
      // instantiate and use the dompdf class
      $dompdf = new Dompdf\Dompdf();
      $html = '<html>


      </style>
      <body align="center">
      <center>
      <h1><strong>CERTIFICATE OF BAPTISM</strong></h1><br>
      <h3 style="text-align: center;">Maria Reina de la Paz Parish</h3>
      <h3 style="text-align: center;">at St. Lawrence OToole Church</h3>
      <h3 style="text-align: center;">494 New Britain Avenue, Harford CT 06106</h3>
      <h3 style="text-align: center;">This is to Certify</h3></center>
      <h4>That: '.$resultado['nombre'].'</h4>
      <h4>Child of&nbsp;'.$resultado['nombre_padre'].'</h4>
      <h4>and&nbsp; '.$resultado['nombre_madre'].'</h4>
      <h4>Born in '.$resultado['nombre_madre'].'</h4>
      <h4>on the  '.$resultado['fecha_nacimiento'].'</h4>
      <center><h4>Was Baptized</h4></center>
      <h4>on the '.$resultado['fecha_sacramento'].'</h4>
      <h4 style="text-align: center;">According to the Rite of the Roman Catholic Church</h4>
      <h4>by Rev. '.$resultado['padre'].'</h4>
      <h4 style="text-align: center;">The Sponsors </h4
      <h4>'.$resultado['padrino'].'</h4>
      <h4 style="text-align: center;">As appears from the Baptismal Register of</h4>
      <h4>'.$resultado['iglesia'].' , '.$resultado['estado_sacramento'].' '.$resultado['estado_sacramento'].'</h4><br>
      <h4>'.$hoy.'</h4><br>
      <br><h4>Reverent __________________________________________________</h4><br>
      <h4>&nbsp;No Notations Recorded</h4><br>
     
      
      </body>
      </html>';
      $dompdf->loadHtml($html, 'UTF-8');
      
      // (Optional) Setup the paper size and orientation
      $dompdf->setPaper('A4', 'potrait');
      
      // Render the HTML as PDF
      $dompdf->render();
      
      // Output the generated PDF to Browser
      $dompdf->stream();
      
       
      
      
      }
      









$id_sacramento=$id;
$tipo="Bautismo";

$consulta2=$mysqli->query("SELECT * FROM Bautismo WHERE id_bautismo = '$id' ");
$bautismo=$consulta2->fetch_assoc();
$consulta=$mysqli->query("SELECT Nota.id_nota,Nota.nota,Nota.fecha,Usuario.nombre FROM Nota,Usuario WHERE id_sacramento = '$id_sacramento' and tipo = '$tipo' and Usuario.id_usuario = Nota.id_usuario");


$myID= $_SESSION['id'];  
$permisos=$mysqli->query("SELECT * FROM Permisos WHERE id_usuario = '$myID' and modulo = 'Certificados'");
$permiso = $permisos->fetch_assoc();
if($permiso['crear']=='Si' || $myID<7){
$crear=true;
}

if($permiso['editar']=='Si' || $myID<7){
  $editar=true;
}else{
  $no=true;
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>



    <title>Church Management System </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  </head>

  <body>
    <!-- Navigation -->
    <?php  include('nav.html')?>
    <!-- Page Content -->
    <div class="container fondo">
        <br>
      <h3>Baptism</h3>
    <hr>
   
   <?php if(isset($_GET['new'])){ ?>
    <div class="alert alert-success">
  <strong> <center> Saved information! </center></strong></div>
   <?php } ?>
   <?php if($actualizar){
        echo '<div class="alert alert-success" role="alert">
        Changes saved
      </div>';
    } ?>
<br>
  
<?php if($editar){ ?>
<form method="POST" >
<?php  } ?>

<div class="card border-primary">
  <p class="card-header">Obligatory</p>
  <div class="card-body">
   

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Book Number</label>
      <input type="text" class="form-control" name="numero" value="<?php  echo $bautismo['numero_libro'] ?>"  required <?php if($no) { echo 'disabled'; } ?>>
    </div>
    <div class="form-group col-md-9">
      <label for="inputPassword4">Name</label>
      <input type="text" class="form-control" name="nombre"   value="<?php  echo $bautismo['nombre'] ?>"  required <?php if($no) { echo 'disabled'; } ?>>
    </div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-12">
  <label for="inputEmail4">Reverend</label>
      <input type="text" class="form-control"   name="reverendo" value="<?php  echo $bautismo['padre'] ?>" required <?php if($no) { echo 'disabled'; } ?>>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="inputEmail4">Date of baptism</label>
      <input type="date" class="form-control"   name="fecha" value="<?php  echo $bautismo['fecha_sacramento'] ?>"  required <?php if($no) { echo 'disabled'; } ?>>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Place of birth</label>
      <input type="text" class="form-control"   name="lugar_nacimiento"  value="<?php  echo $bautismo['lugar_nacimiento'] ?>" required <?php if($no) { echo 'disabled'; } ?>>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Birthdate</label>
      <input type="date" class="form-control" name="fecha_nacimiento"  value="<?php  echo $bautismo['fecha_nacimiento'] ?>"  required <?php if($no) { echo 'disabled'; } ?>>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Mother's name</label>
      <input type="text" class="form-control"  name="madre"  value="<?php  echo $bautismo['nombre_madre'] ?>"  required <?php if($no) { echo 'disabled'; } ?>>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Father's name</label>
      <input type="text" class="form-control"  name="padre"  value="<?php  echo $bautismo['nombre_padre'] ?>"  required <?php if($no) { echo 'disabled'; } ?>>

    </div>
   
  </div>


  </div>
</div>





<hr>

  <div class="card  bg-light border-dark">
  <p class="card-header">Not Obligatory</p>
  <div class="card-body">
    
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Godfather</label>
      <input type="text" class="form-control"  name="padrino" value="<?php  echo $bautismo['padrino'] ?>"  <?php if($no) { echo 'disabled'; } ?>>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Church</label>
      <input type="text" class="form-control"  name="iglesia" value="<?php  echo $bautismo['iglesia'] ?>"  <?php if($no) { echo 'disabled'; } ?>>

    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Address</label>
      <input type="text" class="form-control"  name="direccion" value="<?php  echo $bautismo['direccion_sacramento'] ?>"  <?php if($no) { echo 'disabled'; } ?>>

    </div>
    <div class="form-group col-md-3">
      <label for="inputState">City</label>
      <input type="text" class="form-control"  name="ciudad" value="<?php  echo $bautismo['ciudad_sacramento'] ?>" <?php if($no) { echo 'disabled'; } ?>>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">State</label>
      <input type="text" class="form-control"  name="estado" value="<?php  echo $bautismo['estado_sacramento'] ?>" <?php if($no) { echo 'disabled'; } ?> >
    </div>
    
    <div class="form-group col-md-3">
      <label for="inputState">Zip</label>
      <input type="text" class="form-control"  name="zip" value="<?php  echo $bautismo['zip_sacramento'] ?>" <?php if($no) { echo 'disabled'; } ?>>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Country</label>
      <input type="text" class="form-control"  name="pais" value="<?php  echo $bautismo['pais_sacramento'] ?>"  <?php if($no) { echo 'disabled'; } ?>>

    </div>

  <div class="form-group col-md-12">
      <label for="inputEmail4">Observations</label>
      <textarea class="form-control" rows="3"  name="observaciones" id="comment" <?php if($no) { echo 'disabled'; } ?>><?php  echo $bautismo['observaciones'] ?> </textarea>
    </div>
  </div>
</div>
</div>
<br>
  
<br>
<hr>
  <center>
    <?php if($editar){ ?>
  <button type="submit" class="btn btn-warning btn-lg btn-block" name="guardar">Save Information</button>
  <br>
    <button type="button" data-toggle="modal" data-target="#ModalEliminar" class="btn btn-danger btn-lg btn-block">Delete Baptism</button>
    <?php } ?>
    <br>
    <?php if($crear){ ?>
  <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-lg btn-block">Add Note</button>
  <br>
  
  <form method="post">
    <button type="submit" name="generar" class="btn btn-success btn-lg btn-block">Generate Certificate</button>  </form>

    <?php } ?>
  
 <hr>
  </center>

</form>
  <br>
  
 
<!-- Modal -->
<div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>¿Are you sure you want to eliminate this Baptism?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="POST">
        <button type="submit" name="eliminar" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<br>

<h3>Notes</h3>
<hr>
 

<table id="tabla"  class="table table-striped" style="width:100%">
<thead>
  <tr> 
    <th>Note</th>
    <th width="80px" >Date</th>
    <th width="100px">Created by</th>
    <th width="100px">Last Update</th>

    <th width="80px"><center> Options</center></th>
  </tr>
</thead>
<tbody>

<?php  while ($nota = $consulta->fetch_assoc()) {
$id_nota=$nota['id_nota'];
$ediciones=$mysqli->query("Select Usuario.nombre,HistorialNota.fecha,HistorialNota.id_historial FROM Usuario, HistorialNota WHERE HistorialNota.id_usuario = Usuario.id_usuario and HistorialNota.id_nota = '$id_nota' ORDER BY id_historial LIMIT 1");

if($edicion=$ediciones->fetch_assoc()){

  $info=$edicion['fecha'].' - '.$edicion['nombre'];
}else{
  $info="Without Records";
}
  
  ?>
  <tr>
    <td><?php  echo $nota['nota'] ?></td>
    <td><?php  echo $nota['fecha'] ?></td>
    <td><?php  echo $nota['nombre'] ?></td>
    <td><?php echo $info ?></td>

    <td><center>
      <?php if($editar){ ?>
    <a href="<?php echo "editarnota.php?id=".$nota['id_nota'].'&pagina=bautisado.php&id_pagina='.$id ?>" class="btn btn-warning">&#x0270E; </a>

      <a href="<?php echo "eliminarnota.php?id=".$nota['id_nota'].'&pagina=bautisado.php&id_pagina='.$id ?>" class="btn btn-danger">&#x02718; </a>
      <?php } ?>
    </center></td>
  </tr>
<?php  } ?>
</tbody>
</table>
<br>
<br>
<br>

<!-- Modal -->
<form method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label for="comment">Note:</label>
  <textarea class="form-control" rows="4" name="nota" id="comment" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="crearnota" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
</form>


    </div>
    <?php  include('footer.php')?>

  <!-- DataTables JavaScript -->
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  





    <script type="text/javascript">
      $(document).ready(function() {
        $('#tabla').DataTable({
          
          pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                responsive: true

        });
    });
    </script>

  </body>

</html>
