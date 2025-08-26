<?php
include "./modelos/Tarefa.php";
include "./dao/TarefaDao.php";

if ($_POST) {
    if (
        isset($_POST["nomeTarefa"]) &&
        isset($_POST["descricao"]) &&
        isset($_POST["responsavel"]) &&
        isset($_POST["dataInicio"]) &&
        isset($_POST["dataFim"]) &&
        isset($_POST["ativo"])
    ) {
        if (
            !empty($_POST["nomeTarefa"]) &&
            !empty($_POST["descricao"]) &&
            !empty($_POST["responsavel"]) &&
            !empty($_POST["dataInicio"]) &&
            !empty($_POST["dataFim"]) &&
            isset($_POST["ativo"]) 
        ) {
            $nomeTarefa  = $_POST["nomeTarefa"];
            $descricao   = $_POST["descricao"];
            $responsavel = $_POST["responsavel"];
            $dataInicio  = $_POST["dataInicio"];
            $dataFim     = $_POST["dataFim"];
            $ativo       = (int)$_POST["ativo"]; 

            $tarefa = new Tarefa();
            $tarefa->setNomeTarefa($nomeTarefa);
            $tarefa->setDescricao($descricao);
            $tarefa->setResponsavel($responsavel);
            $tarefa->setDataInicio($dataInicio);
            $tarefa->setDataFim($dataFim);
            $tarefa->setAtivo($ativo);

            try {
                $dao = new TarefaDao();
                $dao->inserir($tarefa);

                header("Location: index.php?mensagem=Gravado com sucesso");
                exit;
            } catch (Exception $e) {
                echo "Erro ao gravar a tarefa: " . $e->getMessage();
            }

        } else {
            echo "Há campos vazios";
        }
    } else {
        echo "Há campos inexistentes.";
    }
} else {
    echo "Erro ao enviar os dados pelo formulário! Tente novamente mais tarde.";
}
