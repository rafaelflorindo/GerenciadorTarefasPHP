<?php
include_once './modelos/Tarefa.php';
include_once "./dao/TarefaDao.php";
$dao = new TarefaDao();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>

<body>
    <header>
        <h1>Minha Aplicação de Tarefas</h1>
    </header>
    <main>
        <a href="formularioCadastro.php">+ Cadastrar nova tarefa</a>
        <h1>Listando tarefas</h1>
        <?php
        $tarefas = $dao->listarGeral();
        ?>
        <table>
            <th>TAREFA</th>
            <th>RESPONSÁVEL</th>
            <th>ATIVO</th>
            <th>AÇÃO</th>
            <?php
            foreach ($tarefas as $tarefa):
            ?>
                <tr>
                    <td><?= $tarefa->getNomeTarefa(); ?></td>
                    <td><?= $tarefa->getResponsavel(); ?></td>
                    <td><?= $tarefa->getAtivo() == 1 ? "SIM" : "NÃO" ?></td>
                    <td>
                        <a href="exibirDetalhes.php?id=<?= $tarefa->getId(); ?>" class="table-btn btn-view">Visualizar</a>
                        <a href="formularioEditar.php?id=<?= $tarefa->getId(); ?>" class="table-btn btn-edit">Editar</a>

                        <?= $tarefa->getAtivo() == 1
                            ? "<a href='atualizarStatus.php?id={$tarefa->getId()}&ativo=0' class='table-btn btn-deactivate'>Inativar</a>"
                            : "<a href='atualizarStatus.php?id={$tarefa->getId()}&ativo=1' class='table-btn btn-activate'>Ativar</a>" ?>

                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </main>
    <footer>
        &copy; 2025 - Todos os direitos reservados
    </footer>
</body>

</html>