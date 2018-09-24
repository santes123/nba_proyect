
<script type="text/javascript">
	function loguear (usuario) {
		console.log("el "+usuario+" se ha logueado");
		alert("el "+usuario+" se ha logueado");

	}
</script>
<script type="text/javascript">
	function login_modif (usuario) {
		console.log("el "+usuario+" se ha logueado y conectado");
		
		var menu = document.getElementById("nav_ul");
		var elementoLista = document.createElement("li");
		elementoLista.className = "";
		elementoLista.innerHTML = "logueado as "+usuario;

		window.document.body.appendChild(elementoLista);
		window.document.body.appendChild("<hr>");
	}
</script>
<?php
//recojemos lo datos y creamos al conexion y la sentencia insert
global $verificado;
if(isset($_POST['login']) && count($_POST)>0){
	//creamos la conexion
	$con  = new mysqli('localhost','santes123','1234','baloncesto');
	//comprobamos si hay conexion
	if($con->errno){
		echo "<div>Hubo un error en la conexion ->".$con->error."</div>";
		//die();
		exit();
	}else{
		echo "<div>CONEXION CORRECTA</div>";
		$usuario = $_POST['usuario'];
		$contraseña = $_POST['contraseña'];
		echo "<br> usuario = $usuario <br>";
		echo " contraseña = $contraseña <br>";

		$query = "select usuario from usuario";

		$contador = 0;

				//bucle para recorrer los datos y mostrarlos en una tabla.
				//creamos un result_mysqli 2 para que no robe una fila cuando creamos la cabecera
				$result = mysqli_query($con,$query) or die('<br> <u>Error en la consulta Select</u><br><br> ' /*.mysql_error($link)*/);
				while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

				    foreach ($line as $col_value) {
				    	if($col_value==$usuario){
				    		echo "el usuario $usuario existe.";
				    		echo "<script type='text/javascript'> loguear('".$usuario."'); </script>";
				    		echo "<script type='text/javascript'> login_modif('".$usuario."'); </script>";
				    		$verificado = true;
				    	}else{
				    		$verificado = false;
				    	}
				    }
				    $contador++;
				}
			
		// Liberar resultados
		mysqli_free_result($result);

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

	<style type='text/css'>
		.li_ul_especial{
				border: 1px solid black;
				position: absolute;
				bottom: 165px;
				width: 190px;
				height: 40px;
				margin-left: 1000px;
				padding: 10px;
		}
	</style>

</head>
<style type="text/css">
	*{
		box-sizing: border-box;
	}
</style>
<body>
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
		<a id="last_index_menu" class="enlace_ul" href="login_nba.php"><li class="li_ul">
				
			Login
		</li></a>
		<?php
		if($verificado ==true){

			echo "<li class='li_ul_especial'>

			<u> Logueado as <b>$usuario</b> </u>
		</li>";
		}else{

		}
		?>
	</ul>
</nav>
<section>
	<div style="padding: 15px; border: 3px solid black; width: 600px; margin-left: 0px;">
		<!--<form action="registrar_usuario.php" method="GET">-->
			<form action="#" method="POST">
			<label for="usuario">usuario -></label>		<input type="text" name="usuario" maxlength="50">
			<br><br>
			<label for="contraseña">contraseña -></label>		<input type="password" name="contraseña" maxlength="100">
			<br><br>

			<input type="submit" name="login" value="login" onclick="javascript:verificar();">


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
</html>