<?php
require_once(__DIR__ . '/github-php-client-master/client/GitHubClient.php');


$user = 'XXXX';
$password = 'XXXX';


$owner = 'owner';
$repo = 'repo';
$title = 'Title of Issue';
$body = 'Content of the Issue';

# Assignees debe ser un array para asignar distintos usuarios
$assignees[] = 'name';


$milestone = null;

# Labels debe ser un array para añadir varias "etiquetas."
$labels[] = 'Probando API';


$client = new GitHubClient();
$client->setCredentials($username, $password);



# owner, $repo, $title, $body = null, $assignees = null, $milestone = null, $labels = null

if($client->issues->createAnIssue($owner, $repo, $title, $body, $assignees, $milestone, $labels)) {
	echo "ISSUE Creado Correctamente";
} else {
	echo "No se ha podido crear el ISSUE";
}

?>