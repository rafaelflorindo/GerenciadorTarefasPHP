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
    <Main>
    <a href="index.php">← Voltar</a>
    <form action="cadastrarTarefa.php" method="POST">
        <label>Tarefa: </label><input type="text" name="nomeTarefa">
        <label>Responsável: </label><input type="text" name="responsavel">
        <label>Data de Início: </label><input type="date" name="dataInicio">
        <label>Data de Término: </label><input type="date" name="dataFim">
        <label>Ativo: </label>
        <input type="radio" name = "ativo" value="1">Sim
        <input type="radio" name = "ativo" value="0">Não
        <label>Descrição</label>
        <textarea name="descricao" rows="4" cols="200"></textarea>
        <input type="submit" value="GRAVAR">
    </form>
    </main>
    <footer>
        &copy; 2025 - Todos os direitos reservados
    </footer>
</body>

</html