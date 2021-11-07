<?php
include("funciones.php");
//damos a las variables el valor de las funciones
$objctResultados = getObjctResultados();
$objetoDistritos = getObjctDistricts();
$objetoPartidos = getObjctParties();

//creamos la variable con la función de todos los datos.
$all_date = get_all_data($objetoDistritos, $objctResultados, $objetoPartidos);
$selected_name = get_name_object_selected_by_id($objetoDistritos,$_POST['district_id']);

//Llamamos a las funciones necesarias.
abro_tabla();
print_table($all_date,'district',$selected_name);
cierro_tabla();

?>