<template>
    <div>
        <div class="card-header">
            <h3 class="mb-0 text-center">Contacto</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Nombre</label>
                        <input v-model="contact.nombre" class="form-control" type="text" placeholder="" name="contacto_nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Apellidos</label>
                        <input v-model="contact.apellido" class="form-control" type="text" placeholder="" name="contacto_apellido">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Télefono</label>
                        <input v-model="contact.telefono" class="form-control" type="text" placeholder="" name="contacto_telefono">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Celular</label>
                        <input v-model="contact.celular" class="form-control" type="text" placeholder="" name="contacto_celular">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input v-model="contact.email" class="form-control" type="text" placeholder="" name="contacto_email">
                    </div>
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
