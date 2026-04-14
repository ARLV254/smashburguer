 <!-- Button trigger modal -->
 <button class="btn btn-primary" onclick="Incluir()" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
     Nuevo Usuario
 </button>
 <!-- Modal -->
 <div class="modal fade" id="modalUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header headerRegister">
                 <h5 class="modal-title" id="modalTitle">Nuevo Usuario</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <!--begin::Quick Example-->
                 <form class="form-horizontal" id="formUsuarios" enctype="multipart/form-data">
                     <!-- INPUT OCULTO PARA EL ID -->
                     <input type="hidden" id="idUsuario" name="id">
                     <div class="mb-3">
                         <label for="nombre" class="form-label">Nombre</label>
                         <input type="text" class="form-control" id="nombre" name="nombre"
                             placeholder="Nombre del usuario" required />
                     </div>
                     <div class="mb-3">
                         <label for="direccion" class="form-label">Dirección</label>
                         <input type="text" class="form-control" id="direccion" name="direccion"
                             placeholder=" Dirección del usuario" required />
                     </div>
                     <div class="mb-3">
                         <label for="email" class="form-label">Email</label>
                         <input type="text" class="form-control" id="email" name="email"
                             placeholder="Ingresa Correo electronico " required />
                     </div>
                     <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" name="password" id="password"
                             class="form-control" />
                     </div>

                     <div class="mb-3">
                         <label class="control-label">Roles</label>
                         <select class="form-control" id="rolid" name="rolid">
                             <option value="3">Admin</option>
                             <option value="2">Empleado</option>
                             <option value="4">Cliente</option>
                         </select>
                     </div>
                     <div class=" mb-3">
                         <label for="fecha" class="form-label">Fecha</label>
                         <input type="text" class="form-control" id="fecha" name="fecha"
                             placeholder="<?php echo date("d-m-y"); ?>" readonly />
                     </div>
                     <div class="mb-3">
                         <label class="control-label">Estatus</label>
                         <select class="form-control" id="status" name="status">
                             <option value="1">Activo</option>
                             <option value="2">Inactivo</option>
                         </select>
                     </div>
                     <!--end::Body-->
                     <!--begin::Footer-->
                     <button type="submit" class="btn btn-primary" id="btnActionForm">
                         <span id="btnText">Guardar</span>
                     </button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <!--end::Footer-->
                 </form>
                 <!--end::Quick Example-->
             </div>
         </div>
     </div>
 </div>