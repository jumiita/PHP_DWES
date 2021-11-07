
//Aquí realizamos llamadas  a las funciones según lo que selecciona.
//En esta clase .js me he apoyado en un compañero de trabajo ya que es sobretodo tema de los formularios.

function print_districts(district_id) {
    //hacemos una llamada a ajax
    $.ajax({
        //indicamos que lo recogemos por el metodo post
        type: "POST",
        //la dirección donde esta la función que necesitamos
        url: 'print_data_from_provicias.php',
        //Indicamos que el parametro que pasamos es igual al distrito
        data:({district_id:district_id}),
        success:function(response){
            $('#tabla_calculos').append(response);
        }
    });
}

function print_parties(party_id) {
    $.ajax({
        type: "POST",
        url: 'print_data_from_parties.php',
        data:({party_id:party_id}),
        success:function(response){
            $('#tabla_calculos').append(response);
        }
    });
}

function print_general() {
    $.ajax({
        type: "POST",
        url: 'print_data_from_general.php',
        data:({}),
        success:function(response){
            $('#tabla_calculos').append(response);
        }
    });
}

$(function () {
    $('#first_filter').change(function () {
        var selected_value = $(this).val();
        if(selected_value == "districts"){
            $('.form-group.district').show();
            $('.form-group.party').hide();
            $('.form-group.party #party_filter')
                .find('option:first')
                .prop('selected',true)
                .trigger('change');
        }else if(selected_value == "parties"){
            $('.form-group.party').show();
            $('.form-group.district').hide();
            $('.form-group.district #district_filter')
                .find('option:first')
                .prop('selected',true)
                .trigger('change');
        }else{
            $('.form-group.party').hide();
            $('.form-group.party #party_filter')
                .find('option:first')
                .prop('selected',true)
                .trigger('change');
            $('.form-group.district').hide();
            $('.form-group.district #district_filter')
                .find('option:first')
                .prop('selected',true)
                .trigger('change');
        }
    });

    $('.form-group.district #district_filter').change(function () {
        $('#tabla_calculos').empty();
        if($(this).val() != ''){
            print_districts($(this).val());
        }
    });
    $('.form-group.party #party_filter').change(function () {
        $('#tabla_calculos').empty();
        if($(this).val() != ''){
            print_parties($(this).val());
        }
    });
    $('.form-group.general #first_filter').change(function () {
        $('#tabla_calculos').empty();
        if($(this).val() == 'global'){
            print_general();
        }
    });
});