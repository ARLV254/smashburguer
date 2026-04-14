<button class="btn btn-primary" onclick="Incluir()" data-bs-toggle="modal" data-bs-target="#modalJuguete">
    Nuevo Juguete
</button>

<div class="modal fade" id="modalJuguete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Nuevo Juguete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formJuguete" enctype="multipart/form-data">
                    <input type="hidden" id="idJuguete" name="id">
                    <input type="hidden" id="imagenVieja" name="imagenVieja">
                    
                    <div class="mb-3">
                        <label class="form-label">Nombre del Juguete</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Edad Estimada</label>
                            <input type="text" class="form-control" id="edad_estimada" name="edad_estimada" placeholder="Ej: 3-5 años" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" required>
                    </div>

                    <div class="mb-3">
                        <label class="control-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Existente</option>
                            <option value="2">Agotado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Imagen</label>
                        <input type="file" class="form-control" name="imagen">
                    </div>

                    <div class="modal-footer mt-1 pt-0 pb-0 border-0 d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary me-2" id="btnActionForm">
                            <span id="btnText">Guardar</span>
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>