"

"<?php

session_start();

//Variables de conexion a la base de datos

"$host="localhost";" // Nombre del host 

"$username="root";" // usuarioMysql 

"$password="Estrella";" // password Mysql 

"$db_name="mibase";" // Nombre de la BD

"$tbl_name="usuarios";" // Nombre d ela tabla





"mysql_connect(""$host"," ""$username"," ""$password")//Conexión

"or die("cannot connect");" //En caso de error

"mysql_select_db(""$db_name")//seleccion de base de datos

"or die("cannot select DB");//en caso de error



//Variables que toman valor de lo enviado desde el form


"$email="$_POST['inputemail'];

"$password="$_POST['inputpassword'];

"$usuario="$_POST['inputuser'];

"$telefono="$_POST['inputnumero'];

"$dir="$_POST['inputdir'];


"if ("filter_var("$email," FILTER_VALIDATE_EMAIL))" {//Filtro de validación de mail

"   $sql="select mail from usuarios where mail ='"$email'";//SEleccionamos la lista completa del campo usuarios 

"$result="mysql_query("$sql);

"$count="mysql_num_rows("$result);



if("$count>"0){//Si ya existe un usuario con ese mail



echo("<center>

<h1><font color='red'>El usuario<br><font color='blue'> "$email<br><font color='red'>ya existe!<br><a href='index.php'>Inicio</a>");



}else{//Si el usuario no existe



"$sql="INSERT INTO "$tbl_name (mail, password)VALUES( '"$email', '"$password', '"$usuario', '"$telefono', '"$dir')";

"$result="mysql_query("$sql);



if("$result){

"  header("location:panel.html");//Si todo es correcto redireccionamos a la index

}"else {

"echo "ERROR MySql";

}

// cerramos la conexión 

"mysql_close();

}

}else{

echo"<center>

<h1><font color='red'>Error el mail ingresado no es v&aacute;lido<br><a href='index.php'>Inicio</a>";

}

"?>