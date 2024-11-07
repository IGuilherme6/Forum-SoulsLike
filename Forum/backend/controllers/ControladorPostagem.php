<?php
require_once '../models/Postagem.php';

class ControladorPostagem {
    public function listar() {
        $postagens = Postagem::todas();
        echo json_encode($postagens);
    }

    public function criar() {
        $dados = json_decode(file_get_contents("php://input"), true);// Recebe dados JSON da requisição e os decodifica em um array associativo
        // Verifica se os dados são válidos e se contêm 'nome_usuario' e 'conteudo'
        if (!$dados || !isset($dados['nome_usuario'], $dados['conteudo'])) {
            echo json_encode(['erro' => 'Dados inválidos.']);
            return;
        }

        $postagem = new Postagem($dados['nome_usuario'], $dados['conteudo']);
        $postagem->salvar();

        echo json_encode(['mensagem' => 'A Postagem foi criada com sucesso!']);
    }
}
?>