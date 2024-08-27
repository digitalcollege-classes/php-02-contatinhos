-- comando para listar os banco de dados --
SHOW DATABASES;

-- para criar um banco de dados --
CREATE DATABASE db_name;

-- para excluir um banco --
DROP DATABASE db_name;

-- para selecionar um banco --
USE db_name; 

-- listar as tabelas de um banco --
SHOW TABLES;

-- para criar uma tabela --
CREATE TABLE tb_contatos (
    id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(50),
    telefone VARCHAR(15) NOT NULL,
    data_cadastro VARCHAR(20) NOT NULL
);

-- detalhar a estrutura de uma tabela --
DESC tb_contatos;

-- excluir uma tabela --
DROP TABLE tb_contatos;

-- pra alterar uma tabela, add ou remover colunas --
ALTER TABLE tb_contatos ADD COLUMN cidade VARCHAR(10);
ALTER TABLE tb_contatos DROP COLUMN cidade;


-- DADOS --

-- excluir todos os dados de uma tabela
DELETE FROM tb_contatos;

DELETE FROM tb_contatos WHERE id=3; -- primary key

DELETE FROM tb_contatos WHERE cidade='Paracuru';

DELETE FROM tb_contatos WHERE cidade='Taua' AND telefone LIKE '88%';

-- para editar --
UPDATE tb_contatos SET cidade='Lisboa' WHERE id = 10;

-- todos os registros
UPDATE tb_contatos SET cidade='Lisboa';

-- para inserir --
INSERT INTO tb_contatos (telefone, nome, data_cadastro, email) 
VALUES ('85 9 8674-0502', 'Rosana', '2024-04-09', 'rosana@email.com'); 

INSERT INTO tb_contatos (telefone, nome, data_cadastro, email) 
VALUES ('88 9 9696-1234', 'Samantha', '2023-01-10', 'samantha@email.com');

INSERT INTO tb_contatos (telefone, nome, data_cadastro, email) 
VALUES ('85 9 9991-0977', 'Joao Pedro', '2022-04-12', 'joao@email.com');

INSERT INTO tb_contatos (telefone, nome, data_cadastro, email) 
VALUES ('88 9 8967-3456', 'Jorge', '2023-12-31', 'jorge@email.com');

INSERT INTO tb_contatos (telefone, nome, data_cadastro, email) 
VALUES ('88 9 9861-3456', 'Nayara', '2024-10-03', 'nayara@email.com');

-- para buscar --

-- todas as colunas de todas as linhas --
SELECT * FROM tb_contatos;

-- todas as colunas da linha de id 3 --
SELECT * FROM tb_contatos WHERE id=3;

-- apenas a coluna nome e telefone de todas as linhas --
SELECT nome, telefone FROM tb_contatos;

-- apenas a coluna nome e telefone da linha de id 5 --
SELECT nome, telefone FROM tb_contatos WHERE id=5; 

SELECT 
    nome, telefone 
FROM 
    tb_contato 
LIMIT 100 
ORDER BY data_cadastro DESC;





UPDATE tb_contatos SET nome='Maria'; --', email='samantha@email.com', telefone='88 9 1234-9999' WHERE id='2';


CREATE TABLE tb_lugares (
    id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(50),
    avaliacao INT (1),
    data_cadastro VARCHAR(20) NOT NULL,
    data_edicao VARCHAR(20) NULL
);
