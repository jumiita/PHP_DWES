<?php
include("funciones.php");
//damos a las variables el valor de las funciones
$objctResultados = getObjctResultados();
$objetoDistritos = getObjctDistricts();
$objetoPartidos = getObjctParties();

//creamos la variable con la función de todos los datos.
$all_date = get_all_data($objetoDistritos, $objctResultados, $objetoPartidos);
//Llamamos a las funciones necesarias.
abro_tabla();
print_table_general($all_date);
cierro_tabla();

?>