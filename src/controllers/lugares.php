<?php

declare(strict_types=1);

function lugares_listar(): void
{
    $dados = conexao()->query("SELECT * FROM tb_lugares");

    view('lugares/list', $dados->fetchAll());
}

function lugares_add(): void
{
    if (true === empty($_POST)) {
        view('lugares/add');
        return;
    }

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $avaliacao = $_POST['avaliacao'];

    if ($nome === '') {
        $_SESSION['erro'] = 'Nome invalido';
        header('location: /lugares/adicionar');
        return;
    }

    $query = conexao()->prepare("INSERT INTO tb_lugares
                (nome, endereco, avaliacao, data_cadastro, data_edicao) 
              VALUES 
                (:nome, :endereco, :avaliacao, :data_cadastro, :data_edicao);");

    $data = date('d/m/Y H:i:s');

    $query->execute([
        ':nome' => $nome,
        ':endereco' => $endereco,
        ':avaliacao' => (int) $avaliacao,  
        ':data_cadastro' => $data,
        ':data_edicao' => $data,
    ]);

    $_SESSION['sucesso'] = 'Pronto, Novo lugar inserido';
            
    header('location: /lugares/listar');
}

function lugares_excluir(): void
{
    echo "Pagina de excluir lugar";
}

function lugares_editar(): void
{
    echo "Pagina de editar lugar";
}