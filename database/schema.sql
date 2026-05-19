DROP DATABASE kaoart;

CREATE DATABASE IF NOT EXISTS kaoart;

USE kaoart;


CREATE TABLE IF NOT EXISTS usuarios
(
    id            INT AUTO_INCREMENT PRIMARY KEY,

    nome_completo VARCHAR(150) NOT NULL,
    email         VARCHAR(150) NOT NULL UNIQUE,
    telefone      VARCHAR(20)  NOT NULL,
    empresa       VARCHAR(150),

    endereco      VARCHAR(255) NOT NULL,
    cep           VARCHAR(10)  NOT NULL,

    senha         VARCHAR(100) NOT NULL,

    role          ENUM ('admin', 'user')     DEFAULT 'user',
    status        ENUM ('active', 'blocked') DEFAULT 'active',

    criado_em     TIMESTAMP                  DEFAULT CURRENT_TIMESTAMP
    );


INSERT INTO usuarios (nome_completo,
                      email,
                      telefone,
                      empresa,
                      endereco,
                      cep,
                      senha,
                      role,
                      status)
VALUES ('Administrador',
        'admin@teste.com',
        '(11) 99999-9999',
        'Empresa Teste',
        'Rua Exemplo, 123 - São Paulo',
        '01000-000',
        'admin123',
        'admin',
        'active');

INSERT INTO usuarios (nome_completo,
                      email,
                      telefone,
                      empresa,
                      endereco,
                      cep,
                      senha,
                      role,
                      status)
VALUES ('Usuário',
        'usuario@teste.com',
        '(11) 99999-9999',
        'Empresa Teste',
        'Rua Exemplo, 123 - São Paulo',
        '01000-000',
        'user123',
        'user',
        'active');

CREATE TABLE IF NOT EXISTS produtos
(
    id        INT AUTO_INCREMENT PRIMARY KEY,

    nome      VARCHAR(150)   NOT NULL,
    categoria VARCHAR(100)   NOT NULL,

    descricao TEXT,

    preco     DECIMAL(10, 2) NOT NULL,

    estoque   INT            NOT NULL DEFAULT 0,

    imagem    VARCHAR(255)   NOT NULL,

    criado_em TIMESTAMP               DEFAULT CURRENT_TIMESTAMP
    );

INSERT INTO produtos (nome,
                      categoria,
                      descricao,
                      preco,
                      estoque,
                      imagem)
VALUES ('Caneca Personalizada',
        'Canecas',
        'Caneca personalizada temática anime',
        39.90,
        15,
        'img/caneca/caneca1.jpeg');

CREATE TABLE pedidos
(
    id          INT AUTO_INCREMENT PRIMARY KEY,

    user_id     INT            NOT NULL,

    total_valor DECIMAL(10, 2) NOT NULL,

    status      ENUM (
        'Pendente',
        'Arte Aprovada',
        'Em Produção',
        'Enviado',
        'Cancelado'
        )                 DEFAULT 'Pendente',

    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES usuarios (id)
        ON DELETE CASCADE
);

CREATE TABLE itens_pedidos
(
    id         INT AUTO_INCREMENT PRIMARY KEY,

    pedido_id  INT            NOT NULL,

    produto_id INT            NOT NULL,

    quantidade INT            NOT NULL,

    preco_unit DECIMAL(10, 2) NOT NULL,

    tamanho    VARCHAR(10),

    FOREIGN KEY (pedido_id)
        REFERENCES pedidos (id)
        ON DELETE CASCADE,

    FOREIGN KEY (produto_id)
        REFERENCES produtos (id)
        ON DELETE CASCADE
);