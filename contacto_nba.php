<?php
//recojemos lo datos y creamos al conexion y la sentencia insert
if(isset($_POST['enviar']) && count($_POST)>0){
	//creamos la conexion
	$con  = new mysqli('localhost','santes123','1234','baloncesto');
	//comprobamos si hay conexion
	if($con->errno){
		echo "<div>Hubo un error en la conexion ->".$con->error."</div>";
		//die();
		exit();
	}else{
		echo "<div>CONEXION CORRECTA</div>";
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		$fechaNacimiento = $_POST['fechaNacimiento'];
		$fechaTranslate =  date("Y-m-d", strtotime($fechaNacimiento));
		echo "<br> nuevo nombre = $nombre <br>";
		echo "nuevo correo = $correo <br>";
		echo "nueva fecha = $fechaTranslate <br>";

		$query = "insert into subscricion (nombre,correo,fechaNacimiento) values('$nombre','$correo','$fechaTranslate');";
		//sentencia INSERT
		//metodo 1)
		//$result = $con->query($query) or die('<br> Error en la consulta Insert ' /*. mysql_error($link)*/);
		//var_dump($con->error);
		//metodo 2)
		$result = mysqli_query($con,$query) or die('<br> Error en la consulta Insert ' /*. mysql_error($link)*/);
		if(mysqli_query($con,$query)==false){
			echo "<br> <u>Nuevo registro creado correctamente</u>";
		}else{
			echo "<br> <u>Error al intentar insertar</u>".$con->query->error;
			/*
			if (mysqli_query($link,$query)){ 
			// envias tu e-mail o lo que gustes .. 
			// hasta puedes usar: 
			echo "Error: ".mysqli_error($link); 
			}else{
				echo "Error: ".mysqli_error($link); 
			}  
			*/
		}
			
		// Liberar resultados
		//mysqli_free_result($result);

		// Cerrar la conexión
		mysqli_close($con);


	}
}else{

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contacto nba</title>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
  	<meta name="keywords" content="">
 	<meta name="author" content="Antonio González">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/index_nba.css">
</head>
<style type="text/css">
	*{
		box-sizing: border-box;
	}
</style>
<body onload="javascript:calcularFechaActual();">
<header>
	<div>
		<img src="img/nba.png">
	</div>
</header>

<nav id="nav">
	<ul id="nav_ul">
		<a class="enlace_ul" href="index_nba_.php"><li class="li_ul">
			Inicio
			</li></a>
		<a class="enlace_ul" href="contacto_nba.php"><li class="li_ul">
				
			contacto
		</li></a>
		<a class="enlace_ul" href="login_nba.php"><li class="li_ul">
				
			Login
		</li></a>
	</ul>
</nav>
<section>
	<div style="padding: 15px; border: 3px solid black; width: 600px; margin-left: 0px;">
		<!--<form action="registrar_usuario.php" method="GET">-->
			<form action="#" method="POST">
			<label for="nombre">Nombre -></label>		<input type="text" name="nombre" maxlength="50">
			<br><br>
			<label for="email">Email -></label>		<input type="email" name="correo" maxlength="100">
			<br><br>
			<label for="fechaNacimiento">Fecha de Nacimiento -></label>		<input id="fecha" type="date" name="fechaNacimiento" min="1900-01-01" max="">
			<br>
			<label>confirmo -></label><input id="checkbox" type="checkbox" required="required" name="aceptar">
			<br><br>


			<input type="submit" name="enviar" onclick="javascript:verificar();">
			<?php
			/*
				if(isset($_POST['enviar'])){
					$nombre = $_POST['nombre'];
					$email = $_POST['correo'];
					$checkbox = $_POST['aceptar'];

					if(isset($checkbox)){

					}else{
						$mensaje = "acepte las condiciones";
						echo "<script type='text/javascript'>alert('$mensaje');</script>";
						exit;
					}
				}else{

				}
				*/
			?>


		</form>
	</div>
</section>
<footer>
	<div style="border: 1px solid black;">
		<p>
			ipsum dolor -> sit amet, consectetur adipisicing.
		</p>
		<br>
		<p>
			ipsum dolor sit amet, consectetur adipisicing.
		</p>
	</div>
	<div>
		
	</div>
</footer>	
</body>
<script type="text/javascript">
	//calcular fecha actual
	function calcularFechaActual () {
		var fechaActual = document.getElementById("fecha");
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();

		if(dd<10) {
		    dd = '0'+dd
		} 

		if(mm<10) {
		    mm = '0'+mm
		} 

		today = mm + '-' + dd + '-' + yyyy
		var fechaActual.max = today;
		console.log(fechaActual);
	}



	function verificar () {
		var verificable = document.getElementById("checkbox");
		console.log(verificable);
		if(verificable.checked){
			console.log('go'); 
		}else{
			console.log('out');
			alert("error");
			<?php
			exit;  
			?>
		}
	}

	
</script>
</html>