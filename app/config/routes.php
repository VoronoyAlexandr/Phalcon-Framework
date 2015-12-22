<?php
use Phalcon\Mvc\Router;

$router = new Router();

$router->add(
    '/admin/:controller/:action',
    array(
        'controller' => 1,
        "action" => 2
    )
);

return $router;