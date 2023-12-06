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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre del Puesto</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">1</td>
                            <td>Programador Jr</td>
                            <td>
                                <input
                                    name="btnUpdate"
                                    id="btnUpdate"
                                    class="btn btn-outline-primary"
                                    type="button"
                                    value="Editar"
                                />
                                <input
                                    name="btnDelete"
                                    id="btnDelete"
                                    class="btn btn-outline-danger"
                                    type="button"
                                    value="Eliminar"
                                />
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>  
        </div>
            <div class="card-footer text-muted"></div>
        </div>
<?php include("../../templates/footer.php"); ?>