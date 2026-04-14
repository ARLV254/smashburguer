<button class="btn btn-primary" onclick="Incluir()" data-bs-toggle="modal" data-bs-target="#modalRoles">
    Nuevo Rol
</button>

<div class="modal fade" id="modalRoles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="modalTitle">Nuevo Rol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formRoles">
                    <input type="hidden" id="idRol" name="id">
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Rol</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Ej: Administrador" required />
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" 
                            placeholder="Descripción de las funciones del rol" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Accesos del Sistema</strong></label>
                        <p class="text-muted small">Seleccione los módulos permitidos:</p>
                        <div class="form-check">
                            <input class="form-check-input check-acceso" type="checkbox" value="Usuarios" id="checkUsuarios">
                            <label class="form-check-label" for="checkUsuarios">Usuarios</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input check-acceso" type="checkbox" value="Roles" id="checkRoles">
                            <label class="form-check-label" for="checkRoles">Roles</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input check-acceso" type="checkbox" value="Juguetes" id="checkJuguetes">
                            <label class="form-check-label" for="checkJuguetes">Juguetes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input check-acceso" type="checkbox" value="Categorias" id="checkCategorias">
                            <label class="form-check-label" for="checkCategorias">Categorías</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input check-acceso" type="checkbox" value="Empresa" id="checkEmpresa">
                            <label class="form-check-label" for="checkEmpresa">Empresa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input check-acceso" type="checkbox" value="Tienda" id="checkTienda">
                            <label class="form-check-label" for="checkTienda">Tienda</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input check-acceso" type="checkbox" value="Sucursales" id="checkSucursales">
                            <label class="form-check-label" for="checkSucursales">Sucursales</label>
                        </div>
                        <input type="hidden" id="accesos" name="accesos">
                    </div>

                    <div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="text" class="form-control" id="fecha" name="fecha"
        value="<?php echo date("Y-m-d"); ?>" readonly />
</div>

                    <div class="mb-3">
                        <label class="control-label">Estatus</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="modal-footer mt-1 pt-0 pb-0 border-0 d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary me-2" id="btnActionForm">
                            <span id="btnText">Guardar</span>
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>