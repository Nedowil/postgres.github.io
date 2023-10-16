<?php
include_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['empleadoid'];

    $sentencia = "DELETE FROM empleados WHERE empleadoid = " . $id;

    try {
        $result = $base_de_datos->exec($sentencia);

        if($result > 0){
            echo '<script>alert("Empleado eliminado")</script>';
            header("Location: listar.php");
        }
    } catch (Exception $e) {
        echo '<div class="container"><p class="text-danger mt-4">Error al eliminar<br>El empleadoid se usa en otra tabla. '.$e->getMessage() .'</p></div>';
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
    <div class="container mt-3">

        <h3>Información del empleado</h3>
        <hr>

        <div class="row mt-3">
            <label class="form-label col-2"><strong>Nombre</strong></label>: 
                <?= $empleado->nombre ?>
        </div>

        <div class="row mt-3">
            <label class="form-label col-2"><strong>Apellido</strong></label>: 
                <?= $empleado->apellido ?>
        </div>

        <div>
            <form action="" method="POST">

                <div class="mt-3">
                    <input required name="empleadoid" type="number" value="<?= $id ?>" hidden>
                </div>

                <p>¿Estás seguro que quieres eliminar el empleado?</p>

                <div class="mt-3">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <a class="btn btn-primary" href="listar.php">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <?php include_once('footer.php') ?>