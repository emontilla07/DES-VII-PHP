<?php
    include("../../db.php");

    if ($_POST) {
        $jobTitle = (isset($_POST["jobTitle"]) ? $_POST["jobTitle"] : "");

        $conn = $conection->prepare("INSERT INTO jobposition(id, jobPositionName) VALUES(null, :jobTitle)");
        $conn->bindParam(":jobTitle", $jobTitle);
        $conn->execute();

        $mensaje = "Registro Agregado";

        header("location:index.php?mensaje=".$mensaje);
    }
?>
<?php include("../../templates/header.php"); ?>
    <div class="card mt-3">
        <div class="card-header">Puestos</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="jobTitle" class="form-label">Nombre del Puesto</label>
                    <input
                        type="text"
                        class="form-control"
                        name="jobTitle"
                        id="jobTitle"
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
    </div>
<?php include("../../templates/footer.php"); ?>