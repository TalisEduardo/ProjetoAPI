<?php

$loader = require __DIR__ .'/vendor/autoload.php';

use LojaAgua\entidades\Usuario;

$u = new Usuario();

$u->login = 'talis eduardo';

echo "Hello ".$u->login;

 ?>
