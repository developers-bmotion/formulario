<template>
   <div>
        <div class="card-header">
            <h3 class="mb-0 text-center">Gira</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label">País de la compañía</label>
                        <model-list-select
                            :list="paises"
                            v-model="giras.paises_id"
                            option-value="codigo"
                            option-text="pais"
                            placeholder="Seleccione un pais"
                            @searchchange="getCiudades"
                            :isError="validarForm && !giras.paises_id"
                        >
                        </model-list-select>
                    </div>
                </div>

                <!-- Tabla información pantalla grande -->
                <table class="table overflow-hidden d-none d-xl-block mx-3" v-if="this.giras.paises_id">
                    <thead>
                        <tr>
                            <th>Fecha del evento</th>
                            <th>Hora del evento</th>
                            <th>Aforo del evento</th>
                            <th style="width: 10rem;">Ciudades del evento</th>
                            <th>Lugar del evento</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(evento, index) in giras.data" :key="index">
                            <td>
                                <input class="form-control datepicker" v-model="evento.fecha" placeholder="Select date" type="date">
                            </td>
                            <td>
                                <input class="form-control" v-model="evento.hora" type="time" placeholder="">
                            </td>
                            <td>
                                <select
                                :class="(validarForm&&!evento.aforos_id)?'is-invalid':''"
                                class="form-control" id="selectTipoEvento" v-model="evento.aforos_id">
                                    <option :value="null">[ Seleccione un aforo ]</option>
                                    <option :key="aforo.id" v-for="aforo of aforos" :value="aforo.id" v-text="aforo.rango" ></option>
                                </select>
                                <div class="invalid-feedback">
                                    Seleccione un aforo
                                </div>
                            </td>
                            <td class="container-buscar">
                                <model-list-select
                                    :list="ciudades"
                                    v-model="evento.ciudades_id"
                                    option-value="idCiudades"
                                    option-text="ciudad"
                                    placeholder="Seleccione una ciudad"
                                    style="position: absoluted"
                                    :isError="validarForm && giras.paises_id && !evento.ciudades_id"
                                >
                                </model-list-select>
                            </td>
                            <td>
                                <!--<input-component
                                    label="Lugar del evento"
                                    id="txtEventoLugar"
                                    pattern="all"
                                    errorMsg="Ingrese un lugar del evento valido"
                                    requiredMsg="El lugar del evento es valido"
                                    :required="true"
                                    :modelo="evento.lugar"
                                    clases=""
                                    @changeinput="evento.lugar = $event"
                                ></input-component>
                                -->
                                    <input class="form-control" v-model="evento.lugar" type="text" placeholder="">
                            </td>
                            <td class="text-danger d-flex justify-content-center align-items-center">
                                <p>
                                    <i title="Eliminar evento" class="fa fa-trash-alt" @click="deleteEvent(index)"></i>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center text-success" colspan="6">
                                <p><i style="font-size: 2rem; cursor:pointer;" title="Añadir evento" class="fa fa-plus-circle" @click="addEvento()"></i></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Tabla información pantalla grande -->

                <!-- Información del evento en pantalla pequeñas -->
                <div class="col-12 d-xl-none" v-if="this.giras.paises_id">

                    <div class="row" v-for="(evento, index) in giras.data" :key="index" >
                        <h4 class="col-md-12 mt-5 mb-2">{{evento.text}} <i title="Eliminar evento" style="font-size: 1rem" class="text-danger fa fa-trash-alt" @click="deleteEvent(index)"></i></h4>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Fecha del evento</label>
                                <input class="form-control datepicker" v-model="evento.fecha" placeholder="Select date" type="date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Hora del evento</label>
                                <input class="form-control" v-model="evento.hora" type="time" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Aforo del evento</label>
                                <select
                                :class="(validarForm&&!evento.aforos_id)?'is-invalid':''"
                                class="form-control"
                                id="selectTipoEvento" v-model="evento.aforos_id"
                                >
                                    <option :value="null">[ Seleccione un aforo ]</option>
                                    <option :key="aforo.id" v-for="aforo of aforos" :value="aforo.id" v-text="aforo.rango" ></option>
                                </select>
                                <div class="invalid-feedback">
                                    Seleccione un aforo
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Ciudades del evento</label>
                                <model-list-select
                                        :list="ciudades"
                                        v-model="evento.ciudades_id"
                                        option-value="idCiudades"
                                        option-text="ciudad"
                                        placeholder="Seleccione una ciudad"
                                        :isError="validarForm && giras.paises_id && !evento.ciudades_id"
                                    >
                                    </model-list-select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input-component
                                    label="Lugar del evento"
                                    id="txtEventoLugar"
                                    pattern="all"
                                    errorMsg="Ingrese un lugar del evento valido"
                                    requiredMsg="El lugar del evento es valido"
                                    :required="true"
                                    :modelo="evento.lugar"
                                    clases=""
                                    @changeinput="evento.lugar = $event"
                                ></input-component>
                        </div>

                    </div>

                    <p class="text-success" @click="addEvento()" style="display: flex;justify-content: center;align-items: center;">
                        Agregar evento
                        <i style="font-size: 2rem; cursor:pointer;" title="Añadir evento" class="fa fa-plus-circle" ></i>
                    </p>

                </div>

                <!-- Información del evento en pantalla pequeñas -->

                <div class="text-center w-100">
                    <button v-if="this.giras.paises_id && this.giras.data.length > 1" class="m-auto btn btn-primary">Enviar Información</button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import { ModelListSelect } from 'vue-search-select'

    export default {
        data: function () {
            return {
                ciudades: [],
                paisActual: 0,
                increment: 1
            };
        },
        props: [
            'paises',
            'aforos',
            'giras',
            'validarForm'
        ],
        created() {
            this.addEvento();
            this.addEvento();
        },
        methods: {
            getCiudades: function () {
                this.giras.data.map(evento => {
                    evento.ciudades_id = null;
                });
                if (this.giras.paises_id && this.giras.paises_id !== this.paisActual) {
                    this.ciudades = [];
                    this.paisActual = this.giras.paises_id;
                    axios.get('/api/getCiudades?codigo='+this.giras.paises_id).then(res => {
                        this.ciudades = res.data;
                    }).catch(err => {
                        console.log(err);
                    });
                }
            },
            enviarSolicitudEvento() {
                eventBus.$emit('solicitarEvento');
            },
            addEvento() {
                this.giras.data.push({
                    fecha: '',
                    hora: '',
                    lugar: '',
                    ciudades_id: null,
                    aforos_id: null,
                    tipos_eventos_id: 5,
                    artistas_id: 1,
                    text: 'Información del evento ' + (this.increment++)
                });
            },
            deleteEvent(index){
                this.giras.data.splice(index, 1);
            }
        },
        components: {
            ModelListSelect
        }
    }

</script>
<style>
    .container-buscar .search{
        position: absolute;
        width: 10rem;
        max-width: 10rem;
    }
</style>