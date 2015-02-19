"

"<?php

//Variables de conexion a la base de datos

"$host="localhost";" // Nombre del host 

"$username="root";" // usuarioMysql 

"$password="";" // password Mysql 

"$db_name="mibase";" // Nombre de la BD

"$tbl_name="usuarios";" // Nombre de la tabla



// Conexion a la base de datos en si misma

"mysql_connect(""$host"," ""$username"," ""$password")"or die("no se puede conectar a la BD");" 

mysql_select_db(""$db_name")"or die("no se pudo seleccionar la BD");



// username and password sent from form 

"$myusername="$_POST['username'];" 

$mypassword="$_POST['Password'];" 

$myusername =" stripslashes("$myusername);

"$mypassword =" stripslashes("$mypassword);

"$myusername =" mysql_real_escape_string("$myusername);

"$mypassword =" mysql_real_escape_string("$mypassword);

"$sql="SELECT * FROM "$tbl_name WHERE mail='"$myusername' and password='"$mypassword'";

"$result="mysql_query("$sql);

"$count="mysql_num_rows("$result);

if("$count=="1){

"session_register("myusername");

"session_register("mypassword");" 

header("location:panel.html");

}"else {

echo"<center>

<h1><font color='red'>Error, usuario o contrase&ntilde;a incorrectos<br>

<a href='index.php'>Inicio</a>";



}

"?>