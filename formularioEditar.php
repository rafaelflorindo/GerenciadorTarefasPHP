<?php
include_once './modelos/Tarefa.php';
include_once "./dao/TarefaDao.php";
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

<?php

$id = $_GET["id"];

$tarefaDao = new TarefaDao();
$tarefa = $tarefaDao->buscarPorId($id);

?>
<main>
<a href="index.php">← Voltar</a>
<form action="atualizarTarefa.php" method="POST">
        <label>Tarefa: </label><input type="text" name="nomeTarefa" value="<?=$tarefa->getNomeTarefa();?>">
        <label>Responsável: </label><input type="text" name="responsavel" value="<?=$tarefa->getResponsavel();?>">
        <label>Data de Início: </label><input type="date" name="dataInicio" value="<?=$tarefa->getDataInicio();?>">
        <label>Data de Término: </label><input type="date" name="dataFim" value="<?=$tarefa->getDataFim();?>">
        <label>Ativo: </label>
        <input type="radio" name = "ativo" value="1" <?=$tarefa->getAtivo() == 1 ? "checked" : "null"?>>Sim
        <input type="radio" name = "ativo" value="0" <?=$tarefa->getAtivo() == 0 ? "checked" : "null"?>>Não
        <label>Descrição</label>
        <textarea name="descricao" rows="4" cols="200"><?=$tarefa->getDescricao();?></textarea>
        <input type="hidden" name="id" value="<?=$tarefa->getId();?>">
        <input type="submit" value="ATUALIZAR">
    </form>
    </main>
    <footer>
        &copy; 2025 - Todos os direitos reservados
    </footer>
</body>

</html