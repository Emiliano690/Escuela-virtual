<?php
	$host="localhost";
	$user="root";
	$pass="";
	$bd="escuelavirtual";

	$conect = mysqli_connect($host, $user, $pass, $bd);

	if (!$conect) {
		echo "Error con el servidor";
	}
	
?>
<html>
<head>
	<title>Escuela Virtual Basica</title>
	<link rel="stylesheet" type="text/css" href="Estilo.css">
</head>
<body background="Imagenes\ImagenLetras.jpg">	
	<h1>Escuela Virtual Basica</h1>
       
       <div class="form">
       
       		<form action="#" method="POST">
       			<label for="usuario1">Usuario</label>
				<br>
				<input type="text" name="usuario" placeholder="Usuario" max length="15" required>
				<br><br>
				<label for="edad">Edad</label>
				<br>
				<input type="text" name="edad" placeholder="Edad" required>
				<br><br>
				<label for="clave">Contraseña</label>
				<br>
				<input type="password" name="clave" placeholder="Contraseña" required>
				<br><br>
				
				<input type="submit" name="guardar">
				<a href="iniciar secion.php">Iniciar sesión</a>
       		</form>
       </div>
</body>
</html>
<?php
 if(isset($_POST['guardar'])){
 $usuario=$_POST['usuario'];
 $edad=$_POST['edad'];
 $contrasena=$_POST['clave'];
 $id= rand(1,300);
 
  $query="SELECT * FROM registro WHERE Usuario ='$usuario'";

 $c=mysqli_num_rows($conect->query($query));
  if($c==1){
   echo '<script>alert ("El nombre de usuario ya está en uso, por favor escoger otro gracias");</script>';
  }else{
   $r="INSERT INTO registro(Usuario, Edad, Contrasena, Id) VALUES ('$usuario','$edad','$contrasena','$id')";
   $resultado=$conect->query($r);
   if($resultado){
    echo '<script>alert ("Felicidades, $usuario te has registrado con éxito");</script>';
    echo '<meta http-equiv="refresh" content="1; url=Tutoriales.html" />';
   }else{
   	echo "La base de datos esta llena";
   }
  }
 }
?>