<?php
    include("../../db.php");

    if (isset($_GET["txtID"])) {
        $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");

        $conn = $conection->prepare("SELECT * FROM users WHERE id =:id ");
        $conn->bindParam(":id", $txtID);
        $conn->execute();
        $record = $conn->fetch(PDO::FETCH_LAZY);
        $userName = $record["user"];
        $password = $record["password"];
        $email = $record["email"];
    }

    if ($_POST) {
        $userName = (isset($_POST["userName"]) ? $_POST["userName"] : "");
        $password = (isset($_POST["password"]) ? $_POST["password"] : "");
        $email = (isset($_POST["email"]) ? $_POST["email"] : "");

        $conn = $conection->prepare("UPDATE users SET user=:userName, password=:password, email=:email WHERE id=:id");
        $conn->bindParam(":userName", $userName);
        $conn->bindParam(":password", $password);
        $conn->bindParam(":email", $email);
        $conn->bindParam(":id", $txtID);
        $conn->execute();

        $mensaje = "Registro Actualizado";

        header("location:index.php?mensaje=".$mensaje);
    }
?>
<?php include("../../templates/header.php"); ?>
    editar usuarios
    <div class="card mt-3">
        <div class="card-header">Datos del Usuarios</div>
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
                    <label for="userName" class="form-label">Nombre del Usuario</label>
                    <input
                        type="text"
                        class="form-control"
                        name="userName"
                        id="userName"
                        aria-describedby="helpId"
                        placeholder="johndoug01"
                        value="<?php echo $userName; ?>"
                    />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input
                        type="text"
                        class="form-control"
                        name="password"
                        id="password"
                        aria-describedby="helpId"
                        placeholder="***********"
                        value="<?php echo $password; ?>"
                    />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        aria-describedby="helpId"
                        placeholder="example@example.com"
                        value="<?php echo $email; ?>"
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
    </div>
<?php include("../../templates/footer.php"); ?>