<?php include("../../templates/header.php"); ?>
    <div class="card mt-3">
        <div class="card-header">Puestos</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="namePosition" class="form-label">Nombre del Puesto</label>
                    <input
                        type="text"
                        class="form-control"
                        name="namePosition"
                        id="namePosition"
                        aria-describedby="helpId"
                        placeholder="Nombre del Puesto"
                    />
                </div>
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Agregar Puestos
                </button>
                <a
                    name=""
                    id=""
                    class="btn btn-danger"
                    href="index.php"
                    role="button"
                    >Cancelar</a
                >
            </form>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
<?php include("../../templates/footer.php"); ?>