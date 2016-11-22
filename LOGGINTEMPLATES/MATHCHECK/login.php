<?
//Recibimos los valores que intrujo el usuario desde el formulario.
$usuario = $_POST["n_usuario"];
$password = $_POST["pwd"];
//Creamos la conexión a la BD
$conexion = mysql_connect("localhost","root","root");
mysql_select_db("tuteam",$conexion);

//Escribimos la sentencia SQL que ejecutaremos.
$sql = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '$usuario' AND contrasenna='$password'";
//Ejecutamos la sentencia SQL
$comprobar = mysql_query($sql);

	//Contamos el numero de filas que arroja la sentencia SQL
	//Solo arrojará el "id_usuario" en caso de que los datos introducidos por el usuario sean correctos
	//Por tanto arrojará mas de -0- filas y eso nos indicará que los datos son correctos
	
if(mysql_num_rows($comprobar) > 0)
	{
	//Asignamos a una variable lo que llevará por -valor- la cookie
	$id_usuario = mysql_result($comprobar,0);
	//Establecemos la cookie para matener la sesión abierta.
	setcookie("misitio_userid","$id_usuario",time() + 3600);
	//hacemos la redirección al archivo que evalua si se inicio sesión o no.
	header("Location:inicio.php");
	}
	
else
	echo "Usuario o Contraseña incorrectos";

?>