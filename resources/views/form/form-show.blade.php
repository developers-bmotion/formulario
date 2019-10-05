@extends('layout')

@section('content')
    <form-component></form-component>
    
    {{-- <div class="col-md-10 m-auto">

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
                    <select class="form-control" id="selectTipoEvento">
                        <option value="0">[ Seleccione un evento ]</option>
                        @foreach( $tipo_eventos as $tipo_evento)
                        <option value="{{ $tipo_evento->id }}">{{ $tipo_evento->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>


    <!--=====================================
	    VENTA POR BOLETERIA
    ======================================-->
    <form action="" method="POST" id="evento_{{ $tipo_eventos[0]->id }}" style="display: none;">

        <div class="card">

            <!--=====================================
	            CONTACTO
            ======================================-->

            @include('form.partials.contact')

            <!--=====================================
	            COMPAÑIA
            ======================================-->

            @include('form.partials.company')

            <!--=====================================
	            VENTA DE BOLETERIA
            ======================================-->
            <div class="card-header">
                <h3 class="mb-0 text-center">Venta de boletería</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">¿Tiene tiquetera definida?</label>
                            <select class="form-control" id="selectEventoDefinido">
                                <option value="">[ Seleccione un evento ]</option>
                                <option value="0">Si</option>
                                <option value="1">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6" id="tiqueta_definida" style="display: none">
                        <div class="form-group">
                            <label class="form-control-label" >¿Cuál es la tiquetera definida?</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre del responsable del evento</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Describa la experiencia del responsable</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Fecha del evento</label>
                            <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2018">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Hora del evento</label>
                            <input class="form-control" type="time" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">País de la compañía</label>
                            <select class="form-control selectPais" id="selectTipoEvento" data-toggle="select">
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
                            <select class="form-control selectCiudad" id="selectTipoEvento" data-toggle="select">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Lugar del evento</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Aforo del evento</label>
                            <select class="form-control selectPais" id="selectTipoEvento">
                                <option value="0">[ Seleccione un evento ]</option>
                                @foreach( $aforo as $aforos)
                                    <option value="{{ $aforos->id }}">{{ $aforos->valor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group pb-5">
            <button type="submit" class="btn btn-success btn-block fa-pull-right">Enviar</button>
        </div>

    </form>

    <form method="POST" action="" id="evento_{{ $tipo_eventos[1]->id }}" style="display: none;">

        <div class="card">

            <div class="card-header">
                <h3 class="mb-0 text-center">Contacto</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h3 class="mb-0 text-center">Corporativo</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <form method="POST" action="" id="evento_{{ $tipo_eventos[2]->id }}" style="display: none;">

        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 text-center">Contacto</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h3 class="mb-0 text-center">Gubernamental</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <form action="" method="POST" id="evento_{{ $tipo_eventos[3]->id }}" style="display: none;">

        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 text-center">Contacto</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h3 class="mb-0 text-center">Campaña publicitaria</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <form action="" method="POST" id="evento_{{ $tipo_eventos[4]->id }}" style="display: none;">

        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 text-center">Contacto</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h3 class="mb-0 text-center">Giras</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <form action="" method="POST" id="evento_{{ $tipo_eventos[5]->id }}" style="display: none;">

        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 text-center">Contacto</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h3 class="mb-0 text-center">Otros</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Télefono</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Celular</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    </div> --}}
@endsection
{{-- 
@push('js')
    <script>
        const rutaCiudades = '{{ route('getCiudades') }}';
    </script>
    <script src="/proyect-form/js/custom/form_solicitud.js"></script>
@endpush --}}

