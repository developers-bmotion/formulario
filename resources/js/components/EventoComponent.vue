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
                    <input-component
                        label="¿Cuál es la tiquetera definida?"
                        id="txtVentaBoleteriaTiqueteraDefinida"
                        pattern="all"
                        errorMsg="Ingrese la tiquetera definida"
                        requiredMsg="Ingrese la tiquetera definida"
                        :required="true"
                        :modelo="ventaBoleterias.tiquetera_definida"
                        clases=""
                        @changeinput="ventaBoleterias.tiquetera_definida = $event"
                    ></input-component>
                </div>

                <div class="col-md-6" v-if="evento.tipos_eventos_id === 1">
                    <input-component
                        label="Nombre del responsable del evento"
                        id="txtVentaBoleteriaNombreResponsable"
                        pattern="alf"
                        errorMsg="Ingrese un nombre de responsable valido"
                        requiredMsg="Ingrese el nombre de responsable"
                        :required="true"
                        :modelo="ventaBoleterias.nombre_responsable"
                        clases=""
                        @changeinput="ventaBoleterias.nombre_responsable = $event"
                    ></input-component>
                </div>

                <div class="col-md-6" v-if="evento.tipos_eventos_id === 1">
                    <input-component
                        label="Describa la experiencia del responsable"
                        id="txtVentaBoleteriaExperienciaResponsable"
                        pattern="alf"
                        errorMsg="Ingrese una experiencia del responsable valida"
                        requiredMsg="Ingrese la experiencia del responsable"
                        :required="true"
                        :modelo="ventaBoleterias.experiencia_responsable"
                        clases=""
                        @changeinput="ventaBoleterias.experiencia_responsable = $event"
                    ></input-component>
                </div>
                <!-- end venta boleterias -->

                <!-- gubernamental o corporativo -->
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 2 || evento.tipos_eventos_id === 3">
                    <input-component
                        label="Cliente final"
                        id="txtGobernamentalCliente"
                        pattern="alf"
                        errorMsg="Ingrese un nombre del cliente final valido"
                        requiredMsg="El nombre del cliente final es requerido"
                        :required="true"
                        :modelo="corporativos.cliente_final"
                        clases=""
                        @changeinput="corporativos.cliente_final = $event"
                    ></input-component>
                </div>
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 2 || evento.tipos_eventos_id === 3">
                    <input-component
                        label="Objetivo del evento"
                        id="txtGobernamentalObjetivo"
                        pattern="alf"
                        errorMsg="Ingrese el objetivo del evento valido"
                        requiredMsg="El objetivo del evento es requerido"
                        :required="true"
                        :modelo="corporativos.objetivo_evento"
                        clases=""
                        @changeinput="corporativos.objetivo_evento = $event"
                        :textArea="true"
                    ></input-component>
                </div>
                <!-- end gubernamental o corporativo -->

                <!-- campaña publicitaria -->
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 4">
                    <input-component
                        label="Agencia"
                        id="txtCampaniaAgencia"
                        pattern="alf"
                        errorMsg="Ingrese una agencia valida"
                        requiredMsg="la agencia es requerida"
                        :required="true"
                        :modelo="campaniaPublicitaria.agencia"
                        clases=""
                        @changeinput="campaniaPublicitaria.agencia = $event"
                    ></input-component>
                </div>
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 4">
                    <input-component
                        label="Marca"
                        id="txtCampaniaMarca"
                        pattern="alf"
                        errorMsg="Ingrese una marca valida"
                        requiredMsg="la marca es requerida"
                        :required="true"
                        :modelo="campaniaPublicitaria.marca"
                        clases=""
                        @changeinput="campaniaPublicitaria.marca = $event"
                    ></input-component>
                </div>
                <div class="col-md-6" v-if="evento.tipos_eventos_id === 4">
                    <input-component
                        label="Objetivo de la campaña"
                        id="txtCampaniaObjetivo"
                        pattern="alf"
                        errorMsg="Ingrese un objetivo valido de la campaña"
                        requiredMsg="El objetivo de la campaña es requerido"
                        :required="true"
                        :modelo="campaniaPublicitaria.objetivo"
                        clases=""
                        @changeinput="campaniaPublicitaria.objetivo = $event"
                    ></input-component>
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
                            :isError="validarForm && !paisSelect"
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
                            :isError="validarForm && paisSelect && !evento.ciudades_id"
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Aforo del evento</label>
                        <select :class="(validarForm&&!evento.aforos_id)?'is-invalid':''" class="form-control selectPais" id="selectTipoEvento" v-model="evento.aforos_id">
                            <option :value="null">[ Seleccione un aforo ]</option>
                            <option :key="aforo.id" v-for="aforo of aforos" :value="aforo.id" v-text="aforo.rango" ></option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione un aforo
                        </div>
                    </div>
                </div>
                <div class="m-auto">
                    <button class="m-auto btn btn-primary">Enviar Información</button>
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
            'campaniaPublicitaria',
            'validarForm'
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
