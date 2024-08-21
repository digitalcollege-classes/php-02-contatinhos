<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    </head>
    <body class="container" style="background-color: #EFEFEF;">
        <h1 class="mt-3">Contatinhos 🫣</h1>

        <hr>



        <nav>
            <?php 
                $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            ?>

            <a class="btn <?php echo $url === '/contatos/listar' ? 'btn-dark' : 'btn-outline-dark';  ?>" href="/contatos/listar"> Listar Contatos</a>
            <a class="btn <?php echo $url === '/contatos/adicionar' ? 'btn-dark' : 'btn-outline-dark';  ?>" href="/contatos/adicionar">Novo Contato</a>
            <a class="btn <?php echo $url === '/lugares/listar' ? 'btn-dark' : 'btn-outline-dark';  ?>" href="/lugares/listar">Listar Lugares</a>
            <a class="btn <?php echo $url === '/lugares/adicionar' ? 'btn-dark' : 'btn-outline-dark';  ?>" href="/lugares/adicionar">Novo Lugar</a>
        </nav>


        <i class="material-icons text-warning">star</i>
        <i class="material-icons text-warning">star</i>
        <i class="material-icons text-black-50">star</i>
        <i class="material-icons text-black-50">star</i>
        <i class="material-icons text-black-50">star</i>

        <hr>
    
