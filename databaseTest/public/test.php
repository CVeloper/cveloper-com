<?php
//Creamos la conexion a la BBDD
$host = "127.0.0.1";
$db = "test_cveloper";
$user = "test_user";
$pass = "test_1234";

$dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// $sql = "SELECT * FROM developer";

// $sql = "SELECT alias, tech_name, level FROM developer d, technology t, developer_tech dt WHERE d.id_developer=dt.id_developer AND t.id_technology=dt.id_technology AND dt.id_technology=2;"; //OK

// $sql = "SELECT alias, tech_name, level, (dt.id_technology * level) AS 'Puntuacion' FROM developer d, technology t, developer_tech dt WHERE d.id_developer=dt.id_developer AND t.id_technology=dt.id_technology AND dt.id_technology=2;"; //OK

// $sql = "SELECT alias, tech_name as 't1', level as 'l1', (dt.id_technology * level) AS 'Puntuacion',  FROM developer d, technology t, developer_tech dt  WHERE dt.id_technology=2 INNER JOIN tech_name as 't2', level as 'l2' WHERE dt.id_technology=3  ON d.id_developer=dt.id_developer AND t.id_technology=dt.id_technology;"; //COMENTAR A JORGE

// $sql = "SELECT alias, (dt.id_technology * level) AS 'Puntos1' FROM developer d, technology t, developer_tech dt INNER JOIN (dt.id_technology * level) as 'Puntos2' WHERE d.id_developer=dt.id_developer AND t.id_technology=dt.id_technology AND dt.id_technology=3;"; Comentar a Jorge

// $sql = "(SELECT alias, tech_name, level, (dt.id_technology * level) AS 'Puntuacion' FROM developer d, technology t, developer_tech dt WHERE d.id_developer=dt.id_developer AND t.id_technology=dt.id_technology AND dt.id_technology=2) INTERSECT (SELECT alias, tech_name, level, (dt.id_technology * level) as 'Puntuacion' FROM developer d, technology t, developer_tech dt WHERE d.id_developer=dt.id_developer AND t.id_technology=dt.id_technology AND dt.id_technology=3);"; //NO HAY INTERSECT EN MYSQL

// $sql = "SELECT alias, tech_name, concat(dt.id_technology, level) as 'Puntuacion' FROM developer d, technology t, developer_tech dt WHERE d.id_developer=dt.id_developer AND t.id_technology=dt.id_technology AND dt.id_technology=2;"; //LUEGO SERÁ EL ORDEN DE PREFERENCIA

// $sql = "SELECT GROUP_CONCAT(id_technology) AS tech_ids FROM search_tech WHERE id_search = 1;"

// $sql = "SELECT alias, tech_name FROM developer d, technology t, developer_tech dt WHERE d.id_developer=dt.id_developer AND t.id_technology=dt.id_technology AND dt.id_technology = 1;"

// $sql = "SELECT alias, tech_name FROM developer d, technology t, developer_tech dt WHERE d.id_developer=dt.id_developer AND t.id_technology=dt.id_technology AND dt.id_technology IN (SELECT GROUP_CONCAT(id_technology) AS tech_ids FROM search_tech WHERE id_search = 1);"

//Preparamos la consulta, mejor hacer la consulta con variables.
$sql = "";
$stmt = $dbh->prepare($sql);

//Ejecutamos la consulta
$stmt->execute();

//Guardamos en $resultado el valor del PDO
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);


//Se usa ForEach para recorrer los valors de la select
foreach($resultado as $fila){
	foreach ($fila as $clave => $valor){
		    echo $clave . $valor . "\n";
	}
}

?>
