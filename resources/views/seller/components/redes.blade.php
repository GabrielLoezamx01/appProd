<div v-if="redes" class="m-3">
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
        <label for="msg" class="text-danger fw-light" style="font-size: 12px"> Obligatorio </label>
    </div>
    <div class="mb-3">
        <button class="btn btn-login" @click="updateRedes()" data-bs-dismiss="modal"
            aria-label="Close">Actualizar</button>
    </div>
</div>
