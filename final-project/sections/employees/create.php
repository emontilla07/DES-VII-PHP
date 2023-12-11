<?php
    include("../../db.php");

    if ($_POST) {
        $firstName = (isset($_POST["firstName"]) ? $_POST["firstName"] : "");
        $middleName = (isset($_POST["middleName"]) ? $_POST["middleName"] : "");
        $lastName = (isset($_POST["lastName"]) ? $_POST["lastName"] : "");
        $secondLastName = (isset($_POST["secondLastName"]) ? $_POST["secondLastName"] : "");
        $photo = (isset($_FILES["photo"]["name"]) ? $_FILES["photo"]["name"] : "");
        $hv = (isset($_FILES["hv"]["name"]) ? $_FILES["hv"]["name"] : "");
        $idJobPosition = (isset($_POST["idJobPosition"]) ? $_POST["idJobPosition"] : "");
        $dateAdmission = (isset($_POST["dateAdmission"]) ? $_POST["dateAdmission"] : "");

        $date_ = new DateTime();
        $newNamePhoto = ($photo != "") ? $date_->getTimestamp()."_".$_FILES["photo"]["name"] : "";
        $tmpPhoto = $_FILES["photo"]["tmp_name"];

        if ($tmpPhoto != "") {
            move_uploaded_file($tmpPhoto, "./img/".$newNamePhoto);
        }

        $newNameHv = ($hv != "") ? $date_->getTimestamp()."_".$_FILES["hv"]["name"] : "";
        $tmpHv = $_FILES["hv"]["tmp_name"];

        if ($tmpHv != "") {
            move_uploaded_file($tmpHv, "./doc/".$newNameHv);
        }

        $conn = $conection->prepare("INSERT INTO `employees` (`id`, `firstName`, `middleName`, `lastName`, `secondLastName`, 
                                                 `photo`, `cv`, `idJobPosition`, `dateAdmission`) 
                                     VALUES (NULL, :firstName, :middleName, :lastName, :secondLastName, :photo, :hv, 
                                             :idJobPosition, :dateAdmission);");

        $conn->bindParam(":firstName", $firstName);
        $conn->bindParam(":middleName", $middleName);
        $conn->bindParam(":lastName", $lastName);
        $conn->bindParam(":secondLastName", $secondLastName);
        $conn->bindParam(":photo", $newNamePhoto);
        $conn->bindParam(":hv", $newNameHv);
        $conn->bindParam(":idJobPosition", $idJobPosition);
        $conn->bindParam(":dateAdmission", $dateAdmission);
        $conn->execute();

        $mensaje = "Registro Agregado";

        header("location:index.php?mensaje=".$mensaje);
    }

    $conn = $conection->prepare("SELECT * FROM jobposition");
    $conn->execute();
    $listTableJobPosition = $conn->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../templates/header.php"); ?>
    <div class="card mt-3">
        <div class="card-header">
            Datos del Emplado
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="firstName" class="form-label">Primer Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        name="firstName"
                        id="firstName"
                        aria-describedby="helpId"
                        placeholder="Primer Nombre"
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
                    />
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Agregar Imagen</label>
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
                    <!-- <option selected>Select one</option> -->
                    <?php foreach($listTableJobPosition as $records) { ?>
                        <option value="<?php echo $records["id"] ?>"><?php echo $records["jobPositionName"] ?></option>
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
                    />
                </div>
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Agregar Empleado
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