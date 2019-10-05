<template>
    <div>
        <div class="card-header">
            <h3 class="mb-0 text-center">Compañia</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Compañia</label>
                        <input class="form-control" v-model="company.nombre" type="text" placeholder="" name="campany_nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Tipo compañia</label>
                        <select class="form-control" id="selectTipoCompañia" name="campany_tipo" v-model="company.tipos_companias_id" >
                            <option :value="null">Seleccione un tipo de compañia</option>
                            <option v-for="tipoCompania of tipoCompanias" :key="tipoCompania.id" :value="tipoCompania.id" v-text="tipoCompania.nombre"></option>
                        </select>
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
                        
                        <!-- <select class="form-control selectPais" id="selectCompaniaPais" v-model="paisSelect" data-toggle="select" name="campany_pais" @change="getCiudades()" >
                            <option :value="null">Seleccione un pais</option>
                            <option v-for="pais of paises" :key="pais.codigo" :value="pais.codigo" v-text="pais.pais" ></option>
                        </select> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Ciudad de la compañía</label>
                        <model-list-select
                            :list="ciudades"
                            v-model="company.ciudades_id"
                            option-value="idCiudades"
                            option-text="ciudad"
                            placeholder="Seleccione una ciudad"
                        >
                        </model-list-select>
                        <!-- <select class="form-control selectCiudad" id="selectTipoEvento" data-toggle="select" name="campany_ciudad" v-model="company.ciudades_id">
                            <option :value="null">{{ ciudades !== null ? ((ciudades.length > 0)? 'Seleccione una ciudad' : 'Seleccione una ciudad') : 'Seleccione un pais'}}</option>
                            <option v-for="ciudad of ciudades" :value="ciudad.idCiudades" :key="ciudad.idCiudades" v-text="ciudad.ciudad"></option>
                        </select> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Dirección</label>
                        <input class="form-control" v-model="company.direccion" type="text" placeholder="" name="campany_direccion">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">¿Tiene sitio web?</label>
                        <select class="form-control" v-model="tieneEmpresa" id="selectPaginaWeb">
                            <!-- <option :value="null">[ Seleccione un evento ]</option> -->
                            <option :value="false">No</option>
                            <option :value="true">Si</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6" id="sitio_web" v-if="tieneEmpresa">
                    <div class="form-group">
                        <label class="form-control-label">Sitio Web</label>
                        <input class="form-control" type="text" placeholder="" v-model="company.sitioWeb" name="campany_sitio">
                    </div>
                </div>
                <div class="col-md-6" v-if="company.tipos_companias_id && company.tipos_companias_id !== 3">
                    <div class="form-group">
                        <label class="form-control-label">Tipo de documento compañía</label>
                        <select class="form-control" id="selectTipoEvento" name="campany_tipo_documento" v-model="company.tipos_documentos_compania_id">
                            <option value="0">[ Seleccione un evento ]</option>
                            <option v-for="tipoDocumentoEmpresa of tipoDocumentoEmpresas" :key="tipoDocumentoEmpresa.id" :value="tipoDocumentoEmpresa.id" v-text="tipoDocumentoEmpresa.nombre" ></option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6" v-if="company.tipos_companias_id === 3">
                    <div class="form-group">
                        <label class="form-control-label">Tipo de documento persona</label>
                        <select class="form-control" id="selectTipoEvento" name="campany_tipo_documento_persona" v-model="company.tipos_documentos_personas_id">
                            <option value="0">Seleccione un tipo de documento</option>
                            <option v-for="tipoDocumentoPersona of tipoDocumentoPersonas" :key="tipoDocumentoPersona.id" :value="tipoDocumentoPersona.id" v-text="tipoDocumentoPersona.nombre" ></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="form-control-label">Número de documento</label>
                        <input class="form-control" type="text" v-model="company.documento" placeholder="" name="campany_documento">
                    </div>
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
                tieneEmpresa: false,
                tipoDocumento: '',
                ciudades: [],
                paisSelect: null,
                paisActual: 0
            }
        },
        props: ['tipoCompanias', 'paises', 'tipoDocumentoEmpresas', 'tipoDocumentoPersonas', 'company'],
        methods: {
            getCiudades: function () {
                this.company.ciudades_id = null;
                if (this.paisSelect && this.paisSelect !== this.paisActual) {
                    this.ciudades = [];
                    this.paisActual = this.paisSelect;
                    axios.get('/api/getCiudades?codigo='+this.paisSelect).then(res => {
                        this.ciudades = res.data;
                    }).catch(err => {
                        console.log(err);
                    });
                }
            }
        },
        components: {
            ModelListSelect
        }
    }
</script>
