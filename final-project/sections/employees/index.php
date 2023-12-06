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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Foto</th>
                            <th scope="col">HV</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Fecha de Ingreso</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">Eric Montilla</td>
                            <td>imagen.jpg</td>
                            <td>HV.pdf</td>
                            <td>Programador Sr.</td>
                            <td>07/05/2015</td>
                            <td>
                                <a
                                    name=""
                                    id=""
                                    class="btn btn-outline-secondary"
                                    href="#"
                                    role="button"
                                    >Carta</a
                                >
                                <a
                                    name=""
                                    id=""
                                    class="btn btn-outline-primary"
                                    href="#"
                                    role="button"
                                    >Editar</a
                                >
                                <a
                                    name=""
                                    id=""
                                    class="btn btn-outline-danger"
                                    href="#"
                                    role="button"
                                    >Button</a
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
<?php include("../../templates/footer.php"); ?>