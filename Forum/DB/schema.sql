CREATE TABLE postagens (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome_usuario TEXT NOT NULL,
    conteudo TEXT NOT NULL
);

CREATE TABLE comentarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,  
    nome_usuario TEXT NOT NULL,
    conteudo TEXT NOT NULL,
    id_postagem INTEGER NOT NULL,
    FOREIGN KEY (id_postagem) REFERENCES postagens(id) ON DELETE CASCADE
);