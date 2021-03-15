<?php

include '../../script/conexion.php';

$con = conexion();

$cate = $_POST['load'];
 
  
  $query = mysqli_query($con,"SELECT * FROM secciones WHERE relacion='$cate'");

  while ($row = mysqli_fetch_array($query)) {
?>
     <div class='radio'>
                <label>
                    <input class='radio' type='radio' name='radio' value="<?php echo $row['nombre'] ?>" required /> <?php echo $row['nombre'] ?>
                </label>
     </div>

<?php
  	 };



?>
       
       