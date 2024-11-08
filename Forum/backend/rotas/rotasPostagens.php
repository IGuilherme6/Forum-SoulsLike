<?php
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

require_once '../controllers/ControladorPostagem.php';

$dispatcher = simpleDispatcher(function(RouteCollector $r) {
    $r->addRoute('GET', '/postagens', ['ControladorPostagem', 'listar']);   
    $r->addRoute('POST', '/postagens', ['ControladorPostagem', 'criar']); 
    $r->addRoute('GET', '/postagens/{id:\d+}', ['ControladorPostagem', 'exibir']);
});

