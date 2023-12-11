<?php
    include("../../db.php");

    if (isset($_GET["txtID"])) {
        $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");

        $conn = $conection->prepare("SELECT * FROM employees WHERE id=:id");
        $conn->bindParam(":id", $txtID);
        $conn->execute();
        $records = $conn->fetch(PDO::FETCH_LAZY);

        $firstName = $records["firstName"];
        $middleName = $records["middleName"];
        $lastName = $records["lastName"];
        $secondLastName = $records["secondLastName"];
        $photo = $records["photo"];
        $hv = $records["cv"];
        $idJobPosition = $records["idJobPosition"];
        $dateAdmission = $records["dateAdmission"];

        $conn = $conection->prepare("SELECT * FROM jobposition");
        $conn->execute();
        $listTableJobPosition = $conn->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($_POST) {
        $txtID = (isset($_POST["txtID"]) ? $_POST["txtID"] : "");
        $firstName = (isset($_POST["firstName"]) ? $_POST["firstName"] : "");
        $middleName = (isset($_POST["middleName"]) ? $_POST["middleName"] : "");
        $lastName = (isset($_POST["lastName"]) ? $_POST["lastName"] : "");
        $secondLastName = (isset($_POST["secondLastName"]) ? $_POST["secondLastName"] : "");
        $idJobPosition = (isset($_POST["idJobPosition"]) ? $_POST["idJobPosition"] : "");
        $dateAdmission = (isset($_POST["dateAdmission"]) ? $_POST["dateAdmission"] : "");

        $conn = $conection->prepare("UPDATE employees
                                        SET firstName=:firstName, middleName=:middleName, lastName=:lastName,
                                            secondLastName=:secondLastName, idJobPosition=:idJobPosition,
                                            dateAdmission=:dateAdmission
                                            WHERE id=:id");

        $conn->bindParam(":firstName", $firstName);
        $conn->bindParam(":middleName", $middleName);
        $conn->bindParam(":lastName", $lastName);
        $conn->bindParam(":secondLastName", $secondLastName);
        $conn->bindParam(":idJobPosition", $idJobPosition);
        $conn->bindParam(":dateAdmission", $dateAdmission);
        $conn->bindParam(":id", $txtID);
        $conn->execute();

        $photo = (isset($_FILES["photo"]["name"]) ? $_FILES["photo"]["name"] : "");

        $date_ = new DateTime();
        $newNamePhoto = ($photo != "") ? $date_->getTimestamp()."_".$_FILES["photo"]["name"] : "";
        $tmpPhoto = $_FILES["photo"]["tmp_name"];

        if ($tmpPhoto != "") {
            move_uploaded_file($tmpPhoto, "./img/".$newNamePhoto);

            $conn = $conection->prepare("SELECT photo FROM employees WHERE id=:id");
            $conn->bindParam(":id", $txtID);
            $conn->execute();
            $recordsRecovered = $conn->fetch(PDO::FETCH_LAZY);

            if (isset($recordsRecovered["photo"]) && $recordsRecovered["photo"] != "") {
                if (file_exists("./img/".$recordsRecovered["photo"])) {
                    unlink("./img/".$recordsRecovered["photo"]);
                }
            }

            $conn = $conection->prepare("UPDATE employees SET photo=:photo WHERE id=:id");
            $conn->bindParam(":photo", $newNamePhoto);
            $conn->bindParam(":id", $txtID);
            $conn->execute();
        }

        $hv = (isset($_FILES["hv"]["name"]) ? $_FILES["hv"]["name"] : "");

        $newNameHv = ($hv != "") ? $date_->getTimestamp()."_".$_FILES["hv"]["name"] : "";
        $tmpHv = $_FILES["hv"]["tmp_name"];

        if ($tmpHv != "") {
            move_uploaded_file($tmpHv, "./doc/".$newNameHv);

            $conn = $conection->prepare("SELECT cv FROM employees WHERE id=:id");
            $conn->bindParam(":id", $txtID);
            $conn->execute();
            $recordsRecovered = $conn->fetch(PDO::FETCH_LAZY);

            if (isset($recordsRecovered["cv"]) && $recordsRecovered["cv"] != "") {
                if (file_exists("./doc/".$recordsRecovered["cv"])) {
                    unlink("./doc/".$recordsRecovered["cv"]);
                }
            }

            $conn = $conection->prepare("UPDATE employees SET cv=:hv WHERE id=:id");
            $conn->bindParam(":hv", $newNameHv);
            $conn->bindParam(":id", $txtID);
            $conn->execute();
        }

        $mensaje = "Registro Actualizado";

        header("location:index.php?mensaje=".$mensaje);
    }
?>
<?php include("../../templates/header.php"); ?>
    editar empleados
    <div class="card mt-3">
        <div class="card-header">
            Datos del Emplado
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
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
                    <label for="firstName" class="form-label">Primer Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        name="firstName"
                        id="firstName"
                        aria-describedby="helpId"
                        placeholder="Primer Nombre"
                        value="<?php echo $firstName; ?>"
                    />
                </div>
                <div class="mb-3">
                    <label for="middleName" class="form-label">Segundo Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        name="middleName"
                        id="middleName"
                        aria-describedby="helpId"
                        placeholder="Segundo Nombre"
                        value="<?php echo $middleName; ?>"
                    />
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Primer Apellido</label>
                    <input
                        type="text"
                        class="form-control"
                        name="lastName"
                        id="lastName"
                        aria-describedby="helpId"
                        placeholder="Primer Apellido"
                        value="<?php echo $lastName; ?>"
                    />
                </div>
                <div class="mb-3">
                    <label for="secondLastName" class="form-label">Segundo Apellido</label>
                    <input
                        type="text"
                        class="form-control"
                        name="secondLastName"
                        id="secondLastName"
                        aria-describedby="helpId"
                        placeholder="Segundo Apellido"
                        value="<?php echo $secondLastName; ?>"
                    />
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Agregar Imagen</label>
                    <br>
                    <img width="50" src="./img/<?php echo $photo; ?>" alt="" class="img-fluid rounded">
                    <input
                        type="file"
                        class="form-control"
                        name="photo"
                        id="photo"
                        placeholder="imagen.jpg | jpeg | png"
                        aria-describedby="fileHelpId"
                    />
                </div>
                <div class="mb-3">
                    <label for="hv" class="form-label">Agregar HV</label>
                    <br>
                    <a href="./doc/<?php echo $hv; ?>"><?php echo $hv; ?></a>
                    <input
                        type="file"
                        class="form-control"
                        name="hv"
                        id="hv"
                        placeholder="ejemplo.pdf"
                        aria-describedby="fileHelpId"
                    />
                </div>
                <div class="mb-3">
                    <label for="idJobPosition" class="form-label">Puestos</label>
                    <select
                        class="form-select form-select-sm"
                        name="idJobPosition"
                        id="idJobPosition"
                    >
                        <?php foreach($listTableJobPosition as $records) { ?>
                            <option <?php echo ($idJobPosition == $records["id"]) ? "selected" : ""; ?> 
                                value="<?php echo $records["id"] ?>">
                                <?php echo $records["jobPositionName"] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dateAdmission" class="form-label">Fecha de Ingreso</label>
                    <input
                        type="date"
                        class="form-control"
                        name="dateAdmission"
                        id="dateAdmission"
                        aria-describedby="emailHelpId"
                        placeholder="Fecha de Ingreso"
                        value="<?php echo $dateAdmission; ?>"
                    />
                </div>
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Actualizar
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