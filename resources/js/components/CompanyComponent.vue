<template>
    <div>
        <div class="card-header">
            <h3 class="mb-0 text-center">Compañia</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <input-component
                        label="Compañia"
                        id="txtCompanyNombre"
                        pattern="alf"
                        errorMsg="Ingrese el nombre valido de la compañia"
                        requiredMsg="Nombre de la compañia requerido"
                        :required="true"
                        :modelo="company.nombre"
                        clases=""
                        @changeinput="company.nombre = $event"
                    ></input-component>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Tipo compañia <span class="text-danger">*</span></label>
                        <select
                            :class="(validarForm&&!company.tipos_companias_id)?'is-invalid':''"
                            class="form-control" id="selectTipoCompañia"
                            name="campany_tipo" v-model="company.tipos_companias_id"
                        >
                            <option :value="null">Seleccione un tipo de compañia</option>
                            <option v-for="tipoCompania of tipoCompanias" :key="tipoCompania.id" :value="tipoCompania.id" v-text="tipoCompania.nombre"></option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione un tipo de compañia
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">País de la compañía <span class="text-danger">*</span></label>
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
                        <!-- <select class="form-control selectPais" id="selectCompaniaPais" v-model="paisSelect" data-toggle="select" name="campany_pais" @change="getCiudades()" >
                            <option :value="null">Seleccione un pais</option>
                            <option v-for="pais of paises" :key="pais.codigo" :value="pais.codigo" v-text="pais.pais" ></option>
                        </select> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Ciudad de la compañía <span class="text-danger">*</span></label>
                        <model-list-select
                            :list="ciudades"
                            v-model="company.ciudades_id"
                            option-value="idCiudades"
                            option-text="ciudad"
                            placeholder="Seleccione una ciudad"
                            :isError="validarForm && paisSelect && !company.ciudades_id"
                        >
                        </model-list-select>
                        <!-- <select class="form-control selectCiudad" id="selectTipoEvento" data-toggle="select" name="campany_ciudad" v-model="company.ciudades_id">
                            <option :value="null">{{ ciudades !== null ? ((ciudades.length > 0)? 'Seleccione una ciudad' : 'Seleccione una ciudad') : 'Seleccione un pais'}}</option>
                            <option v-for="ciudad of ciudades" :value="ciudad.idCiudades" :key="ciudad.idCiudades" v-text="ciudad.ciudad"></option>
                        </select> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <input-component
                        label="Dirección"
                        id="txtCompanyDireccion"
                        pattern="all"
                        errorMsg="Ingrese una dirección valida de la compañia"
                        requiredMsg="Dirección de la compañia requerida"
                        :required="true"
                        :modelo="company.direccion"
                        clases=""
                        @changeinput="company.direccion = $event"
                    ></input-component>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">¿Tiene sitio web? <span class="text-danger">*</span></label>
                        <select class="form-control" v-model="tieneEmpresa" id="selectPaginaWeb">
                            <!-- <option :value="null">[ Seleccione un evento ]</option> -->
                            <option :value="false">No</option>
                            <option :value="true">Si</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6" id="sitio_web" v-if="tieneEmpresa">
                    <input-component
                        label="Sitio Web"
                        id="txtCompanySitioWeb"
                        pattern="url"
                        errorMsg="Ingrese un sitio web valido"
                        requiredMsg="El sitio web de la compañia es requerido"
                        :required="true"
                        :modelo="company.sitioWeb"
                        clases=""
                        @changeinput="company.sitioWeb = $event"
                    ></input-component>
                </div>
                <div class="col-md-6" v-if="company.tipos_companias_id && company.tipos_companias_id !== 3">
                    <div class="form-group">
                        <label class="form-control-label">Tipo de documento compañía <span class="text-danger">*</span></label>
                        <select
                            :class="(validarForm&&!company.tipos_documentos_compania_id)?'is-invalid':''"
                            class="form-control" id="selectTipoEvento" name="campany_tipo_documento"
                            v-model="company.tipos_documentos_compania_id"
                            >
                            <option :value="null">[ Seleccione un tipo de compañía ]</option>
                            <option v-for="tipoDocumentoEmpresa of tipoDocumentoEmpresas" :key="tipoDocumentoEmpresa.id" :value="tipoDocumentoEmpresa.id" v-text="tipoDocumentoEmpresa.nombre" ></option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccioneun tipo de documento
                        </div>
                    </div>
                </div>

                <div class="col-md-6" v-if="company.tipos_companias_id === 3">
                    <div class="form-group">
                        <label class="form-control-label">Tipo de documento persona</label>
                        <select
                            :class="(validarForm&&!company.tipos_documentos_personas_id)?'is-invalid':''"
                            class="form-control" id="selectTipoEvento" name="campany_tipo_documento_persona"
                            v-model="company.tipos_documentos_personas_id"
                            >
                            <option :value="null">Seleccione un tipo de documento</option>
                            <option v-for="tipoDocumentoPersona of tipoDocumentoPersonas" :key="tipoDocumentoPersona.id" :value="tipoDocumentoPersona.id" v-text="tipoDocumentoPersona.nombre" ></option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccioneun tipo de documento
                        </div>
                    </div>
                </div>
                <div class="col-md-6" >
                    <input-component
                        label="Número de documento"
                        id="txtCompanyDocumento"
                        pattern="num"
                        errorMsg="Ingrese el documento valido"
                        requiredMsg="Documento requerido"
                        :required="true"
                        :modelo="company.documento"
                        clases=""
                        @changeinput="company.documento = $event"
                    ></input-component>
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
        props: [
            'tipoCompanias',
            'paises',
            'tipoDocumentoEmpresas',
            'tipoDocumentoPersonas',
            'company',
            'validarForm'
        ],
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
