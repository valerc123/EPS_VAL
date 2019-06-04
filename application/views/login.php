<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title><?php echo $tituloLogin ?></title>
</head>
<body>
   <?php echo form_open('login/acceso/');?>
   <form class="user">
      <div class="form-group">
         <input type="text" class="form-control form-control-user" name="identificacion" id="identificacion" placeholder="Identificación" required>
      </div>
      <div class="form-group">
         <input type="password" class="form-control form-control-user" name="clave" id="clave" placeholder="Contraseña" required>
      </div>
      <button class="btn btn-primary btn-user btn-block">Ingresar</button>
   </form>
   	<!--Mensaje de verificación-->
   <div class="card text-center text-dark mt-2">
      <div class="card-body">
         <p class="card-text"><?php if (isset($mensaje)) echo "<h4>" . $mensaje. "</h4>";?>
         <p class="card-text"><?php if (isset($validacion)) echo "<h4>" . $validacion. "</h4>";?>
         <img src="https://img.icons8.com/windows/32/000000/spinner-frame-1.png">
      </div>
   </div>
   
</body>
</html>