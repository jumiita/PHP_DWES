<?php

$password = 'hola';

$pass_encript = password_hash($password, PASSWORD_DEFAULT);
if (password_verify("pep",$pass_encript)){
    echo "bien hecho!";
}else {
    echo "no correcto";
}
?>

