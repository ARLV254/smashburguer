<!-- Button trigger modal -->
<button class="btn btn-primary" onclick="Incluir()" data-bs-toggle="modal" data-bs-target="#modalCategoria">
    Nueva Categoría
</button>
<!-- Modal -->
<div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="modalTitle">Nueva Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--begin::Quick Example-->
                <form class="form-horizontal" id="formCategoria" enctype="multipart/form-data">
                    <input type="hidden" id="idCategoria" name="id">
                    <input type="hidden" id="imagenVieja" name="imagenVieja">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Nombre de categoria" required />
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descipcion"
                            placeholder=" Descripcion de categoria" required />
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="text" class="form-control" id="fecha" name="fecha"
                            placeholder="<?php echo date("d-m-y"); ?>" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="control-label">Estatus</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputGroupFile02" class="form-label">Imagen de la Categoría</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile02" name="imagen">
                        </div>
                        <div id="containerNombreImagen" class="mt-2" style="display: none;">
                            <span class="badge bg-light text-dark border">
                                Imagen actual: <span id="nombreImagenActual"></span>
                            </span>
                        </div>
                    </div>
                    <div class="mt-2">
                    </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="modal-footer mt-1 pt-0 pb-0 border-0 d-flex justify-content-start">
                <button type="submit" class="btn btn-primary me-2" id="btnActionForm">
                    <span id="btnText">Guardar</span>
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <!--end::Footer-->
            </form>
            <!--end::Quick Example-->
        </div>
    </div>
</div>
</div>