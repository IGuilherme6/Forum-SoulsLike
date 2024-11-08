<?php
class BancoDeDados {

    private static $path = 'forum_soulslike.db';   
    private static $conexao;

    public static function getConexao() {
        if (!self::$conexao) {
            try {
                    self::$conexao = new PDO("sqlite:" . self::$path);
                    self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    self::criarTabelas();
                    self::criarTabelaComentarios();
            } catch (PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
            }
        }
        return self::$conexao;
    }

    private static function criarTabelas() {
        $sql = "CREATE TABLE IF NOT EXISTS postagens (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome_usuario TEXT NOT NULL,
            conteudo TEXT NOT NULL
        )";
        try {
            self::$conexao->exec($sql);
            echo "Tabela 'postagens' criada ou já existe!";
        } catch (PDOException $e) {
            echo "Erro ao criar a tabela: " . $e->getMessage();
        }
    }
    public static function criarTabelaComentarios() {
        $conexao = BancoDeDados::getConexao();

        // Criar a tabela de comentários, caso não exista
        $sql = "CREATE TABLE IF NOT EXISTS comentarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            postagem_id INTEGER NOT NULL,
            nome_usuario TEXT NOT NULL,
            conteudo TEXT NOT NULL,
            FOREIGN KEY (postagem_id) REFERENCES postagens(id)
        )";

        $conexao->exec($sql);
        echo "Tabela 'comentarios' criada ou já existe!\n";
    }

    public static function testarConexao() {
        try {
            self::getConexao();  
            echo "Conexão bem-sucedida!";
        } catch (PDOException $e) {
            echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
        }
    }
}
?>