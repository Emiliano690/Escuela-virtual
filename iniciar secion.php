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
	<script type="text/javascript">
		document.getElementId('nose').style.display="none";
	</script>
</head>
<body background="Imagenes\ImagenLetras.jpg">	
	<h1>Escuela Virtual Basica</h1>
       <div class="form" id="hola">
       
       		<form action="#" method="POST">
       			<label for="usuario1">Usuario</label>
				<br>
				<input type="text" name="usuario" placeholder="Usuario" max length="15" required>
				<br><br>
				<label for="clave">Contraseña</label>
				<br>
				<input type="password" name="clave" placeholder="Contraseña" required>
				<br><br>
				<input type="submit" name="guardar">
				<a href="Index.php">Registrarse</a>
       		</form>
       </div>
</body>
</html>
<?php
?>
<?php
	if (isset($_POST['guardar'])) {
		# code...
	
 $usuario=$_POST['usuario'];
 $contrasena=$_POST['clave'];
 session_start();
 $_SESSION['usuario']=$usuario;

 $consulta="SELECT * FROM registro WHERE Usuario='$usuario' and Contrasena='$contrasena'";
 $resultado=mysqli_query($conect, $consulta);
 $filas=mysqli_num_rows($resultado);

 if ($filas) {
 	echo '<meta http-equiv="refresh" content="1; url=Tutoriales.html" />';
 	 }else{
 	echo '<script>alert ("No Coiside ningun perfil");</script>';
 }}
?>