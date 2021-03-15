<?php
session_start();

include '../../script/conexion.php';
$con = conexion();


$load = $_POST['load'] * 9;
$cod = $_SESSION['codigo'];

$result = mysqli_query($con,"SELECT * FROM anuncio WHERE cod_usu='$cod' limit ".$load.",9"); 
 

		while ($row = mysqli_fetch_row($result)){ 
			echo
                
                
                "<div class='col-md-4'>
				 <div class='thumbnail'>
					<img style='width:100%;height:150px'; class='group list-group-image' src='script/imagen.php?id=$row[0]' alt='' />
					<div class='caption'>
					   
						<p class='group inner list-group-item-text'>
							  $row[1]</p>
						   <div class='row'>
						   <div class='col-xs-6 col-md-7'>
							<h5><i style='color:gray;'class='glyphicon glyphicon-calendar'></i> <span>$row[16]</span></h5>
							<h5><i style='color:gray;'class='glyphicon glyphicon-time'></i> <span>$row[17]</span></h5>
						   </div>
							<div class='col-xs-6 col-md-5 '>

							    <a style='width:145px;' class='btn btn-primary pull-right  ' href='modificar_anuncio.php?cod=$row[0]'><i class='glyphicon glyphicon-pencil'></i> Editar anuncio</a>
								<br>
								<br>
								 
								<button style='width:145px;' class='btn btn-default pull-right' data-title='drop' data-toggle='modal' data-target='#drop' data-placement='top' rel='tooltip'><i class='glyphicon glyphicon-trash'></i> Eliminar anuncio</button>
								 
							</div>
						</div>
					</div>
				</div>
			</div>

      <div class='modal fade' id='drop' tabindex='-1' role='dialog' aria-labelledby='drop' aria-hidden='true'>
      <div class='modal-dialog'>
    <div class='modal-content'>
          <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
        <h4 class='modal-title custom_align text-center' id='Heading'>Advertencia</h4>
      </div>
         <div class='modal-body'>

         <div class='alert alert-danger text-center' role='alert'>¿Esta seguro que desea eliminar este anuncio?</div>
         </div>
        <div class='modal-footer'>
        <a type='button' class='btn btn-danger btn-lg' style='width: 100%;' href='../script/eliminaranuncio.php?cod=$row[0]'><i class='glyphicon glyphicon-ok-sign'></i> Eliminar anuncio</a>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
		";
        }

return;
?>