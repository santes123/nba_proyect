<?php
$equipo = $_GET['equipo'];	

$conexion = new mysqli("localhost", "root", "", "nba");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
$consulta = "SELECT * FROM jugadores where nombre_equipo = \"$equipo\" ";

/*
$consulta2 = "select codigo,j.Nombre,Procedencia,Altura,Peso,Posicion,j.Nombre_equipo,e.Nombre,e.Ciudad,e.Conferencia,e.Division
 from jugadores as j join equipos as e on (j.Nombre_equipo = e.Nombre) where j.nombre_equipo = \"$equipo\" ;";
 */
 /*1º select */
$resultado = $conexion->query($consulta);

$jugadores = [];

while($fila = $resultado->fetch_assoc()){
	array_push($jugadores, $fila);
}


/*2º select */

$consulta2 = "SELECT * FROM equipos where Nombre = \"$equipo\" ";
$resultado2 = $conexion->query($consulta2);
$equipo_datos = [];
while($fila2 = $resultado2->fetch_assoc()){
	array_push($equipo_datos, $fila2);
}

// Liberar resultados
mysqli_free_result($resultado);

// Cerrar la conexión
mysqli_close($conexion);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Equipo especifico</title>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
  	<meta name="keywords" content="">
 	<meta name="author" content="Antonio González">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../css/ejecutar_sentence.css">

	<style type="text/css">
	*{
		box-sizing:border-box;
	}
	body{
		background-color: #66ccff;
	}

	div.clearfix{
		clear: both;
	}
	ul{
		list-style:none;
		text-align:center;
	}
	ul > a > li{
		float:left;
		border: 1px solid black;
		width:calc(100%/3);
		height: 50px;
		padding: 10px;
	}
	article.equipo{
		float:left;
		width:calc(100%/4);
		padding:15px;
	}
	article.equipo > div{
		border-radius:15px;
		border:1px solid gray;
		width:80%;
		margin:0 auto;
		text-align:center;
		padding:15px;
	}
</style>
</head>
<body>
	<header>
		<div>
			<img src="../img/nba.jpg">
		</div>
	</header>
	<nav>
		<ul>
			<a href="index_nba_.php"><li>Index</li></a>
			<a href="contacto_nba.php"><li>Contacto</li></a>
			<a href="login_nba.php"><li>Login</li></a>
		</ul>
	</nav>
	<section>
		<?php
			for($inicio=0; $inicio<=0; $inicio++){
				$equipo = $equipo_datos[$inicio];
				$nombre_equipo = $equipo["Nombre"];
				$ciudad = $equipo["Ciudad"];
				$conferencia = $equipo["Conferencia"];
				$division = $equipo["Division"];

				echo "<div>";
				echo "<article class='equipo' style='width: 100%;'>";
				echo "<div>";
				echo "<img src='img/nba.png' width=90 height=90 />";
				echo "<p style='color: black;'><b>nombre </b>: <u>".$nombre_equipo."</u></p>";
				echo "<p style='color: black;'><b>ciudad</b> : <u>".$ciudad."</u></p>";
				echo "<p style='color: black;'><b>conferencia</b> : <u>".$conferencia."</u></p>";
				echo "<p style='color: black;'><b>division</b> : <u>".$division."</u></p>";
				echo "</div>";
				echo "</article>";
				//echo "</a>";
				echo "</div>";
			}
			for($inicio=0; $inicio<count($jugadores); $inicio++){
				$jugador = $jugadores[$inicio];
				$id = $jugador["codigo"];
				$nombre = $jugador["Nombre"];
				$procedencia = $jugador["Procedencia"];
				$altura = $jugador["Altura"];
				$peso = $jugador["Peso"];
				$posicion = $jugador["Posicion"];
				$nombreEquipo = $jugador["Nombre_equipo"];
				if($inicio%4 == 0){
					echo "<div>";
				}
				//peticion get manual
				//echo "<a href=\"equipo.php?equipo=$nombre\">";
				echo "<article class='equipo'>";
				echo "<div>";
				echo "<img src='img/nba.png' width=90 height=90 />";
				echo "<p style='color: black;'><b>id </b>: <u>".$id."</u></p>";
				echo "<p style='color: black;'><b>nombre</b> : <u>".$nombre."</u></p>";
				echo "<p style='color: black;'><b>procedencia</b> : <u>".$procedencia."</u></p>";
				echo "<p style='color: black;'><b>altura</b> : <u>".$altura."</u></p>";
				echo "<p style='color: black;'><b>peso</b> : <u>".$peso."</u></p>";
				echo "<p style='color: black;'><b>posicon</b> : <u>".$posicion."</u></p>";
				echo "<p style='color: black;'><b>equipo</b> : <u>".$nombreEquipo."</u></p>";
				echo "</div>";
				echo "</article>";
				//echo "</a>";
				if($inicio%4 == 3){
					echo "</div>";
				}
				
			}
		
		?>
	</section>

</body>
</html>