<?php
//Importa los archivos de la SDK de facebook v4
require_once '../script/facebook/app/start.php';
 
  //comprueba si existe una sesion confacebook paradeterminar las variables de sesion si en caso de haber una sesion 
 if (isset($_SESSION['facebook'])){ 
		  $_SESSION['nombre'] = $facebook_user->getName(); 
		  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrate en instanun</title>

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
    <script type="text/javascript" src="../js/jqueryvalidator/bootstrapValidator.min.js"></script>
 
 
</head>
 

<body>
   <!-- Navigation & Logo-->
       <!-- Navigation & Logo-->
  <?php
include 'inc/nabvar.inc';


 ?>
			 
<br>
<br>
<div class="container">
    <h2 class="text-center" style="margin-bottom:5%; margin-top:1%;">Administra tus anuncios desde una cuenta</h2>
      <div class="row">
         <div class="col-md-9 col-md-offset-1">
          
         <div class="col-md-4" style="padding-top:10%; padding-bottom:10%;">
           
            <div class="text-center">
            <a href="<?php echo $helper->getLoginUrl($config['scopes']); ?>" class="btn btn-stackexchange btn-lg btn-block"><i class="fa fa-facebook"></i> Registrarme con facebook</a>
            </div>
           
         </div>
         <div class="col-md-1">
          <div class="visible-md visible-lg" style="width:1px; background: #ecf0f1; height:300px;"></div>
         </div>
         <hr class="visible-xs">
         <div class="col-md-7">
            
                <form id="registrationForm" method="post" class="form-horizontal" action="script/registrousuario.php">
            <h4 class="text-center">O crear cuenta en instanun</h4>
            <div class="row">
                <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" name="nombre" id="first_name" class="form-control" placeholder="Nombre" tabindex="1">
                     </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" name="apellidos" id="apellidos" class="form-control " placeholder="apellido" tabindex="2">
                     </div>
                </div>
            </div>
             
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control " placeholder="Correo Electronico" tabindex="4">
            </div>

            <div class="row">
                <div class="col-md-6">
                     <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control " placeholder="Contraseña" tabindex="5">
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirme contraseña" tabindex="6">
                     </div>
                </div>
            </div>
             
             
                <div class="form-group">
                <div class="alert alert-info" role="alert">
                <label></label>
                    <input type="checkbox" name="acepta"> Usted acepta todos los <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terminos y Condiciones</a> 
                    que este sitio requiere para su uso.
                    
                </div>
                </div>
          
            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrarme <i class="fa fa-check-circle"></i></button>
         </form>
            
         </div>
          
         </div>
      </div>
</div>
<br>
<br>
<br>

   
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terminos y Condiciones</h4>
			</div>
			<div class="modal-body">
				<p>ACEPTACIÓN:</p>
   <p>             
 Instanun es una colección de recursos en línea que incluyen anuncios clasificados, foros, y algunos servicios de correo electrónico. Al utilizar este servicio, usted se compromete a cumplir todas las directrices publicadas y aplicables para este servicio, que puedes cambiar con el paso del tiempo. Usted entiende y acepta que es el único responsable de leer de vez en cuando dichas directrices. Si se opone a cualquier término o condición de Instanun de cualquier manera, su única opción es dejar de utilizar el servicio de Instanun de manera inmediata. Instanun puede enviarle notificaciones con los cambios de directrices directo a su correo electrónico.

DESCRIPCION DEL SERVICIO Y POLITICA DE CONTENIDO
A. Instanun es la nueva generación de anuncios clasificados para la compra y venta de productos en línea. Usted no está en la posibilidad de realizar el pago por medio del sitio web utilizando PayPal, Instanun  no obliga a los usuarios a pagar con PayPal ya que pueden comunicarse entre sí y acordar una forma de pago, Instanun no maneja pagos por medio de tarjetas de crédito para evitar cualquier molestia entre los usuarios, por lo tanto no el sitio web no se hace responsable de la utilización de dichos métodos de pago.

B. Instanun no es responsable de los anuncios y la información de los anuncios, mensajes, comentarios entre los usuarios, al utilizar el sitio web puede estar expuesto a contenido ofensivo o engañoso. Usted conoce y acepta los riesgos de asociados a cualquier contenido del cual desconfié, de cualquier manera Instanun  no se hace responsable del contenido publicado en el sitio web.
</p>

<p>ANUNCIOS DESTACADOS</p>
<p>
Instanun ofrece un servicio conocido como “anuncios destacados” por medio de paga no reembolsable para dar más vistosidad a los anuncios publicados por los usuarios y aumentar las posibilidades de venta de los productos ofrecidos.

</p>




 <p>INFORMACÓN RECOPILADA</p>
 <p class="text-justify">
La información que Instanun recopila es muy básica como: el nombre de su anuncio, una descripción de su anuncio, la región en la que desea anunciarlo.
	Recopilamos información de tres maneras:
A. La que nos proporciona usted como usuario de Instanun para el uso exclusivo de un anuncio publicitario de un producto.

B. La que es almacenada en nuestros registros, es decir, los anuncios que usted visita y le parecen de interés.


C. La que es almacenada en el dispositivo como el almacenamiento web del navegador.


¿CÓMO ES UTILIZADA LA INFORMACION RECOPILADA?
La información que recopilan nuestros servicios es utilizada para mejorar nuestra plataforma y proveer un manejo que facilite la manera de publicar anuncios en internet con lo necesario para facilitar la comunicación entre usuarios.

TRANSPARENCIA Y OPCIONES
Los usuarios siempre tienen preocupaciones por la seguridad en sitios web por lo que Instanun es una plataforma totalmente segura y confiable con el manejo de la información evitando así los robos de identidad.
</p>






<p>INFORMACION QUE COMPRATIMOS</p>
<p class="text-justify">
Instanun comparte solo la información del anuncio y el numero de contacto del usuario se que nos proporciona. No se publica la información personal con otros usuarios o empresas que deseen revisarlos o administrarlos fuera de nuestros servicios.

Uso externo:
Su información personal solo puede ser compartida entre nuestros servicios y con su debido consentimiento.


SITUACIONES EN LAS QUE SE APLICAN ESTAS POLITICAS DE PRIVACIDAD
Nuestra política de privacidad es aplicada solo en los servicios de Instanun y excluye otras plataformas que tengan otro tipo de políticas de privacidad separadas a las de nuestros servicios.
Nuestras políticas no se aplican en otro tipo de anuncio o plataforma que le pertenezca a una empresa no afiliada a Instanun y es obligación del usuario leer y meditar las políticas de servicio antes de utilizar los servicios de Instanun.


COLABORACIÓN DE AUTORIDADES NORMATIVAS
Revisamos periódicamente que los anuncios dentro de Instanun cumplan con las políticas de privacidad y si en dado caso no se cumplen se le notificara al usuario que tiene cuarenta y ocho horas para modificar el anuncio o será borrado luego del tiempo estimado por infligir las políticas de privacidad de Instanun.
<p>




<p>MODIFICACIONES</p>
<p class="text-justify">
La política de privacidad de Instanun será modificada periódicamente por el cual a usted como usuario no se le derivaran sus derechos de la presente política de privacidad sin su debido consentimiento. Cualquier modificación a la política de privacidad será publicada en esta pagina y si son significativas se le enviara una notificación por medio de su correo electrónico sobre el cambio de políticas de privacidad a los usuarios que utilicen los servicios de Instanun. Ademas se conservaran las versiones anteriores de las políticas de seguridad de Instanun para que los usuarios puedan consultarlas.</p>
</p>			
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
$(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                message: 'El nombre de usuario no es valido',
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es requerido '
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El nombre de usuario es demasiado corto'
                    },
                   
                   
                }
            },
			  apellidos: {
                message: 'Los apellidos no son validos',
                validators: {
                    notEmpty: {
                        message: 'El apellido del usuario es requerido'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El apellido de usuario es demasiado corto'
                    },
                   
                   
                }
            },
             email: {
                message: 'El correo electronico no es valido ',
                validators: {
                	 notEmpty: {
                        message: 'Correo electronico es requerido'
                    },
                    // Send { email: 'its value', type: 'email' } to the back-end
                    remote: {
                        message: 'Este correo electrónico ya está en uso.',
                        url: 'script/valuemail.php',
                        data: {
                            type: 'email'
                        }
                    }

                }
            },
       
            password: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida'
                    },
                    identical: {
                        field: 'password_confirmation',
                        message: 'Las contraseñas no coinciden'
                    },
                    
                    different: {
                        field: 'nombre',
                        message: 'El password no debe ser igual al nombre de usuario'
                    },
                    stringLength: {
                        min: 8,
                        message: 'La contraseña debe tener mas de 8 caracteres'
                    }

                }
            },
			 password_confirmation: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida'
                    },
                    identical: {
                        field: 'password',
                        message: 'Las contraseñas no coinciden'
                    },
                    
                }
            },
			
			 acepta: {
                validators: {
                    notEmpty: {
                        message: '<label class="text-danger">Aceptar los terminos es requerido.</label>'
                    }
                }
            }
        
           
        }
    });
});
</script>




   
   
   
</body>
<footer>
    <?php
            include 'inc/footer.inc';
    ?>
 </footer>
    
    <script src="../js/bootstrap.js"></script>
	 
    <script src="../js/modern-business.js"></script>
</html>
