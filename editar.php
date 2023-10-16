<?php
include_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['empleadoid'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $sentencia = "UPDATE empleados SET nombre='" . $nombre . "', apellido='" . $apellido . "' WHERE empleadoid = " . $id;

    $result = $base_de_datos->exec($sentencia);

    if($result > 0){
        echo '<div class="container"><p class="text-success mt-4">Registro actualizado</p></div>';
    }

}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sentencia = $base_de_datos->query("select empleadoid, nombre, apellido from empleados where empleadoid =" . $id);
    $result = $sentencia->fetchAll(PDO::FETCH_OBJ);

    if(count($result) > 0){
        $empleado = $result[0];
    }
}

?>

<?php include_once('header.php') ?>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-6">
                <h3>Editar</h3>
                <hr>
                <form action="" method="POST">

                    <div class="mt-3">
                        <input required name="empleadoid" type="number" value="<?= $id ?>" hidden>
                    </div>

                    <div class="mt-3">
                        <label for="nombre">NOMBRE</label>
                        <input required name="nombre" type="text" value="<?= trim($empleado->nombre) ?>" placeholder="Nombre de Empleado" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="apellido">APELLIDO</label>
                        <input required name="apellido" type="text" value="<?= trim($empleado->apellido) ?>" placeholder="Apellido del Empleado" class="form-control">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a class="btn btn-danger" href="listar.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('footer.php') ?>