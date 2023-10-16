<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["nombre"]) || !isset($_POST["apellido"])) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "conexion.php";
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];

/*
Al incluir el archivo "conexion.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */


$sentencia = $base_de_datos->prepare("INSERT INTO empleados(nombre, apellido) VALUES (?, ?);");
$resultado = $sentencia->execute([$nombre, $apellido]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
?>