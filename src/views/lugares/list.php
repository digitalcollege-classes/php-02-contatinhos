<?php
    function stars(int $numero): string 
    {
        $estrelas = '';
        for ($i = 1; $i <= $numero; $i++) {
            $estrelas .= '<i class="material-icons text-warning">star</i>';
        }
    
        return $estrelas;
    }

    function stars_premium(int $numero): string 
    {
        $estrelas = '';
        for ($i = 1; $i <= 5; $i++) {
            $class = ($i <= $numero)?'text-warning':'';
            
            $estrelas .= "<i class='material-icons {$class}'>star</i>";
        }
    
        return $estrelas;
    }
?>


<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Endereco</th>
            <th>Avaliacao</th>
            <th>Cadastro em</th>
            <th>Ultima edicao</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($dados as $cada) {
                $id = $cada['id'];
                $estrelas = stars_premium($cada['avaliacao']);

                echo "
                    <tr>
                        <td>{$id}</td>
                        <td>{$cada['nome']}</td>
                        <td>{$cada['endereco']}</td>
                        <td>{$estrelas}</td>
                        <td>{$cada['data_cadastro']}</td>
                        <td>{$cada['data_edicao']}</td>
                        <td>
                            <a href='/lugares/editar?id={$id}'>Editar</a>
                            <a href='#' onclick='excluir({$id})'>Excluir</a>
                        </td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

<script>
    function excluir(id) {
        let resposta = confirm('Voce tem certeza?');

        if (resposta === true) {
            location.href = '/lugares/excluir?id='+id;
        }
    }
</script>