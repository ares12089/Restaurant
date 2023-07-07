<?php

if (!isset($_POST["num_tiket"])) {
    exit("No hay datos");
}

include_once "./funciones.php";
envTiket($_POST['num_tiket']);

header("Location: ../views/chef/chef.php")
?>

