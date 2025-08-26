<?php
include "./modelos/Tarefa.php";
include "./dao/TarefaDao.php";

if ($_GET) {
    if (isset($_GET["id"], $_GET["ativo"])) {
        $id = (int) $_GET["id"];
        $ativo = (int) $_GET["ativo"];

        $tarefa = new Tarefa();
        $tarefa->setId($id);
        $tarefa->setAtivo($ativo);
        
        try {
            $dao = new TarefaDao();
            $dao->atualizarStatus($tarefa);
            header("Location: index.php?mensagem=Status atualizado com sucesso");
            exit; 
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
        
    } else {
        echo "Há campos vazios";
    }
} else {
    echo "Há campos inexistentes.";
}
