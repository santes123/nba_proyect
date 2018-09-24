<?php
$conexion = new mysqli("localhost", "root", "", "nba");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
$consulta = "SELECT * FROM equipos";
$resultado = $conexion->query($consulta);
$equipos = [];
while($fila = $resultado->fetch_assoc()){
	array_push($equipos, $fila);
}
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	*{
		box-sizing:border-box;
	}
	body{
		background-color: #66ccff;
	}
	header{
		width:100%;
	}
	header > div {
		float:left;
	}
	header > div > img{
		width:20%;
	}
	header > div > h1{
		width:80%;
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
		width:calc(100%/3);
	}
	article.equipo{
		float:left;
		width:calc(100%/3);
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
<link rel="stylesheet" type="text/css" href="css/index_nba.css">
</head>
<body>
	<header>
		<div>
			<img src="img/nba.png" />
		</div>
		<div>
			<h1>NBA</h1>
		</div>
	</header>
	<div class="clearfix"></div>
	<nav>
		<ul>
			<a href="index.php"><li>Index</li></a>
			<a href="contacto_nba.php"><li>Contacto</li></a>
			<a href="login_nba.php"><li>Login</li></a>
		</ul>
	</nav>
	<div>
	</div>
	<section>
		<?php
			for($inicio=0; $inicio<count($equipos); $inicio++){
				$equipo = $equipos[$inicio];
				$nombre = $equipo["Nombre"];
				$ciudad = $equipo["Ciudad"];
				$division = $equipo["Division"];
				$conferencia = $equipo["Conferencia"];
				if($inicio%3 == 0){
					echo "<div>";
				}
				//peticion get manual
				echo "<a href=\"equipo.php?equipo=$nombre\">";
				echo "<article class='equipo'>";
				echo "<div>";
				echo "<img src='img/nba.png' width=90 height=90 />";
				echo "<p>".$ciudad." ".$nombre."<p>";
				echo "<p>".$division."<p>";
				echo "<p>".$conferencia."<p>";
				echo "</div>";
				echo "</article>";
				echo "</a>";
				if($inicio%3 == 2){
					echo "</div>";
				}
				
			}
		
		?>
	
	</section>
</body>
</html>