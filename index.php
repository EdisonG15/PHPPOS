<?php
//  include "Models/usuario.modelo.php";
//  include "Views/plantilla.php";

 
require_once "Controllers/plantilla.controller.php";

require_once "Controllers/usuario.controller.php";
require_once "Models/usuario.model.php";


$plantilla = new PlantillaControlador();
$plantilla -> CargarPlantilla();