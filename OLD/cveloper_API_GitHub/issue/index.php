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
    	$respuesta =  "Comentario añadido correctamente.";
    } else {
    	$respuesta = "No se ha podido enviar la solicitud.";
    }
} else {
	$respuesta = "Por favor, rellena la solicitud.";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Issue</title>
	<!-- Link Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Link industrious -->
	<link rel="stylesheet" href="css/industrious.css">
	<!-- Link FontAwesome -->
	<link rel="stylesheet" href="css/fontawesome.css">
	<!-- Link CVeloper -->
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" href="images/CVeloper_logo.png" type="image/png" sizes="32x32">
</head>
<body>
	
	<header>
		<div class="container">

            <div class="row">
                <div class="col-6">
                    <a href="http://localhost:8000/"><img class="logo" src="images/CVeloper_logo_texto.png" alt="Logo CVeloper" /></a>
                </div>
                <div class="col-6">
					<a href="http://localhost:8000/developer/personal/"><button class="header-button">Perfil</button></a>
					<a href="http://localhost:8000/logout/"><button  class="header-button">Logout</button></a>
				</div>
			</div>

		</div>
	</header>

<main>
	<div class="container">
		<form action="#" method="GET">
			<div class="row">
				<div class="col-12">
					<label for="cuerpo">Cuerpo de la solicitud: </label>
					<input type="text" name="cuerpo" id="cuerpo" />
				</div>
				<div class="col-6 izquierda">
					<button type="submit">Enviar la solicitud</button>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-6">
				<p>Estado: <?=  $respuesta ?></p>
			</div>
			<div class="col-6">
				<a href="http://localhost:8000/developer/personal/">Volver al perfil</a>
			</div>
		</div>
	</div>
</main>

</body>
</html>
