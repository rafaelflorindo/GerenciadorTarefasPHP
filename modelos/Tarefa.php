<?php

class Tarefa{
    private $id;
    private $nomeTarefa;
    private $descricao;
    private $responsavel;
    private $dataInicio;
    private $dataFim;
    private $ativo;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    // Getter e Setter para nomeTarefa
    public function getNomeTarefa() {
        return $this->nomeTarefa;
    }

    public function setNomeTarefa($nomeTarefa) {
        $this->nomeTarefa = $nomeTarefa;
    }

    // Getter e Setter para descricao
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    // Getter e Setter para responsavel
    public function getResponsavel() {
        return $this->responsavel;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    // Getter e Setter para dataInicio
    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    // Getter e Setter para dataFim
    public function getDataFim() {
        return $this->dataFim;
    }

    public function setDataFim($dataFim) {
        $this->dataFim = $dataFim;
    }

    // Getter e Setter para ativo
    public function getAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }
}