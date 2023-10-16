<?php
include_once "conexion.php";
$sentencia = $base_de_datos->query("select empleadoid, nombre, apellido from empleados");
$empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->

<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Listar con arreglo</h1>
		
		<br>
		<div class="table-responsive">
			<table border="1" align="center" class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($empleado as $emp){ ?>
						<tr>
							<td><?php echo $emp->empleadoid ?></td>
							<td><?php echo $emp->nombre ?></td>
							<td><?php echo $emp->apellido ?></td>
							<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $emp->empleadoid?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $emp->empleadoid?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>