active = null;

$("#selectTipoEvento").val(0);

$('#selectTipoEvento').change(function () {
    const id = $(this).val();
    if (active !== null) {
        active.hide();
    }
    active = $("#evento_" + id);
    active.show();

    $('html, body').animate({
        scrollTop: active.offset().top
    }, 500);
});

$('#selectTipoCompañia').change(function () {
    const id = $(this).val();
    if (id === '3'){
        $("#select_tipo_docu_persona").show();
        $("#select_tipo_docu_empresa").hide();
    }else{
        $("#select_tipo_docu_empresa").show();
        $("#select_tipo_docu_persona").hide();
    }
});

$('#selectPaginaWeb').change(function () {
    const id = $(this).val();
    if (id === '0'){
        $("#sitio_web").show();
    }else{
        $("#sitio_web").hide();
    }

});

$('#selectEventoDefinido').change(function () {
    const id = $(this).val();
    if (id === '0'){
        $("#tiqueta_definida").show();
    }else{
        $("#tiqueta_definida").hide();
    }

});



$(".selectPais").change(function () {
    const codigo = $(this).val();
    $.post(rutaCiudades, {codigo: codigo}, function (r) {
        let options = '<option value="">Seleccione una ciudad</option>';
        r.map(ciudad => {
            options += `<option value="${ciudad.idCiudades}">${ciudad.ciudad}</option>`;
        });
        $('.selectCiudad').html(options);
    });
});
