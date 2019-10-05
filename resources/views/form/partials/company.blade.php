<div class="card-header">
    <h3 class="mb-0 text-center">Compañia</h3>
</div>
<!-- Card body -->
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Compañia</label>
                <input class="form-control" type="text" placeholder="" name="campany_nombre">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Tipo compañia</label>
                <select class="form-control" id="selectTipoCompañia" name="campany_tipo" >
                    <option value="0">[ Seleccione un evento ]</option>
                    @foreach(  $tipo_companias as $tipo_compania)
                        <option value="{{ $tipo_compania->id }}">{{ $tipo_compania->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">País de la compañía</label>
                <select class="form-control selectPais" id="selectTipoEvento" data-toggle="select" name="campany_pais" >
                    <option value="0">[ Seleccione un evento ]</option>
                    @foreach( $paises as $pais)
                        <option value="{{ $pais->codigo }}">{{ $pais->pais }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Ciudad de la compañía</label>
                <select class="form-control selectCiudad" id="selectTipoEvento" data-toggle="select" name="campany_ciudad">

                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Dirección</label>
                <input class="form-control" type="text" placeholder="" name="campany_direccion">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">¿Tiene sitio web?</label>
                <select class="form-control" id="selectPaginaWeb">
                    <option value="0">[ Seleccione un evento ]</option>
                        <option value="0">Si</option>
                        <option value="1">No</option>
                </select>
            </div>
        </div>
        <div class="col-md-6" id="sitio_web" style="display: none">
            <div class="form-group">
                <label class="form-control-label">Sitio Web</label>
                <input class="form-control" type="text" placeholder="" name="campany_sitio">
            </div>
        </div>
        <div class="col-md-6" id="select_tipo_docu_empresa">
            <div class="form-group">
                <label class="form-control-label">Tipo de documento compañía</label>
                <select class="form-control" id="selectTipoEvento" name="campany_tipo_documento">
                    <option value="0">[ Seleccione un evento ]</option>
                    @foreach( $tipo_documento_empresa as $tipo_documento_empresas)
                        <option value="{{ $tipo_documento_empresas->id }}">{{ $tipo_documento_empresas->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6" id="select_tipo_docu_persona" style="display: none">
            <div class="form-group">
                <label class="form-control-label">Tipo de documento persona</label>
                <select class="form-control" id="selectTipoEvento" name="campany_tipo_documento_persona">
                    <option value="0">[ Seleccione un evento ]</option>
                    @foreach( $tipo_documento_persona as $tipo_documento_personas)
                        <option value="{{ $tipo_documento_personas->id }}">{{ $tipo_documento_personas->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Número de documento</label>
                <input class="form-control" type="text" placeholder="" name="campany_documento">
            </div>
        </div>
    </div>
</div>
