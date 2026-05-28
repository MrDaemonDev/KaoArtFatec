

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

-- TABELA DE USUÁRIOS DELETADOS

CREATE TABLE usuarios_deletados
(
    id_original   INT,
    nome_completo VARCHAR(150),
    email         VARCHAR(150),
    telefone      VARCHAR(20),
    empresa       VARCHAR(150),
    endereco      VARCHAR(255),
    cep           VARCHAR(10),
    role          ENUM ('admin', 'user'),
    status        ENUM ('active', 'blocked'),
    deletado_em   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- LOGS

CREATE TABLE logs
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    tabela_nome VARCHAR(50),
    acao        VARCHAR(50),
    descricao   TEXT,
    criado_em   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- PRODUTOS

CREATE TABLE IF NOT EXISTS produtos
(
    id        INT AUTO_INCREMENT PRIMARY KEY,

    nome      VARCHAR(150)   NOT NULL,
    categoria VARCHAR(100)   NOT NULL,

    descricao TEXT,

    preco     DECIMAL(10, 2) NOT NULL CHECK (preco >= 0),

    estoque   INT            NOT NULL DEFAULT 0 CHECK (estoque >= 0),

    imagem    VARCHAR(255)   NOT NULL,

    criado_em TIMESTAMP               DEFAULT CURRENT_TIMESTAMP
    );

-- PEDIDOS

CREATE TABLE pedidos
(
    id          INT AUTO_INCREMENT PRIMARY KEY,

    user_id     INT NOT NULL,

    total_valor DECIMAL(10, 2) DEFAULT 0,

    status      ENUM (
        'Pendente',
        'Arte Aprovada',
        'Em Produção',
        'Enviado',
        'Cancelado'
        )                      DEFAULT 'Pendente',

    data_pedido TIMESTAMP      DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES usuarios (id)
        ON DELETE CASCADE
);

-- ITENS DOS PEDIDOS

CREATE TABLE itens_pedidos
(
    id                 INT AUTO_INCREMENT PRIMARY KEY,

    pedido_id          INT            NOT NULL,

    produto_id         INT            NOT NULL,

    quantidade         INT            NOT NULL CHECK (quantidade > 0),

    preco_unit         DECIMAL(10, 2) NOT NULL CHECK (preco_unit >= 0),

    tamanho            VARCHAR(10),
    observacoes        TEXT,
    arte_personalizada VARCHAR(255),
    arte_status        ENUM ('Pendente', 'Aprovada', 'Reprovada') DEFAULT 'Pendente',

    FOREIGN KEY (pedido_id)
        REFERENCES pedidos (id)
        ON DELETE CASCADE,

    FOREIGN KEY (produto_id)
        REFERENCES produtos (id)
        ON DELETE CASCADE
);

-- INSERTS

INSERT INTO usuarios (nome_completo, email, telefone, empresa, endereco, cep, senha, role, status)
VALUES ('Administrador', 'admin@teste.com', '(11) 99999-9999', 'Empresa Teste', 'Rua Exemplo, 123 - São Paulo',
        '01000-000', 'admin123', 'admin', 'active');

INSERT INTO usuarios (nome_completo, email, telefone, empresa, endereco, cep, senha, role, status)
VALUES ('Marcos', 'marcos@teste.com', '(11) 98888-7777', 'KaoArt Studio', 'Rua das Flores, 150 - São Paulo',
        '04567-000', '123456', 'user', 'active');

INSERT INTO produtos (nome, categoria, descricao, preco, estoque, imagem)
VALUES ('Camiseta Personalizada', 'Roupas', 'Camiseta personalizada em algodão', 59.90, 30, 'img/camisas/camiseta.jpg');

INSERT INTO pedidos (user_id, total_valor, status)
VALUES (1, 59.90, 'Pendente');

INSERT INTO itens_pedidos (pedido_id, produto_id, quantidade, preco_unit, tamanho, observacoes, arte_personalizada,
                           arte_status)
VALUES (1, 1, 2, 59.90, 'M', 'Estampa preta na frente', 'img/artes/arte1.png', 'Aprovada');

-- ÍNDICES

-- Os ÍNDICES para user_id, pedido_id e produto_id são criados automaticamente pelo MySQL por serem FOREIGN KEYs

CREATE INDEX idx_produto_nome ON produtos (nome);

CREATE INDEX idx_produto_categoria ON produtos (categoria);

-- TRIGGERS

DELIMITER $$

-- BACKUP DE USUÁRIOS ANTES DE DELETAR

CREATE TRIGGER trg_backup_usuario_delete
    BEFORE DELETE
    ON usuarios
    FOR EACH ROW
BEGIN
    INSERT INTO usuarios_deletados (id_original, nome_completo, email, telefone, empresa, endereco, cep, role, status)
    VALUES (OLD.id, OLD.nome_completo, OLD.email, OLD.telefone, OLD.empresa, OLD.endereco, OLD.cep, OLD.role,
            OLD.status);
    END$$

-- LOG DE NOVO USUÁRIO

    CREATE TRIGGER trg_log_usuario_insert
        AFTER INSERT
        ON usuarios
        FOR EACH ROW
    BEGIN
        INSERT INTO logs (tabela_nome, acao, descricao)
        VALUES ('usuarios', 'INSERT', CONCAT('Novo usuário criado: ', NEW.email));
        END$$

        DELIMITER ;

