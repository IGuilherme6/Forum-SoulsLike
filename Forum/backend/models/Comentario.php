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
        $conexao = BancoDeDados::getConexao();
        $stmt = $conexao->prepare("SELECT * FROM comentarios WHERE postagem_id = ?");
        $stmt->execute([$id_postagem]);
        $comentarios = [];
        // Recupera todos os comentários encontrados e adiciona no array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $comentarios[] = $row;
        }
        return $comentarios;
    }
    public function salvar() {
            $conexao = BancoDeDados::getConexao();
            $stmt = $conexao->prepare("INSERT INTO comentarios (postagem_id, nome_usuario, conteudo) VALUES (?, ?, ?)");
            $stmt->execute([$this->id_postagem, $this->nome_usuario, $this->conteudo]);
            //echo "Comentário criado com sucesso!\n";
    }

}