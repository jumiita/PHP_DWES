<?php
include("funciones.php");
//damos a las variables el valor de las funciones
$objctResultados = getObjctResultados();
$objetoDistritos = getObjctDistricts();
$objetoPartidos = getObjctParties();
//creamos la variable con la función de todos los datos.
$selected_name = get_name_object_selected_by_id($objetoPartidos,$_POST['party_id']);
$all_date = get_all_data($objetoDistritos, $objctResultados, $objetoPartidos);
//Llamamos a las funciones necesarias.
abro_tabla();
print_table($all_date,'ent',$selected_name);
cierro_tabla();

?>