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
<?php
    $id = $_GET["id"];
    $tarefaDao = new TarefaDao();
    $tarefa = $tarefaDao->buscarPorId($id);
?>
<main>
    <a href="index.php">← Voltar</a>
    <h1>Detalhes da Tarefa</h1>
    
    <div class="card">
        <!--<img src="imagem.jpg" alt="Imagem do Card">-->
        <h2><?=$tarefa->getNomeTarefa();?></h2>
        <p><span>Responsável:</span> <?=$tarefa->getResponsavel();?></p>
        <p><span>Início:</span> <?=$tarefa->getDataInicio();?></p>
        <p><span>Fim: </span><?=$tarefa->getDataFim();?></p>
        <p><span>Ativo:</span> <?=$tarefa->getAtivo() == 1 ? "SIM" : "NÃO"?></p>
        <p><span>Descrição: </span><?=$tarefa->getDescricao();?></p>

    </div>
    </main>
    <footer>
        &copy; 2025 - Todos os direitos reservados
    </footer>
</body>

</html