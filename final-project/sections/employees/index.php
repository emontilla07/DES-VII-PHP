<?php
    include("../../db.php");

    if (isset($_GET["txtID"])) {
        $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");

        $conn = $conection->prepare("SELECT photo, cv FROM employees WHERE id=:id");
        $conn->bindParam(":id", $txtID);
        $conn->execute();
        $recordsRecovered = $conn->fetch(PDO::FETCH_LAZY);

        if (isset($recordsRecovered["photo"]) && $recordsRecovered["photo"] != "") {
            if (file_exists("./img/".$recordsRecovered["photo"])) {
                unlink("./img/".$recordsRecovered["photo"]);
            }
        }

        if (isset($recordsRecovered["cv"]) && $recordsRecovered["cv"] != "") {
            if (file_exists("./doc/".$recordsRecovered["cv"])) {
                unlink("./doc/".$recordsRecovered["cv"]);
            }
        }

        $conn = $conection->prepare("DELETE FROM employees WHERE id =:id ");
        $conn->bindParam(":id", $txtID);
        $conn->execute();

        header("location:index.php");
    }

    $conn = $conection->prepare("SELECT *, (SELECT jobPositionName 
                                                FROM jobposition 
                                                    WHERE jobposition.id = employees.idJobPosition LIMIT 1) AS position 
                                    FROM employees");
    $conn->execute();
    $listTableEmployees = $conn->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../templates/header.php"); ?>
    <div class="card mt-3">
        <div class="card-header">
            <a
                name=""
                id=""
                class="btn btn-primary"
                href="create.php"
                role="button"
                >Agregar Registro</a
            >
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Foto</th>
                            <th scope="col">HV</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Fecha de Ingreso</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listTableEmployees as $records) { ?>
                            <tr class="">
                                <td scope="row"><?php echo $records["id"] ?></td>
                                <td>
                                    <?php echo $records["firstName"] ?>
                                    <?php echo $records["middleName"] ?>
                                    <?php echo $records["lastName"] ?>
                                    <?php echo $records["secondLastName"] ?>
                                </td>
                                <td>
                                    <img width="50" src="./img/<?php echo $records["photo"] ?>" alt="" class="img-fluid rounded">
                                </td>
                                <td><?php echo $records["cv"] ?></td>
                                <td><?php echo $records["position"] ?></td>
                                <td><?php echo $records["dateAdmission"] ?></td>
                                <td>
                                    <a
                                        class="btn btn-outline-primary me-2"
                                        href="update.php?txtID=<?php echo $records["id"]; ?>"
                                        role="button"
                                    >
                                        Editar
                                    </a>
                                    <a
                                        class="btn btn-outline-danger"
                                        href="index.php?txtID=<?php echo $records["id"]; ?>"
                                        role="button"
                                    >
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include("../../templates/footer.php"); ?>