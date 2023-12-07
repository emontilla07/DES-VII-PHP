<?php
    include("../../db.php");

    if (isset($_GET["txtID"])) {
        $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");

        $conn = $conection->prepare("SELECT * FROM jobposition WHERE id =:id ");
        $conn->bindParam(":id", $txtID);
        $conn->execute();
        $record = $conn->fetch(PDO::FETCH_LAZY);
        $jobTitle = $record["jobPositionName"];
    }

    if ($_POST) {
        $jobTitle = (isset($_POST["jobTitle"]) ? $_POST["jobTitle"] : "");

        $conn = $conection->prepare("UPDATE jobposition SET jobPositionName=:jobTitle WHERE id=:id");
        $conn->bindParam(":jobTitle", $jobTitle);
        $conn->bindParam(":id", $txtID);
        $conn->execute();

        header("location:index.php");
    }
?>
<?php include("../../templates/header.php"); ?>
    <div class="card mt-3">
        <div class="card-header">Puestos</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="txtID" class="form-label">ID</label>
                    <input
                        type="text"
                        class="form-control"
                        name="txtID"
                        id="txtID"
                        aria-describedby="helpId"
                        placeholder="ID"
                        readonly
                        value="<?php echo $txtID; ?>"
                    />
                </div>                
                <div class="mb-3">
                    <label for="jobTitle" class="form-label">Nombre del Puesto</label>
                    <input
                        type="text"
                        class="form-control"
                        name="jobTitle"
                        id="jobTitle"
                        aria-describedby="helpId"
                        placeholder="Nombre del Puesto"
                        value="<?php echo $jobTitle; ?>"
                    />
                </div>
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Guardar
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