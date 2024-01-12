<div class="m-3" v-if="horarios">
    <div v-for="day in dias" :key="day.id" class="m-3 p-2">
        <div class="mb-3">
            <label for="name" class="fw-bold">@{{ day.name }}</label>
            <div class="row">
                <div class="col mt-2">
                    <label>Hora de inicio</label>
                    <input type="time" v-model="day.onTime" class="borderless-input" @input="updateOnTime(day.id)">
                </div>
                <div class="col mt-2">
                    <label>Hora de cierre</label>
                    <input type="time" v-model="day.offTime" class="borderless-input" @input="updateOffTime(day.id)">
                </div>
            </div>
        </div>
    </div>
</div>
