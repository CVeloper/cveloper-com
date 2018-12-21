<?php

$db_user = 'form_user';
$db_pass = 'form_1234';
$db_name = 'form_practica';

//
//
//
// sergio@sergio-VirtualBox:~$ sudo su -
// [sudo] password for sergio: alumno
//
//
//
// root@sergio-VirtualBox:/# mysql
//
// 	   Welcome to the MySQL monitor.
// 	   Your MySQL connection id is 8
// 	   Server version: 5.7.24-0ubuntu0.18.04.1 (Ubuntu)
//
//
//
// mysql> CREATE DATABASE form_practica;
//
//     Query OK, 1 row affected (0.00 sec)
//
//
//
// mysql> CREATE USER 'form_user'@'localhost' IDENTIFIED BY 'form_1234';
//
//     Query OK, 0 rows affected (0.00 sec)
//
//
//
// mysql> GRANT ALL PRIVILEGES ON form_practica.* TO 'form_user'@'localhost' WITH GRANT OPTION;
//
//     Query OK, 0 rows affected (0.00 sec)
//
//
//
// mysql> ^DBye
//
//
//
// root@sergio-VirtualBox:~# cd /var/www/html/dwes
//
//
//
// root@sergio-VirtualBox:/var/www/html/dwes# cd practica_formularios/bin
//
//
//
// root@sergio-VirtualBox:/var/www/html/dwes/practica_formularios/bin# sh script_creacion_BD.sh
//
//     mysql: [Warning] Using a password on the command line interface can be insecure.
//
//
//
// root@sergio-VirtualBox:/var/www/html/dwes/practica_formularios/bin# mysql
//
// 	   Welcome to the MySQL monitor.
// 	   Your MySQL connection id is 8
// 	   Server version: 5.7.24-0ubuntu0.18.04.1 (Ubuntu)
//
//
// mysql> SHOW DATABASES;
//
//
//
// mysql> use form_practica
//
//
//
// mysql> SHOW TABLES;
//
//
//
// mysql> DESCRIBE formularios;
//
//
//
// mysql> ^DBye
//
//
// 
// root@sergio-VirtualBox:~# mysqldump -u form_user -pform_1234 form_practica > /var/www/html/dwes/export.sql
//
//     mysqldump: [Warning] Using a password on the command line interface can be insecure.
//
//
//

?>
