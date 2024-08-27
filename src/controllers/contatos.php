<?php

declare(strict_types=1);

const SELECT_ALL = 'SELECT * FROM tb_contatos';

// /contatos/listar
function contatos_listar(): void
{
    $dados = conexao()->query(SELECT_ALL);

    view('listar', $dados->fetchAll());
}

function contatos_add(): void
{
    if ($_POST) {
        $nome = strip_tags($_POST['nome']);
        $email = strip_tags($_POST['email']);
        $telefone = strip_tags($_POST['telefone']);

        $data = date('d/m/Y');

        $sql = conexao()->prepare("
            INSERT INTO tb_contatos (nome, email, telefone, data_cadastro)
            VALUES (:nome, :email, :tel, :data)
        "); 

        $sql->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':tel' => $telefone,
            ':data' => $data,
        ]);


        $_SESSION['sucesso'] = 'Pronto, Novo Contatinho criado';

        //redirecionar
        header('location: /contatos/listar');
    } 

    view('cadastro');
}

function contatos_excluir(): void
{
    $id = $_GET['id'];
    $sql = "DELETE FROM tb_contatos WHERE id='{$id}'";

    conexao()->query($sql);
    $_SESSION['sucesso'] = 'Pronto, Contatinho removido';

    header('location: /contatos/listar');
}

function contatos_editar(): void
{
    if ($_POST) {
        $nome = request_input('nome');
        $email = request_input('email');
        $telefone = request_input('telefone');
        $id = request_input('id');

        $query = "UPDATE tb_contatos 
                SET nome=:nome, email=:email, telefone=:tel 
                WHERE id=:id";

        $sql = conexao()->prepare($query);

        //$sql->bindParam(':nome', $nome, PDO::STR_PARAM);

        $sql->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':tel' => $telefone,
            ':id' => $id,
        ]); 

        header('location: /contatos/listar');
    }


    $id = $_GET['id'];
    $dados = conexao()->query("SELECT * FROM tb_contatos WHERE id='{$id}'");

    view('editar', $dados->fetchObject());
}

function request_input(string $nome): mixed
{
    return htmlspecialchars($_POST[$nome] ?? $_GET[$nome]);
    // strip_tags nao eh recomendada para tratar XSS (https://www.php.net/manual/en/function.strip-tags.php)
    // return strip_tags($_POST[$nome] ?? $_GET[$nome]);
}


