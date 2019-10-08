<template>
    <div class="col-md-10 m-auto">
        <!--=====================================
            TIPO EVENTO
        ======================================-->
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0 text-center">Selecciona tipo de envento</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label class="form-control-label" for="selectTipoEvento">Tipo de evento</label>
                        <select v-model="data.evento.tipos_eventos_id" class="form-control" id="selectTipoEvento">
                            <option :value="null">Seleccione un tipo evento</option>
                            <option v-for="tipoEvento of dataGeneral.tipoEventos" :key="tipoEvento.id" :value="tipoEvento.id">{{ tipoEvento.nombre }}</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>


        <!--=====================================
            VENTA POR BOLETERIA
        ======================================-->
        <form @submit.prevent="validarEvento" method="POST" novalidate v-if="data.evento.tipos_eventos_id" >

            <div class="card">
                <contact-component :contact="data.contact" ></contact-component>
            </div>
            <div class="card">
                <company-component
                    :company="data.company"
                    :tipoCompanias="dataGeneral.tipoCompanias"
                    :paises="dataGeneral.paises"
                    :tipoDocumentoEmpresas="dataGeneral.tipoDocumentoEmpresas"
                    :tipoDocumentoPersonas="dataGeneral.tipoDocumentoPersonas"
                    :validarForm="dataGeneral.validarForm"
                ></company-component>
            </div>

            <div class="card">
                <evento-component
                    v-if="data.evento.tipos_eventos_id !== 5"
                    :evento="data.evento"
                    :paises="dataGeneral.paises"
                    :ventaBoleterias="data.ventaBoleterias"
                    :corporativos="data.corporativos"
                    :campaniaPublicitaria="data.campaniaPublicitaria"
                    :aforos="dataGeneral.aforos"
                    :validarForm="dataGeneral.validarForm"
                    ></evento-component>
                <gira-component
                    v-if="data.evento.tipos_eventos_id === 5"
                    :giras="data.giras"
                    :paises="dataGeneral.paises"
                    :aforos="dataGeneral.aforos"
                    :validarForm="dataGeneral.validarForm"
                ></gira-component>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                dataGeneral: {
                    paises: [],
                    tipoCompanias: [],
                    tipoDocumentoEmpresas: [],
                    tipoDocumentoPersonas: [],
                    tipoEventos: [],
                    aforos: [],
                    validarForm: false,
                },
                data: {
                    giras: {paises_id: null, data: []},
                    evento: {
                        fecha: '',
                        hora: '',
                        lugar: '',
                        ciudades_id: null,
                        aforos_id: null,
                        tipos_eventos_id: null,
                        artistas_id: 1
                    },
                    company: {
                        nombre: '',
                        direccion: '',
                        sitioWeb: '',
                        documento: '',
                        tipos_companias_id: null,
                        tipos_documentos_personas_id: null,
                        tipos_documentos_compania_id: null,
                        ciudades_id: null
                    },
                    contact: {
                        nombre: '',
                        apellido: '',
                        telefono: '',
                        celular: '',
                        email: ''
                    },
                    ventaBoleterias: {
                        tiquetera_definida: '',
                        nombre_responsable: '',
                        experiencia_responsable: ''
                    },
                    corporativos: {
                        cliente_final: '',
                        objetivo_evento: ''
                    },
                    campaniaPublicitaria: {
                        agencia: '',
                        marca: '',
                        objetivo: ''
                    }
                }
            }
        },
        created() {

            axios.get('/api/getData')
                .then((res) => {
                    this.dataGeneral = Object.assign(this.dataGeneral, res.data);
                })
                .catch((err) => {
                    console.log(err);
                });

            axios.get('/api/getPaises')
                .then((res) => {
                    this.dataGeneral.paises = Object.assign([], res.data);
                })
                .catch((err) => {
                    console.log(err);
                });

        },
        methods: {
            enviarEvento() {
                const lista = document.querySelectorAll('.form-control.is-invalid,.dropdown.error');
                if (lista.length > 0) {
                    lista[0].focus();
                    return;
                }
                axios.post('/api/solicitarEvento', this.data).then(res => {
                    if (res.status === 201) {
                        alert("Se ha enviado tú solicitud");
                        this.dataGeneral.validarForm = false;
                    }
                    console.log(res);
                }).catch(err => {
                    console.log(err);
                });

            },
            validarEvento() {
                this.dataGeneral.validarForm = true;
                eventBus.$emit('validar');
                setTimeout(() => {
                    this.enviarEvento();
                }, 250);
            }
        }
    }
</script>
