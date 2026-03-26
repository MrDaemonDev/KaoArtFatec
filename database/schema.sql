CREATE
DATABASE kaoart;

USE
kaoart;

CREATE TABLE users
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(100) NOT NULL,
    email      VARCHAR(150) NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    role       ENUM('user','admin') NOT NULL DEFAULT 'user',
    status     ENUM('active','blocked') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password, role)
VALUES ('admin',
        'admin@email.com',
        '123',
        'admin');

INSERT INTO users (name, email, password, role)
VALUES ('user',
        'user@email.com',
        '123',
        'user');

CREATE TABLE produtos
(
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nome      VARCHAR(100)   NOT NULL,
    descricao VARCHAR(255),
    preco     DECIMAL(10, 2) NOT NULL,
    categoria VARCHAR(50)    NOT NULL,
    imagem    VARCHAR(255),
    unidade   VARCHAR(50)
);

INSERT INTO produtos (nome, descricao, preco, categoria, imagem, unidade)
VALUES ('Camiseta Premium', '100% algodão, confortável e durável.', 49.90, 'camiseta', 'img/roupas/camisa6t.png', NULL),
       ('Camisa Personalizada', 'Camisa com estampa personalizada.', 39.90, 'camiseta', 'img/roupas/camisa5.png', NULL),
       ('Cartão de Visita', 'Ideal para divulgação.', 19.90, 'cartao', 'img/cartao/cartao1.png', '200 un'),
       ('Caneca Personalizada', 'Porcelana com alta qualidade.', 29.90, 'caneca', 'img/caneca/caneca1.jpeg', NULL),
       ('Máscara Personalizada', 'Máscara de tecido.', 29.90, 'mascara', 'img/mascara/mascara3.png', NULL);