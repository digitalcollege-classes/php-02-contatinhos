<?php

declare(strict_types=1);

session_start(); 


include '../config/routes.php';

function view(string $name, mixed $dados = []): void
{
    include '../src/views/_template/head.php';
    include "../src/views/{$name}.php";
    include '../src/views/_template/footer.php';

    unset($_SESSION['sucesso']);
    unset($_SESSION['erro']);
}

function conexao(): PDO
{
    return include '../src/conexao.php';
}

