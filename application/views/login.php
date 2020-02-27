<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	 
	<script src="<?=base_url('assets/js/auth/login.js')?>"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style type="text/css">
body {

  
background-image: url("<?=base_url('assets/img/fondo.jpg')?>");

/* Para dejar la imagen de fondo centrada, vertical y

horizontalmente */

background-position: center center;

/* Para que la imagen de fondo no se repita */

background-repeat: no-repeat;

/* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

background-attachment: fixed;

/* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

background-size: cover;

/* Se muestra un color de fondo mientras se está cargando la imagen

de fondo o si hay problemas para cargarla */

background-color: #66999;

}
  </style>
	<title>Login</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-lg-center d-flex align-items-center" style="height: 70vh">
			<div class="col-lg-6">
				<form id="frmlogin" action = "<?php echo base_url()."login/validate"; ?>" method = "post" >
                    <div class="form-group" >
                        <h1>Login</h1>
                    </div>
					<div class="form-group" id="usuario">
						<label for="usuario">Usuario</label>
						<input type="text" name="usuario" class="form-control" id="usuario"  placeholder="Escriba su usuario">
						<div class="invalid-feedback"></div>
					</div>
					<div class="form-group" id="password">
						<label for="password">Contraseña</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="Ingrese su contraseña">  
						<div class="invalid-feedback"></div>
					</div>
					<div class="form-group">
						<button type="submit" id="btn-ingresar" class="btn btn-primary">Ingresar</button>
					</div>
					<div class="form-group" id="alert">
						<?php
						  if(isset($noingreso)){
						  	echo $noingreso;
						  }
						 ?>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</body>

</html>
