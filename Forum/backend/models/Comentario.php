<?php
require_once '../db/BancoDeDados.php';

class Comentario {
    public $id;
    public $nome_usuario;
    public $conteudo;
    public $id_postagem;


    public function __construct($nome_usuario, $conteudo, $id_postagem) {
        $this->nome_usuario = $nome_usuario;
        $this->conteudo = $conteudo;
        $this->id_postagem = $id_postagem;
    }

    public static function todosPorPostagem($id_postagem) {
       $comentarios = [];
       return $comentarios;
    }
    public function salvar() {
     
    }

}