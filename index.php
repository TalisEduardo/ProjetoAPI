<?php

$loader = require __DIR__ .'/vendor/autoload.php';

use LojaAgua\entidades\Usuario;
use LojaAgua\entidades\Pedido;
use LojaAgua\persistencia\UsuarioController;
use LojaAgua\persistencia\PedidoController;

$app = new \Slim\Slim ();

$usuarioCtrl = new UsuarioController();

$app->get('/', function() {
  echo json_encode ([
    "api" => "Venda de Agua",
    "version" => "1.0.0"
  ]);
});

$app->get('/usuario(/(:id))', function($id = null) use ($usuarioCtrl) {
  echo json_encode($usuarioCtrl->get($id));
});

$app->post('/usuario(/)', function() use ($usuarioDAO) {
  echo "POST\n";
});

$app->put('/usuario(/)', function() {
  echo "PUT\n";
});

$app->delete('/usuario/:id', function() {
  echo "DELETE\n";
});


$app->run();

/*
$user = new Usuario(0, "cipriani.teste@gmail.com", "123321", "teste");
$dao = new UsuarioDAO();

$dao->insert($user);

$time = new DateTime("now");
$pedido = new Pedido(0, $time, null, array());
$dao2 = new PedidoDAO();

$dao2->insert($pedido);
*/
 ?>
