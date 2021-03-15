<?php

include 'conexion.php';
$con = conexion();


$load = $_POST['load'] * 16;


$consul = mysqli_query($con,"SELECT * FROM anuncio order by cod_anun desc limit ".$load.",16");

while ($row = mysqli_fetch_array($consul))
{
$id = $row['0'];
$a = base64_encode($id);
            $descripcion = strlen($row['1']);
            if ($descripcion > 27){
             $cortar = substr("$row[1]", 0 , 27) ;
             $puntos = "...";
             $des_count = $cortar . $puntos;
            }else{
             $des_count = $row[1];
            }

echo"<div class='col-md-3 col-sm-6 hero-feature' id='item'>
                <div class='thumbnail'>
                    <a href='pages/anuncio.php?cod=$a'>
                    <span class='price'>$ $row[precio_anun]</span>
                    <img src='pages/script/imagen.php?id=$row[0]' style='height:200px;'alt=''></a>
                    <div class='caption'>
                        <a href='pages/anuncio.php?cod=$a'><p style='margin-bottom:1px;'>$des_count</p></a>
                    <small class='text-muted' style='margin-top:0;'>$row[fecha_anun]</small>
                    </div>
                </div>
     </div> 
    ";
};

return;
?>
 