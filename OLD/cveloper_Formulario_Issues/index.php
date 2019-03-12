<?php
require_once(__DIR__ . '/github-php-client-master/client/GitHubClient.php');

// Datos del usuario
$user = 'cveloper';
$password = 'S2801vm1985!';
$body = "";

$owner = 'cveloper'; // Dueño del repositorio
$repo = 'cveloper-com'; // Nombre del repositorio
#$title = 'Issue con API';
#$body = '# Paco \n Texto del comentario'; // El cuerpo del documento se puede formatear

$issue = "4";
# Assignees debe ser un array para asignar distintos usuarios
$assignees = ["fruize", "sergiovelmay"];
# Para asignar a otro usuario, primero tienes que añadirle como colaborador al repositorio
#$assignees[] = 'fruize'; // A quien asignas para revisar el issue
#$assignees[] = 'sergiovelmay';


$milestone = "Agregar Tech";

# Labels debe ser un array para añadir varias "etiquetas."
$labels[] = 'Technology Request'; // Labels que asignas a ese issue


$client = new GitHubClient();
$client->setCredentials($user, $password);



# Ejemplo de añadir ISSUE

/*if($client->issues->createAnIssue($owner, $repo, $title, $body, $assignees, $milestone, $labels)) {
	echo "ISSUE Creado Correctamente";
} else {
	echo "No se ha podido crear el ISSUE";
} */

# Ejemplo de creación de comentario en ISSUE
$respuesta = "";
if(isset($_GET["cuerpo"])) {
  $body = $_GET["cuerpo"];
    if($client->issues->comments->createComment($owner, $repo, $issue, $body, $assignees, $milestone)) {
    	$respuesta =  "Comentario añadido Correctamente";
    } else {
    	$respuesta = "No se ha podido crear el ISSUE";
    }
} else {
	$respuesta = "Por favor, rellene el campo";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inicio</title>
	<!-- Link Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Link industrious -->
	<link rel="stylesheet" href="css/industrious.css">
	<!-- Link FontAwesome -->
	<link rel="stylesheet" href="css/fontawesome.css">
	<!-- Link CVeloper -->
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	
	<header>
		<div class="container">

            <div class="row">
                <div class="col-6">
                    <img class="logo" src="images/CVeloper_logo_texto.png" alt="Logo CVeloper" />
                </div>
                <div class="col-6">
					<a href="user_type.html"><button class="header-button">Registrarse</button></a>
					<a href="sign_in.html"><button  class="header-button">Iniciar sesión</button></a>
				</div>
			</div>

		</div>
	</header>

<main>
		<form action="#" method="GET">
		<!-- <label for="title">Titulo: </label><input type="text" name="title" id="title" /> -->
		<label for="cuerpo">Cuerpo del issue: </label><input type="text" name="cuerpo" id="cuerpo" /><br>
		<input type="submit" value="Enviar" />
		</form>

		<div>
			<span>Resultado: <?=  $respuesta ?></span>
		</div>
</main>

</body>
</html>
