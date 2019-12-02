<?php

class Pokemon{
    private $id;
    private $nome;
    private $habilidade;
    private $nivel;
    private $tipo;

    public function __construct(string $nome, string $habilidade, int $nivel, $tipo){
        $this->nome = $nome;
        $this->habilidade = $habilidade;
        $this->nivel = $nivel;
        $this->tipo = $tipo;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNivel(){
        return $this->nivel;
    }
    public function setNivel($nivel){
        $this->nivel = $nivel;
    }

    public function getHabilidade(){
        return $this->habilidade;
    }
    public function setHabilidade($habilidade){
        $this->habilidade = $habilidade;
    }

    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
}

?>
