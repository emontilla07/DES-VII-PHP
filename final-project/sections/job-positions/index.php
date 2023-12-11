<?php
    include("../../db.php");

    $conn = $conection->prepare("SELECT * FROM jobposition");
    $conn->execute();
    $listTableJobPosition = $conn->fetchAll(PDO::FETCH_ASSOC);
    
    if (isset($_GET["txtID"])) {
        $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");

        $conn = $conection->prepare("DELETE FROM jobposition WHERE id =:id ");
        $conn->bindParam(":id", $txtID);
        $conn->execute();

        header("location:index.php");
    }
?>
<?php include("../../templates/header.php"); ?>
    <div class="table-responsive-sm mt-3">
        <div class="card">
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
                <table class="table" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre del Puesto</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listTableJobPosition as $records) { ?>
                            <tr class="">
                                <td scope="row"><?php echo $records["id"]; ?></td>
                                <td><?php echo $records['jobPositionName']; ?></td>
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
                                        href="javascript:;"onclick="message(<?php echo $records["id"]; ?>)"
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
    <script src="../../js/alert.js"></script>
<?php include("../../templates/footer.php"); ?>