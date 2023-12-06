<?php include("../../templates/header.php"); ?>
<div class="card mt-3">
        <div class="card-header">Datos del Usuarios</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="userName" class="form-label">Nombre del Usuario</label>
                    <input
                        type="text"
                        class="form-control"
                        name="userName"
                        id="userName"
                        aria-describedby="helpId"
                        placeholder="johndoug01"
                    />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        id="password"
                        aria-describedby="helpId"
                        placeholder="***********"
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
                    />
                </div>
                
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Agregar Usuarios
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