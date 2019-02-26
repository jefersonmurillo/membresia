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
                if($(this).val() == 5){
                    $('#cmb-concepto').attr('disabled', false);
                    $('#cmb-concepto').attr('required', true);
                }
            }
        });

    });

    $(function() {
        $('form').submit(function(e){
            let foto = $('#image-data');
            let nombres = $('#nombres');
            let apellidos = $('#apellidos');
            let tipo_doc = $('#tipo_doc');
            let documento = $('#documento');
            let ocupacion = $('#ocupacion');
            let direccion = $('#direccion');
            let telefono = $('#telefono');
            let celular = $('#celular');
            let email = $('#email');
            let ciudad_nacimiento = $('#ciudad_nacimiento');
            let fecha_nacimiento = $('#fecha_nacimiento');
            let escolaridad = $("input[name='nivel']");
            let estado_civil = $('#cmb-estado-civil');

            return false;
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
