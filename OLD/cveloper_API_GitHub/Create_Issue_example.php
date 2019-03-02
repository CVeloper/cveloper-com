<?php
require_once(__DIR__ . '/github-php-client-master/client/GitHubClient.php');

// Datos del usuario
$user = '';
$password = '';


$owner = 'nameOwner'; // Dueño del repositorio
$repo = 'nameRepository'; // Nombre del repositorio
$title = 'Title of Issue';
$body = '# Paco \n Texto del comentario'; // El cuerpo del documento se puede formatear

$issue = "12";
# Assignees debe ser un array para asignar distintos usuarios
$assignees = ["fruize", "sergiovelmay"];
# Para asignar a otro usuario, primero tienes que añadirle como colaborador al repositorio
#$assignees[] = 'fruize'; // A quien asignas para revisar el issue
#$assignees[] = 'sergiovelmay';


$milestone = null;

# Labels debe ser un array para añadir varias "etiquetas."
$labels[] = 'Probando API'; // Labels que asignas a ese issue


$client = new GitHubClient();
$client->setCredentials($user, $password);



# Ejemplo de añadir ISSUE

/*if($client->issues->createAnIssue($owner, $repo, $title, $body, $assignees, $milestone, $labels)) {
	echo "ISSUE Creado Correctamente";
} else {
	echo "No se ha podido crear el ISSUE";
} */

# Ejemplo de creación de comentario en ISSUE
if($client->issues->comments->createComment($owner, $repo, $issue, $body)) {
	echo "Comentario añadido Correctamente";
} else {
	echo "No se ha podido crear el ISSUE";
}

?>
