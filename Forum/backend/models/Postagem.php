<?php
require_once '../db/BancoDeDados.php';

class Postagem {
    public $id;
    public $nome_usuario;
    public $conteudo;

    public function __construct($nome_usuario, $conteudo) {
        $this->nome_usuario = $nome_usuario;
        $this->conteudo = $conteudo;
    }

    public static function todas() {
     $postagem = [];
     return $postagem;
    }

    public function salvar() {
      
    }

}