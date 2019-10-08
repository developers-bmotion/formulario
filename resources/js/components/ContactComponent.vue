<template>
    <div>
        <div class="card-header">
            <h3 class="mb-0 text-center">Contacto</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <input-component
                        label="Nombres"
                        id="txtContactoNombre"
                        pattern="alf"
                        errorMsg="Ingrese un nombre valido"
                        requiredMsg="Nombre requerido"
                        :required="true"
                        :modelo="contact.nombre"
                        clases=""
                        @changeinput="contact.nombre = $event"
                    ></input-component>
                </div>
                <div class="col-md-6">
                    <input-component
                        label="Apellidos"
                        id="txtContactoApellido"
                        pattern="alf"
                        errorMsg="Ingrese un apellido valido"
                        requiredMsg="Apellido requerido"
                        :required="true"
                        :modelo="contact.apellido"
                        clases=""
                        @changeinput="contact.apellido = $event"
                    ></input-component>
                </div>
                <div class="col-md-6">
                    <input-component
                        label="Telefono"
                        id="txtContactoTelefono"
                        pattern="num"
                        errorMsg="Ingrese un telefono valido"
                        requiredMsg="Telefono requerido"
                        :required="true"
                        :modelo="contact.telefono"
                        clases=""
                        @changeinput="contact.telefono = $event"
                    ></input-component>
                </div>
                <div class="col-md-6">
                    <input-component
                        label="Celular"
                        id="txtContactoCelular"
                        pattern="num"
                        errorMsg="Ingrese un celular valido"
                        requiredMsg="Celular requerido"
                        :required="true"
                        :modelo="contact.celular"
                        clases=""
                        @changeinput="contact.celular = $event"
                    ></input-component>
                </div>
                <div class="col-md-6">
                    <input-component
                        label="Email"
                        id="txtContactoEmail"
                        pattern="email"
                        errorMsg="Ingrese un email valido"
                        requiredMsg="Email requerido"
                        :required="true"
                        :modelo="contact.email"
                        clases=""
                        @changeinput="contact.email = $event"
                    ></input-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['contact']
    }
</script>
