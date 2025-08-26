<?php
include_once './modelos/Tarefa.php';

class TarefaDao{

    public $connection;

    public function __construct(){
        try{
            $username = "root";
            $password = "Senac@123";

            $conn = new PDO('mysql:host=localhost:3307;dbname=SistemaTarefa', $username, $password);     
            $this->connection = $conn;
        } catch (PDOException $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
        }     
    }

    public function inserir(Tarefa $tarefa) {
        if (empty($tarefa->getNomeTarefa()) || empty($tarefa->getDescricao()) || empty($tarefa->getResponsavel())
            || empty($tarefa->getDataInicio()) || empty($tarefa->getDataFim()) || $tarefa->getAtivo() === null) {
            throw new Exception("Todos os campos da tarefa devem ser informados antes de inserir.");
        }

        $sql = "INSERT INTO tarefas (nomeTarefa, descricao, responsavel, dataInicio, dataFim, ativo) 
                VALUES (:nomeTarefa, :descricao, :responsavel, :dataInicio, :dataFim, :ativo)";

        $parametros = [
            ':nomeTarefa' => $tarefa->getNomeTarefa(),
            ':descricao'  => $tarefa->getDescricao(),
            ':responsavel'=> $tarefa->getResponsavel(),
            ':dataInicio' => $tarefa->getDataInicio(),
            ':dataFim'    => $tarefa->getDataFim(),
            ':ativo'      => $tarefa->getAtivo()
        ];

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($parametros);
        return $stmt;
    }

    public function listarGeral() {
        try {
            $sql = "SELECT * FROM tarefas ORDER BY ativo, nomeTarefa ASC";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $tarefas = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tarefa = new Tarefa();
                $tarefa->setId($row['id']);
                $tarefa->setNomeTarefa($row['nomeTarefa']);
                $tarefa->setDescricao($row['descricao']);
                $tarefa->setResponsavel($row['responsavel']);
                $tarefa->setDataInicio($row['dataInicio']);
                $tarefa->setDataFim($row['dataFim']);
                $tarefa->setAtivo($row['ativo']);
                $tarefas[] = $tarefa;
            }
            return $tarefas;

        } catch (PDOException $e) {
            throw new Exception("Erro ao listar tarefas: " . $e->getMessage());
        }
    }

    public function buscarPorId($id) {
        if (empty($id)) {
            throw new Exception("ID da tarefa não informado.");
        }

        $sql = "SELECT * FROM tarefas WHERE id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            throw new Exception("Tarefa não encontrada para o ID: $id");
        }

        $tarefa = new Tarefa();
        $tarefa->setId($row['id']);
        $tarefa->setNomeTarefa($row['nomeTarefa']);
        $tarefa->setDescricao($row['descricao']);
        $tarefa->setResponsavel($row['responsavel']);
        $tarefa->setDataInicio($row['dataInicio']);
        $tarefa->setDataFim($row['dataFim']);
        $tarefa->setAtivo($row['ativo']);          
        return $tarefa;
    }

    public function atualizar(Tarefa $tarefa) {
        if ($tarefa->getId() === null) {
            throw new Exception("ID da tarefa não informado para atualização.");
        }
        if (empty($tarefa->getNomeTarefa()) || empty($tarefa->getDescricao()) || empty($tarefa->getResponsavel())
            || empty($tarefa->getDataInicio()) || empty($tarefa->getDataFim()) || $tarefa->getAtivo() === null) {
            throw new Exception("Todos os campos da tarefa devem ser informados antes de atualizar.");
        }

        $sql = "UPDATE tarefas SET 
                    nomeTarefa = :nomeTarefa,
                    descricao = :descricao,
                    responsavel = :responsavel,
                    dataInicio = :dataInicio,
                    dataFim = :dataFim,
                    ativo = :ativo
                WHERE id = :id";

        $parametros = [
            ':nomeTarefa' => $tarefa->getNomeTarefa(),
            ':descricao'  => $tarefa->getDescricao(),
            ':responsavel'=> $tarefa->getResponsavel(),
            ':dataInicio' => $tarefa->getDataInicio(),
            ':dataFim'    => $tarefa->getDataFim(),
            ':ativo'      => $tarefa->getAtivo(),
            ':id'         => $tarefa->getId(),
        ];

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($parametros);
        return $stmt;  
    }

    public function atualizarStatus(Tarefa $tarefa) {
        if ($tarefa->getId() === null || $tarefa->getAtivo() === null) {
            throw new Exception("ID ou Ativo não informado para atualização de status.");
        }

        $sql = "UPDATE tarefas SET ativo = :ativo WHERE id = :id";
        $parametros = [
            ':ativo' => $tarefa->getAtivo(),
            ':id'    => $tarefa->getId(),
        ];

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($parametros);
        return $stmt;  
    }
}