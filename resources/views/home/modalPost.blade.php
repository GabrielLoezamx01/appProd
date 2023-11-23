<div class="modal fade custom-modal " style="margin-top: 60px;" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header text-center m-3">
            <img src="img/icon.jpg"  class="img-fluid rounded-circle" style="width: 20px; height: 20px;" >
          <h1 class="modal-title fs-5 fw-bold " style="margin-left: 20px;" id="staticBackdropLabel">Publicacion</h1>
          <button type="button" class="btn-close fw-bold" style="color: #062D00" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-3">
            <label for="InputSelect" class="text-login fs-6">Seleccione categoria</label>
            <div class="custom-select">
                <select v-model="selectedCategory" class="btn-app">
                    <option :disabled="true" :value="null"> Categorias </option>
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                      @{{ category.name }}
                    </option>
                  </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
</div>
