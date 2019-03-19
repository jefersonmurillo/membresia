$(document).ready(function(){
    $('#cmb-estado-civil').change(function(){
        document.getElementById('nombre-conyuge').disabled = true;
        document.getElementById('cmb-concepto').disabled = true;

        $('#cmb-concepto').attr('disabled', true)
        $("#cmb-estado-civil option:selected").each(function () {
            if($(this).val() == 2 || $(this).val() == 3){
                document.getElementById('nombre-conyuge').disabled = false;
                document.getElementById('nombre-conyuge').required = true;

                //$('#nombre-conyuge').attr('disabled', true)
            }else{
                if($(this).val() == 4){
                    $('#cmb-concepto').attr('disabled', false);
                    $('#cmb-concepto').attr('required', true);
                }
            }
        });

    });

    $(function() {
        $('form').submit(function(e){
            let foto = $('#image-data').val();
            let nombres = $('#nombres').val();
            let apellidos = $('#apellidos').val();
            let tipo_doc = $('#tipo_doc').val();
            let documento = $('#documento').val();
            let ocupacion = $('#ocupacion').val();
            let direccion = $('#direccion').val();
            let telefono = $('#telefono').val();
            let celular = $('#celular').val();
            let email = $('#email').val();
            let ciudad_nacimiento = $('#ciudad_nacimiento').val();
            let fecha_nacimiento = $('#fecha_nacimiento').val();
            let escolaridad = $("input[name='nivel']");
            let estado_civil = $('#cmb-estado-civil').val();
            let fecha_bautizo = $('#fecha-bautizo').val();
            let pastor = $('#pastor').val();
            let ciudad_bautizo = $('#ciudad_bautizo').val();
            let firma = $('#firma-data').val();

            if(foto === '' || nombres === '' || apellidos === '' || tipo_doc === '' || documento === '' ||
                direccion === '' || celular === '' || email === '' || fecha_nacimiento === '' ||
                fecha_bautizo === '' || pastor === '' || firma === ''){

                $('#incorrecto').click();
                return false;
            }

            if(tipo_doc === -1 || ciudad_nacimiento === -1 || ciudad_bautizo === -1 || estado_civil === -1){
                ('#incorrecto').click();
                return false;
            }

            return true;
        });

    });

})

function habilitarInputProfesion(){
    $('#profesion').attr('disabled', false);
    $('#profesion').attr('required', true);
}

function inhabilitarInputProfesion(){
    $('#profesion').attr('disabled', true);
    $('#profesion').attr('required', false);
}

function loadMunicipios(id_depto,id) {
    let documentos = $('#'+id_depto).find('option:selected').data('info');
    console.log(documentos);

    let html = '<option value="null" disabled selected>Seleccione un municipio</option>'
    documentos.forEach(function(item, index){
        html += '<option value="'+item.id+'">'+item.municipio+'</option>';
    });
    console.log(html);
    $('#'+id).html(html);

}
