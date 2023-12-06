<?php include("../../templates/header.php"); ?>
    <!-- crear empleados -->
    <div class="card mt-3">
        <div class="card-header">
            Datos del Emplado
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Primer Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name"
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
                    <label for="idPosition" class="form-label">Puestos</label>
                    <select
                        class="form-select form-select-sm"
                        name="idPosition"
                        id="idPosition"
                    >
                        <option selected>Select one</option>
                        <option value="">New Delhi</option>
                        <option value="">Istanbul</option>
                        <option value="">Jakarta</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dateOfAdmission" class="form-label">Fecha de Ingreso</label>
                    <input
                        type="date"
                        class="form-control"
                        name="dateOfAdmission"
                        id="dateOfAdmission"
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