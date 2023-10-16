<div class="row">
    <div class="col-12">
        <h1>AGREGAR</h1>
        <form action="insertar.php" method="POST">
        <div class="form-group">
            <label for="nombre" >NOMBRE</label>
            <input required name="nombre" type="text" id="nombre" placeholder="Nombre de Empleado" class="form-control">
        </div>
        <div class="form-group">
            <label for="apellido" >APELLIDO</label>
            <input required name="apellido" type="text" id="apellido" placeholder="Apellido del Empleado" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">GUARDAR</button>
        </form>
    </div>
</div>