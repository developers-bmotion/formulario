<template>
   <div>
        <div class="card-header">
            <h3 class="mb-0 text-center">{{txtEventos[evento.tipos_eventos_id]}}</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                
                <!-- venta boleterias -->

                <div class="col-md-6" v-if="evento.tipos_eventos_id === 1">
                    <div class="form-group">
                        <label class="form-control-label">¿Tiene tiquetera definida?</label>
                        <select class="form-control" v-model="tiqueteraSelect" id="selectEventoDefinido" @change="cambioTiquetera">
                            <option :value="true">Si</option>
                            <option :value="false">No</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6" id="tiqueta_definida" v-if="tiqueteraSelect && evento.tipos_eventos_id === 1">
                    <div class="form-group">
                        <label class="form-control-label" >¿Cuál es la tiquetera definida?</label>
                        <input class="form-control" v-model="ventaBoleterias.tiquetera_definida" type="text" placeholder="">
                    </div>
                </div>

                <div class="col-md-6" v-if="evento.tipos_eventos_id === 1">
                    <div class="form-group">
                        <label class="form-control-label">Nombre del responsable del evento</label>
                        <input class="form-control" v-model="ventaBoleterias.nombre_responsable" type="text" placeholder="">
                    </div>
                </div>

                <div class="col-md-6" v-if="evento.tipos_eventos_id === 1">
                    <div class="form-group">
                        <label class="form-control-label">Describa la experiencia del responsable</label>
                        <input class="form-control" v-model="ventaBoleterias.experiencia_responsable" type="text" placeholder="">
                    </div>
                </div>
                <!-- end venta boleterias -->

                <!-- gubernamental o corporativo -->
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 2 || evento.tipos_eventos_id === 3">
                    <div class="form-group">
                        <label class="form-control-label">Cliente final</label>
                        <input class="form-control" v-model="corporativos.cliente_final" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 2 || evento.tipos_eventos_id === 3">
                    <div class="form-group">
                        <label class="form-control-label">Objetivo del evento</label>
                        <textarea class="form-control" v-model="corporativos.objetivo_evento" type="text" placeholder="">
                        </textarea>
                    </div>
                </div>
                <!-- end gubernamental o corporativo -->

                <!-- campaña publicitaria -->
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 4">
                    <div class="form-group">
                        <label class="form-control-label">Agencia</label>
                        <input class="form-control" v-model="campaniaPublicitaria.agencia" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 4">
                    <div class="form-group">
                        <label class="form-control-label">Marca</label>
                        <input class="form-control" v-model="campaniaPublicitaria.marca" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 4">
                    <div class="form-group">
                        <label class="form-control-label">Objetivo de la campaña</label>
                        <input class="form-control" v-model="campaniaPublicitaria.objetivo" type="text" placeholder="">
                    </div>
                </div>
                <!-- end campaña publicitaria -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Fecha del evento</label>
                        <input class="form-control datepicker" v-model="evento.fecha" placeholder="Select date" type="date" value="06/20/2018">
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
                        <label class="form-control-label">País de la compañía</label>
                        <model-list-select
                            :list="paises"
                            v-model="paisSelect"
                            option-value="codigo"
                            option-text="pais"
                            placeholder="Seleccione un pais"
                            @searchchange="getCiudades"
                        >
                        </model-list-select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Ciudad de la compañía</label>
                        <model-list-select
                            :list="ciudades"
                            v-model="evento.ciudades_id"
                            option-value="idCiudades"
                            option-text="ciudad"
                            placeholder="Seleccione una ciudad"
                        >
                        </model-list-select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Lugar del evento</label>
                        <input class="form-control" v-model="evento.lugar" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Aforo del evento</label>
                        <select class="form-control selectPais" id="selectTipoEvento" v-model="evento.aforos_id">
                            <option :value="null">[ Seleccione un evento ]</option>
                            <option :key="aforo.id" v-for="aforo of aforos" :value="aforo.id" v-text="aforo.rango" ></option>
                        </select>
                    </div>
                </div>
                <div class="m-auto">
                    <button class="m-auto btn btn-primary" @click.prevent="enviarSolicitudEvento">Enviar Información</button>
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
                tiqueteraSelect: false,
                txtEventos: {
                    1: "Venta de boletería",
                    2: "Evento Corporativo",
                    3: "Evento Gubernamental",
                    4: "Campaña publicitaria",
                    5: "Gira",
                    6: "Otros"
                },
                ciudades: [],
                paisSelect: null,
                paisActual: 0
            };
        },
        props: [
            'evento', 
            'paises', 
            'aforos', 
            'ventaBoleterias',
            'corporativos',
            'campaniaPublicitaria'
        ],
        methods: {
            getCiudades: function () {
                this.evento.ciudades_id = null;
                if (this.paisSelect && this.paisSelect !== this.paisActual) {
                    this.ciudades = [];
                    this.paisActual = this.paisSelect;
                    axios.get('/api/getCiudades?codigo='+this.paisSelect).then(res => {
                        this.ciudades = res.data;
                    }).catch(err => {
                        console.log(err);
                    });
                }
            },
            cambioTiquetera() {
                this.ventaBoleterias.tiquetera_definida = '';
            },
            enviarSolicitudEvento() {
                eventBus.$emit('solicitarEvento');
            }
        },
        components: {
            ModelListSelect
        }
    }

</script>
