<?php


class Postagem {
    public $id;
    public $nome_usuario;
    public $conteudo;

    public function __construct($nome_usuario, $conteudo) {
        $this->nome_usuario = $nome_usuario;
        $this->conteudo = $conteudo;
    }

    public static function todas() {
        $conexao = BancoDeDados::getConexao();
        $stmt = $conexao->query("SELECT * FROM postagens");
        $postagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($postagens as $postagem) {
            $p = new Postagem($postagem['nome_usuario'], $postagem['conteudo']);
            echo $p . "\n"; // Aqui o método __toString será chamado
        }
    }

    public function salvar() {
        $conexao = BancoDeDados::getConexao();
        $sql = "INSERT INTO postagens (nome_usuario, conteudo) VALUES (:nome_usuario, :conteudo)";
        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':nome_usuario', $this->nome_usuario);
        $stmt->bindParam(':conteudo', $this->conteudo);

        if ($stmt->execute()) {
            $this->id = $conexao->lastInsertId();
            return true;
        }
        return false;
    }
    public function __toString() {
        return "Usuário: {$this->nome_usuario} | Conteúdo: {$this->conteudo}";
    }
}