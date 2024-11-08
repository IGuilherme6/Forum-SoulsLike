<?php
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

require_once '../controllers/ControladorComentario.php';

$dispatcher = simpleDispatcher(function(RouteCollector $r) {
    $r->addRoute('GET', '/comentarios/{id_postagem:\d+}', ['ControladorComentario', 'listar']); // Listar todos os comentários
    $r->addRoute('POST', '/comentarios', ['ControladorComentario', 'criar']); // Criar um novo comentário
});