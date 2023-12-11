<?php
    include("../../db.php");

    $conn = $conection->prepare("SELECT * FROM users");
    $conn->execute();
    $listTableUsers = $conn->fetchAll(PDO::FETCH_ASSOC);
    
    if (isset($_GET["txtID"])) {
        $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");

        $conn = $conection->prepare("DELETE FROM users WHERE id =:id ");
        $conn->bindParam(":id", $txtID);
        $conn->execute();

        $mensaje = "Registro Eliminado";

        header("location:index.php?mensaje=".$mensaje);
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
                            <th scope="col">Nombre del Usuario</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listTableUsers as $records) { ?>
                            <tr>
                                <td scope="row"><?php echo $records["id"] ?></td>
                                <td><?php echo $records["user"] ?></td>
                                <td>*********</td>
                                <td><?php echo $records["email"] ?></td>
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
                                        href="javascript:deleteRecords(<?php echo $records['id']; ?>)"
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
            <div class="card-footer text-muted"></div>
        </div>
<?php include("../../templates/footer.php"); ?>