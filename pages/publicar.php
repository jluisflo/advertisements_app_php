<!DOCTYPE html>
<?php
//sesiones con facebook
require_once '../script/facebook/app/start.php';
 
  //comprueba si existe una sesion confacebook paradeterminar las variables de sesion si en caso de haber una sesion 
 if (isset($_SESSION['facebook'])){ 
		  $_SESSION['nombre'] = $facebook_user->getName(); 
		  }
// incluye la conexion a base de datos
require '../script/conexion.php';
$con = conexion();


//carga el combobot con datos de la base de datos
$cate= mysqli_query($con,"SELECT * from categorias");

$depar= mysqli_query($con,"SELECT depto from departamento");
 
if (mysqli_num_rows($cate)!=0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combocate="";
    while ($row = mysqli_fetch_array($cate)) 
    {
        $combocate .=" <option value='".$row['categoria']."'>".utf8_encode ($row['categoria'])."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}

if (mysqli_num_rows($depar)!=0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
     $combodepar="";
    while ($row = mysqli_fetch_assoc($depar)) 
    {
        $combodepar .=" <option value='" .$row['depto']."'>".utf8_encode ($row['depto'])."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}

?>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Instanun - Registrar Anuncio</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
	<link href="../css/social-buttons.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="../css/marketplace.css" rel="stylesheet">
     
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- BootstrapValidator CSS -->
    <link rel="stylesheet" href="../css/jqueryvalidator/bootstrapValidator.min.css"/>
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
  

    <!-- BootstrapValidator JS -->
    <script type="text/javascript" src="../js/jqueryvalidator/bootstrapValidator.js"></script>
	
</head>
<body>
   <!-- Navigation & Logo-->
     <!-- Navigation & Logo-->
  <?php
include 'inc/nabvar.inc';


 ?>

    <div  style="width:100%;background: #FFF; border-bottom: 1px solid #eeeeee; box-sizing:border-box;">  
    <div class="container">
     <h2 style="color:#5890FF;" class="text-center">
     Publica tu anuncio <small style="margin-left:10px;"> Rapido, facil y al instante.</small></h2>
    </div>
    </div>
 
<div class="container">
 
<form id="publicaranuncio" class="form-horizontal" method="POST" action="script/registroanuncio.php" enctype="multipart/form-data" name="uploadform">
 <fieldset>
 <br>

  <h4 class="text-center text-default"><i class="fa fa-info"></i> Informacion de tu anuncio</h4>
  <hr>
<!-- Text input-->
  <div class="form-group">
 <label class="col-md-3 control-label">Seleccione categoria para su anuncio</label>
 <div class="col-md-6"> 
 <div class="input-group">
 <div class="input-group-addon"><i class="fa fa-tags"></i></div>
<select id="cateajax" name='categoria' class="form-control input-lg">
<option value="">Seleccionar..</option>
       <?php echo $combocate; ?>
</select>
  </div>
  </div>
</div>

<div id="seccioncont" class="form-group" style="display:none;">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-6">
        <div class="panel panel-success">
        <div class="panel-heading">Filtrar por:</div>
        <div class="panel-body">
        <div id ="secciones">
        
        
        </div>
        </div>
        </div>
        </div>
        </div>


<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){

    

$( "#cateajax" ).change(function() {
 
        $('#secciones').empty();

        
       var load = $("#cateajax").val();
       
         
        $.ajax({
        type:"POST",
        url: 'script/seccion.php',
        data:{load:load},
        success: function(html)
        {
            if(html)
            {
                 
                $("#secciones").append(html);
                $("#seccioncont").show("slow");
                 
            }
            
        }
        });

       });
      
    });
 </script>

<div class="form-group">
  <label class="col-md-3 control-label">Escribe un titulo para tu anuncio</label>  
  <div class="col-md-6">
  <textarea id="titulo" name="titulo" type="text"  placeholder="Escriba el titulo de anuncio" maxlength="60" class="form-control input-lg" ></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-3 control-label">Describe tu anuncio</label>
  <div class="col-md-6">                     
    <textarea class="form-control input-lg" id="descripcion" name="descripcion"></textarea>
  </div>
</div>

  
<div class="form-group">
 <label class="col-md-3 control-label" >¿Como es tu oferta?</label>
 <div class="col-md-6"> 
<select name="tipo" id="tipo" class="form-control input-lg">
<option value="">Seleccionar..</option>
  <option value="Precio fijo">Precio fijo</option>
  <option value="Precio negociable">Precio negociable</option>
  </select>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label">¿Cual es el precio?</label>  
  <div class="col-md-6">
  <div class="input-group">
      <div class="input-group-addon" style="color:green;"><i class="fa fa-dollar"></i></div>
  <input id="precio" name="precio" placeholder="Precio" class="form-control input-lg" type="text">
 </div>
</div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="images">Sube foto</label>
  <div class="col-md-6">  
  
<div style="width:100%;"class="bloc">
     <div class="row">
     <div class="col-md-6">
     <div class="files">
     <img id="img1" src="" height="200" alt="">
     <input id="in1" name="file1" class="oculto" type="file" onchange="previewFile1()"><br>
     <p><i class="fa fa-camera fa-2x"></i><br>Subir foto</p>
     </div>
     </div>
      <div class="col-md-6">
     <div class="files">
     <img id="img2" src="" height="200" alt="">
     <input id="in2" name="file2" class="oculto" type="file" onchange="previewFile2()"><br>
     <p><i class="fa fa-camera fa-2x"></i><br>Subir foto</p>
     </div> 
     </div>
     </div>          
        <style type="text/css">
  .files{
    position: relative;
    width: 100%;
    height: 200px;
    background: #fff;
    font-size: 15px;
    border: 1px solid #b0bec5;
    cursor: pointer;
  }
  .files:hover{
   background: #eceff1;

  }

  .files p {
text-align: center;
padding-top: 50px;
  }
  .files:hover{
  text-decoration: underline;
  }

  .oculto{
   position:absolute;
   top: 0px;
   left: 0px;
   right: 0px;
   bottom: 0px;
   width: 100%;
   height: 100%;
   opacity: 0;
   cursor: pointer;

  }
  #img1{
   position:absolute;
   top: 0px;
   left: 0px;
   right: 0px;
   bottom: 0px;
   width: 100%;
   height: 100%;
  }
  
  #img2{
   position:absolute;
   top: 0px;
   left: 0px;
   right: 0px;
   bottom: 0px;
   width: 100%;
   height: 100%;
  }
  .bloc .files{
   display: inline-block;

  }

</style>
<script type="text/javascript">
function previewFile1() {
  var preview = document.querySelector('#img1');
  var file    = document.querySelector('input[id=in1][type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
function previewFile2() {
  var preview = document.querySelector('#img2');
  var file    = document.querySelector('input[id=in2][type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
</script>


  </div>
</div>
</div>

<h5 class="text-center text-default">Informacion acerca de ti</h4>
<hr>
<!-- Multiple Radios -->
<div id="padding6" class="form-group">
        <label class="col-md-3 control-label">¿Que tipo de vendedor eres?</label>
        <div class="col-md-6">
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="Particular" /> Particular
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="Profesional/empresa" />  Profesional/empresa
                </label>
            </div>
           
        </div>
    </div>


<!-- Text input-->
<?php 
if (!isset($_SESSION['codigo'])){ 
?>
  <div class='form-group'>
  <label class='col-md-3 control-label'>Nombre de contacto</label>  
  <div class='col-md-6'>
  <div class="input-group">
  <div class="input-group-addon"><i class="fa fa-user"></i></div>
  <input id='nombre' name='nombre' placeholder="Escribe tu nombre" class='form-control input-lg' type='text'>
  </div>
  </div>
  </div>

<!-- Text input-->
<div class='form-group'>
					<label class="col-md-3 control-label" for="telefono">Tu E-mail</label> 
					<div class="col-md-6"> 
					<div class="input-group">
					<div class="input-group-addon"><strong>@</strong></div>
					<input name="mailcontact" class='form-control input-lg' type="email" placeholder='Escribe tu email'>
					</div>
					</div>
					</div>		
<?php		
}
?> 					

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="telefono">Telefono</label>  
  <div class="col-md-6">
  <div class="input-group">
  <div class="input-group-addon"><i class="fa fa-phone"></i></div>
  <input id="telefono" name="telefono" placeholder="Escribe tu Telefono" class="form-control input-lg" type="text">
  </div>  
  </div>
</div>
 
 <div class="form-group">
 <label class="col-md-3 control-label" for="Descripcion">¿En donde te encuentras?</label>
 <div class="col-md-6"> 
 <div class="input-group">
 <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
<select name="ubicacion" class="form-control input-lg">
<option value="">Seleccionar..</option>
       <?php echo $combodepar; ?>
   </select>
  </div> 
  </div>
</div>

<!-- Button -->
<h3 class="text-center"> ¿Estas listo? </h3>  
<br>
 
 
 <center><div class="col-md-6 col-md-offset-3"><button type="submit" class="btn btn-primary btn-lg btn-block">Publicar anuncio <i class="fa fa-check-circle"></i></button></div></center>
 

</fieldset>
</form>
 
</div>
</div>

<script>
$(document).ready(function() {
    $('#publicaranuncio').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
		    userfile: {
                
                validators: {
                    notEmpty: {
                        message: 'La foto para el anuncio es requerida'

                    },

                    file: {
                        extension: 'image,jpeg,png,jpg',
                        type: 'image/jpeg,image/png',
                        
                        message: 'El archivo es invalido, seleccione una imagen'
                    }
					
                             
                   
                }
            },
            categoria: {
                message: 'Especifique una categoria',
                validators: {
                    notEmpty: {
                        message: 'Especifique una categoria '
                    },
					
                             
                   
                }
            },
             radio: {
                message: 'Especifique una categoria',
                validators: {
                    notEmpty: {
                        message: 'Especifique una categoria '
                    },
          
                             
                   
                }
            },
			  titulo: {
                 message: 'El titulo escrito no es valido',
                validators: {
                     notEmpty: {
                        message: 'El titulo del anuncio es requerido '
                    },
                              
                }
            },
			 tipo: {
              
                message: 'Especifique una categoria',
                validators: {
                    notEmpty: {
                        message: 'Especifique este campo'
                    }
                }
            },
			
			descripcion: {
                message: 'La descripcion no es valida',
                validators: {
                    notEmpty: {
                        message: 'La descripcion del anuncio son requeridos'
                    },
               
                }
            },
			precio: {
                message: 'El precio no es valido',
                validators: {
                    notEmpty: {
                        message: 'El precio es requerido'
                    },
                    numeric: {
                        message: 'Especifique el precio es numeros',
                    },
                   
                   
                }
            },
			
			
            mailcontact: {
                validators: {
                    notEmpty: {
                        message: 'El Email de contacto es requerido'
                    },
                    emailAddress: {
                        message: 'La direccion de email no es valida'
                    }
                }
            },
             gender: {
                // The threshold option does not effect to the elements
                // which user cannot type in, such as radio, checkbox, select, etc.
                threshold: 5,
                validators: {
                    notEmpty: {
                        message: 'Especifique este campo'
                    }
                }
            },
			 nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de contacto es requerido'
                    },
                    
                    stringLength: {
                        min: 3,
                        message: 'El nombre de contacto debe ser real'
                    }
                }
            },
			telefono: {
                message: 'El precio no es valido',
                validators: {
	        numeric: {
                        message: 'Especifique el telefono en numeros'
                    },
                 notEmpty: {
                        message: 'Introducir el telefono es requerido'
                    },
		stringLength: {
                        min: 8,
						max: 8,
						message: 'El telefono de contacto debe tener 8 digitos'
                    }
                    
                }
            },
			 ubicacion: {
              
                message: 'Especifique una ubicacion',
                validators: {
                    notEmpty: {
                        message: 'Especifique una ubicacion'
                    }
                }
            }
			
			
        
           
        }
    });
});


 
 
 
</script>

<footer>
    <?php
            include 'inc/footer.inc';
    ?>
 </footer>
    
     
    <script src="../js/bootstrap.js"></script>
	 <script src="../js/npm.js"></script>
     

</body>

</html>
