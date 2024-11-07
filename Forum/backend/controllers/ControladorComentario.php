<?php
require_once '../models/Comentario.php';

class ControladorComentario {
    public function listar($id_postagem) {
        $comentarios = Comentario::todosPorPostagem($id_postagem);
        if (is_array($comentarios) && !empty($comentarios)) {
             echo json_encode($comentarios);
             return $comentarios;
        }
        return json_encode(['erro' => 'Nenhum comentário encontrado.']);
       
    }


    public function criar() {
        $dados = json_decode(file_get_contents("php://input"), true);
        if (!$dados || !isset($dados['nome_usuario'], $dados['conteudo'], $dados['id_postagem'])) {
            echo json_encode(['erro' => 'Dados inválidos.']);
            return;
        }
        $comentario = new Comentario($dados['nome_usuario'], $dados['conteudo'], $dados['id_postagem']);
        $comentario->salvar();
        echo json_encode(['mensagem' => 'Comentário criado com sucesso!']);
    }
}
?>