<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center m-3">
                <img src="{{ asset('img/icon.jpg') }}" class="img-fluid rounded-circle"
                    style="width: 20px; height: 20px;">
                <h1 class="modal-title fs-5 fw-bold " style="margin-left: 20px;" id="staticBackdropLabel">
                    @{{ modalTitle }}
                </h1>
                <button type="button" class="btn-close fw-bold" style="color: #062D00" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div v-if="modalsucursal == true">
                    <div class="fade show  p-3" v-if="section1 == true">
                        <div class="mb-3">
                            <label for="name" class="fw-light">Nombre de la sucursal</label>
                            <input v-model="name" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="info" class="fw-light">Acerca de</label>
                            <input v-model="info" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3 p-5">
                            <button class="btn btn-login" @click="nextSection()">Siguiente</button>
                        </div>
                    </div>
                    <div class="fade show p-3" v-if="section2 == true">
                        <div class="mb-3">
                            <label for="postal" class="fw-light">Código Postal</label>
                            <input v-model="postal" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="Dirreción" class="fw-light">Dirreción</label>
                            <input v-model="Dirrecion" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="Estado" class="fw-light">Estado</label>
                            <input v-model="estado" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="Ciudad" class="fw-light">Ciudad</label>
                            <input v-model="ciudad" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3 p-5">
                            <button class="btn btn-login" @click="nextSection(2)">Regresar</button>

                            <button class="btn btn-login mt-3" @click="nextSection(3)">Siguiente</button>
                        </div>
                    </div>
                    <div class="fade show p-3" v-if="section3 == true">
                        <div class="mb-3">
                            <label for="Facebook" class="fw-light">Facebook</label>
                            <input v-model="Facebook" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="Tiktok" class="fw-light">Tiktok</label>
                            <input v-model="Tiktok" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="Instagram" class="fw-light">Instagram</label>
                            <input v-model="Instagram" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="X" class="fw-light">X (twitter) </label>
                            <input v-model="X" type="text" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="Whatsapp" class="fw-light">Whatsapp</label>
                            <input v-model="Whatsapp" type="number" class="borderless-input mt-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="Correo" class="fw-light">Correo</label>
                            <input v-model="Correo" type="email" class="borderless-input mt-3" required placeholder="Obligatorio">
                            <label for="msg" class="text-danger fw-light"> Obligatiorio </label>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-login" @click="saveSeller()" data-bs-dismiss="modal"
                                aria-label="Close">Guardar</button>
                        </div>
                    </div>
                </div>
                <div v-if="sectionPost == true" class="fade show p-3">
                    <div class="mb-3">
                        <label for="selectSucursal">Sucursal</label>
                        <select v-model="selectSucursal" class="mt-2">
                            <option :value="item.id" v-for="item in Data">@{{ item.nombre }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <textarea v-model="content" maxlength="300" class="mt-3 post-content fw-light text-justify"
                        placeholder="¿Que hay de nuevo?" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-options" title="Añadir Imágenes" @click="openFileExplorer">
                            <i class="fas fa-image" v-if="sectionPost == true"></i>
                        </button>
                        <span class="fs-6 opacity-25 m-3 ">
                            Imagenes
                         </span>
                          <input type="file" ref="fileInput" style="display: none" @change="handleFileChange" accept="image/*" multiple>
                    </div>
                    <div class="mb-3 mt-5">
                        <button @click="crearPublicacion()" data-bs-dismiss="modal" aria-label="Close" type="button" class="btn-login">Publicar</button>
                    </div>
                </div>
                {{-- <div class="modal-footer text-center">
                <button @click="PostPublication()" data-bs-dismiss="modal"
                aria-label="Close" type="button" class="btn-login">Publicar</button>
            </div> --}}

            </div>
        </div>

    </div>
</div>
