$(document).ready(function(){
    $('#cmb-estado-civil').change(function(){
        //alert("Seleccionaste: "+$(this).val());
        $("#cmb-estado-civil option:selected").each(function () {
            alert("Seleccionaste: "+$(this).val());
        });

    });
})
