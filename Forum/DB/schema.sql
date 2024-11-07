CREATE TABLE postagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(50) NOT NULL,
    conteudo TEXT NOT NULL,
);

CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(50) NOT NULL,
    conteudo TEXT NOT NULL,
    id_postagem INT NOT NULL,
    FOREIGN KEY (id_postagem) REFERENCES postagens(id) ON DELETE CASCADE
);